<?php

namespace Doliveira\LaravelResponseBuilder\Providers;

use Illuminate\Support\ServiceProvider;

class ResponseBuilderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'responsebuilder');
        
    }

    public function boot()
    {
        // Publica arquivos de configuração
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('laravel-api-response-builder.php'),
        ], 'laravel-api-response-config');

        // Carregar traduções
        $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'responsebuilder');
    }
}
