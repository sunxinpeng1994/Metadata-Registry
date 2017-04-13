<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    /**
     * Application locale defaults for various components
     * These will be overridden by LocaleMiddleware if the session local is set
     */

    /**
     * setLocale for php. Enables ->formatLocalized() with localized values for dates
     */
    setLocale(LC_TIME, config('app.locale_php'));

    /**
     * setLocale to use Carbon source locales. Enables diffForHumans() localized
     */
    Carbon::setLocale(config('app.locale'));

    /**
     * Set the session variable for whether or not the app is using RTL support
     * For use in the blade directive in BladeServiceProvider
     */
    if (config('locale.languages')[config('app.locale')][2]) {
      session([ 'lang-rtl' => true ]);
    } else {
      session()->forget('lang-rtl');
    }

    // Force SSL in production
    if ($this->app->environment() == 'production') {
      //URL::forceSchema('https');
    }
        if (app()->resolved('bugsnag')) {
            $bugsnag = app('bugsnag');
            $bugsnag->setReleaseStage(env('BUGSNAG_RELEASE_STAGE', ''));
            $bugsnag->setErrorReportingLevel(E_ALL & ~E_NOTICE);
        }
  }


  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    /**
     * Sets third party service providers that are only needed on local environments
     */
    $environment = $this->app->environment();
    if ($environment === 'dev' || $environment === 'testing') {
      /**
       * Loader for registering facades
       */
      $loader = \Illuminate\Foundation\AliasLoader::getInstance();

      /**
       * Load third party local providers and facades
       */
      $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
      $loader->alias('Debugbar', \Barryvdh\Debugbar\Facade::class);

      $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
      $this->app->register(\Mpociot\LaravelTestFactoryHelper\TestFactoryHelperServiceProvider::class);
      $this->app->register(\Antennaio\Codeception\DbDumpServiceProvider::class);

    }
    $this->app->bind('path.public', function () {return base_path() . '/web';});
    $this->app->alias('bugsnag.multi', \Illuminate\Contracts\Logging\Log::class);
    $this->app->alias('bugsnag.multi', \Psr\Log\LoggerInterface::class);
  }
}
