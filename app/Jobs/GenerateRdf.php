<?php

namespace App\Jobs;

use App\Models\Elementset;
use App\Models\Project;
use App\Models\Release;
use App\Models\VocabsModel;
use App\Models\Vocabulary;
use apps\frontend\lib\services\jsonldElementsetService;
use apps\frontend\lib\services\jsonldVocabularyService;
use GitWrapper\GitException;
use GitWrapper\GitWrapper;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class GenerateRdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public const  VOCABULARY   = Vocabulary::class;
    public const  ELEMENTSET   = Elementset::class;
    public const  REPO_ROOT    = 'repos';
    public const  PROJECT_ROOT = 'projects';
    private const URLARRAY     = [self::VOCABULARY => 'vocabularies/', self::ELEMENTSET => 'elementsets/'];
    /** @var int $projectId */
    private $projectId;
    /** @var string $class */
    private $class;
    /** @var int $id */
    private $id;
    /** @var string $filePath */
    private $filePath;
    /** @var string $fileName */
    private $fileName;
    private $disk;
    /**
     * @var VocabsModel
     */
    private $model;
    /**
     * @var Release
     */
    private $release;

    /**
     * Create a new job instance.
     *
     * @param VocabsModel $model
     * @param Release     $release
     * @param string      $disk
     */
    public function __construct(VocabsModel $model, Release $release, $disk = self::REPO_ROOT)
    {
        $this->id        = $model->id;
        $this->model     = $model;
        $this->class     = \get_class($model);
        $this->projectId = $model->project_id;
        $basePath        = parse_url($model->base_domain)['path'];
        $this->filePath  = rtrim(parse_url($model->uri)['path'], '/');
        $this->fileName  = str_replace_first($basePath, '', parse_url($model->uri)['path']);
        $this->disk      = $disk;
        self::initDir($this->projectId, $this->disk);
        $this->release = $release;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        //make sure we have a repo and create one if we don't
        //get the rdf/xml and store it in the repo
        $this->saveXml();
        //get the jsonld and store it in the repo
        $this->saveJsonLd();
        //TODO: make the translators that are run user-selectable as part of the project attributes
        //run the translators to generate the other flavours and store in the repo
        $this->saveTtl();
        $this->saveNt();
        //these are the wonky remote translators
        $this->saveN3();
        $this->saveRdfJson();
        $this->saveMicrodata();
        $this->saveRdfa();

        //update the entry in the releaseables table
        $this->updateRelease($this->model);
    }

    /**
     * @param $mimeType
     *
     * @return string
     */
    public function getStoragePath($mimeType): string
    {
        return self::getProjectPath($this->projectId) . "{$mimeType}{$this->filePath}.$mimeType";
    }

    public static function getProjectPath($projectId)
    {
        return self::PROJECT_ROOT . "/{$projectId}/";
    }

    public static function getProjectRepo($projectId)
    {
        $project = Project::find($projectId);
        $repo    = $project ? $project->repo : null;

        return $repo ? "https://github.com/{$repo}.git" : null;
    }

    /**
     * @param int    $projectId
     * @param string $disk
     *
     * @return void
     * @throws GitException
     * @throws \Symfony\Component\Process\Exception\LogicException
     * @throws \Symfony\Component\Process\Exception\RuntimeException
     * @throws \Symfony\Component\Process\Exception\ProcessFailedException
     */
    public static function initDir($projectId, $disk = self::REPO_ROOT): void
    {
        $projectPath = self::getProjectPath($projectId);
        if (! Storage::disk($disk)->exists($projectPath)) {
            $dir = Storage::disk($disk)->path($projectPath);

            /** @var GitWrapper $wrapper */
            $wrapper = new GitWrapper();
            $repo    = self::getProjectRepo($projectId);
            if ($repo) {
                $git = $wrapper->cloneRepository($repo, $dir);
                if (! $git->isCloned()) {
                    throw new GitException($git);
                }
            } else {
                Storage::disk($disk)->createDir($projectPath);
                $wrapper->init($dir);
            }
        }
    }

    public function saveXml()
    {
        $storagePath = $this->getStoragePath('xml');
        $client      = new Client();
        $res         = $client->get(url(self::URLARRAY[$this->class] . $this->id . '.rdf'));
        Storage::disk($this->disk)->put($storagePath, $res->getBody());
    }

    public function saveJsonLd()
    {
        $storagePath = $this->getStoragePath('jsonld');
        $release     = $this->makeReleaseArray();
        initSymfonyDb();
        if ($this->class === self::VOCABULARY) {
            $vocabulary    = \VocabularyPeer::retrieveByPK($this->id);
            $jsonLdService = new jsonldVocabularyService($vocabulary, $release);
        }
        if ($this->class === self::ELEMENTSET) {
            $elementset    = \SchemaPeer::retrieveByPK($this->id);
            $jsonLdService = new jsonldElementsetService($elementset, $release);
        }
        Storage::disk($this->disk)->put($storagePath, $jsonLdService->getJsonLd());
    }

    public function saveTtl()
    {
        $this->runRapper('ttl', 'turtle');
    }

    public function saveNt()
    {
        $this->runRapper('nt', 'ntriples');
    }

    public function saveN3()
    {
        $this->runCurl('n3');
    }

    public function saveRdfJson()
    {
        $this->runCurl('rdf-json');
    }

    public function saveMicrodata()
    {
        $this->runCurl('microdata');
    }

    public function saveRdfa()
    {
        $this->runCurl('rdfa');
    }

    /**
     * @return array
     */
    private function makeReleaseArray(): array
    {
        return ['tag_name' => $this->release->tag_name, 'published_at' => $this->release->created_at->format('F j, Y')];
    }

    /**
     * @throws \Symfony\Component\Process\Exception\RuntimeException
     * @throws \Symfony\Component\Process\Exception\ProcessFailedException
     * @throws \Symfony\Component\Process\Exception\LogicException
     */
    private function runRapper($mimeType, $rapperType)
    {
        $outputPath = $this->getStoragePath($mimeType);
        //just to make sure the path exists
        Storage::disk($this->disk)->put($outputPath, ' ');
        //make sure rapper has the full paths
        $sourcePath = Storage::disk($this->disk)->path($this->getStoragePath('xml'));
        $outputPath = Storage::disk($this->disk)->path($this->getStoragePath($mimeType));
        $process    = new Process("rapper -o {$rapperType} {$sourcePath} > {$outputPath}");
        $process->run();

        // executes after the command finishes
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }

    /**
     * @param $mimeType
     *
     * @throws \Symfony\Component\Process\Exception\ProcessFailedException
     * @throws \Symfony\Component\Process\Exception\RuntimeException
     * @throws \Symfony\Component\Process\Exception\LogicException
     */
    public function runCurl($mimeType)
    {
        $outputPath = $this->getStoragePath($mimeType);
        //just to make sure the path exists
        Storage::disk($this->disk)->put($outputPath, ' ');
        //make sure we have the full paths
        $sourcePath = Storage::disk($this->disk)->path($this->getStoragePath('xml'));
        $outputPath = Storage::disk($this->disk)->path($this->getStoragePath($mimeType));
        $process    = new Process("curl --data-urlencode content@{$sourcePath} http://rdf-translator.appspot.com/convert/xml/{$mimeType}/content > {$outputPath}");
        $process->run();

        // executes after the command finishes
        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
    }

    /**
     * @param $vocab
     */
    private function updateRelease(VocabsModel $vocab)
    {
        $release = $this->makeReleaseArray();
        $vocab->releases()->updateExistingPivot($this->release->id, ['published_at' => $release['published_at']]);
    }
}
