<?php

namespace Doliveira\LaravelResponseBuilder\Providers;

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
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('laravel-api-response-builder.php'),
        ], 'laravel-api-response-config');

        $this->configureLogging();
    }

    protected function configureLogging()
    {
        $config = Config::get('responsebuilder');
        $logFiles = $config['log_files'];

        foreach ($logFiles as $level => $path) {
            $this->app['config']->set("logging.channels.{$level}_log", [
                'driver' => 'single',
                'path' => $path,
                'level' => $level,
            ]);
        }
    }
}
