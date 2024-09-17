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
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('responseBuilder.php'),
            ], 'config');
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
