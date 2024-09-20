<?php

namespace Danilowa\LaravelResponseBuilder\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class ResponseBuilderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'responsebuilder');
    }

    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'responsebuilder');
        
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('responsebuilder.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/responsebuilder'),
            ], 'lang');
        }

        $this->configureLogging();
    }

    protected function configureLogging()
    {
        $config = Config::get('responsebuilder');
        $logFiles = $config['log_files'];

        foreach ($logFiles as $level => $path) {
            if (!in_array($level, ['debug', 'info', 'notice', 'warning', 'error', 'critical', 'alert', 'emergency'])) {
                throw new \InvalidArgumentException("Invalid logging level: {$level}");
            }

            $this->app['config']->set("logging.channels.responsebuilder_{$level}", [
                'driver' => 'single',
                'path' => $path,
                'level' => $level,
            ]);
        }
    }
}
