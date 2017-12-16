<?php

namespace App\Jobs;

use App\Models\Release;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Publish implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Release
     */
    private $release;

    /**
     * Create a new job instance.
     *
     * @param Release $release
     */
    public function __construct(Release $release)
    {
        //data:
            //project
            //release
            //list of vocabularies to publish
            //current user making the request
        $this->release = $release;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Symfony\Component\Process\Exception\RuntimeException
     * @throws \Symfony\Component\Process\Exception\ProcessFailedException
     * @throws \Symfony\Component\Process\Exception\LogicException
     */
    public function handle()
    {
        //todo:lot's more try/catch here
        $project_id = $this->release->project_id;
        $repo = $this->release->project->repo;
        //todo: rdf generator shouldn't responsible for storage management or git stuff
        GenerateRdf::initDir($project_id);
        //if the project has a github repo
        //and it's a valid repo
        //pull the repo

        //now we're ready to go...

        //foreach selected vocabulary
        $vocabs = $this->release->vocabularies()->get();
        foreach ($vocabs as $vocab) {
            dispatch(new GenerateRdf($vocab, $this->release));
        }
        $vocabs = $this->release->elementsets()->get();
        foreach ($vocabs as $vocab) {
            dispatch(new GenerateRdf($vocab, $this->release));
        }
        //when the jobs are complete:
        //commit the generated rdf with the version as the commit message
        //tag the commit with the version
        //push the repo to github
        //run the GenerateDocs job
    }

}
