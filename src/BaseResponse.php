<?php

namespace Doliveira\LaravelResponseBuilder;

use Illuminate\Support\Facades\Config;

abstract class BaseResponse
{
    protected $statusCode;
    protected $message;
    protected $data;

    public function __construct($statusCode = null, $message = null, $data = null)
    {
        $this->statusCode = $statusCode ?? Config::get('responsebuilder.default_status_code');
        $this->message = $message;
        $this->data = $data;
    }

    protected function getResponseStructure(): array
    {
        return Config::get('responsebuilder.custom_response_structure', [
            'status' => 'status',
            'message' => 'message',
            'data' => 'data'
        ]);
    }

    protected function wrapData($data): array
    {
        if (Config::get('responsebuilder.wrap_data', true)) {
            return ['data' => is_array($data) ? $data : json_decode(json_encode($data), true)];
        }

        return is_array($data) ? $data : json_decode(json_encode($data), true);
    }
    
    protected function getJsonOptions(): int
    {
        return Config::get('responsebuilder.json_options', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    protected function getCompressionSetting(): bool
    {
        return Config::get('responsebuilder.compress_responses', false);
    }

    protected function getLoggingSetting(): bool
    {
        return Config::get('responsebuilder.log_responses', false);
    }

    protected function getLoggingLevel(): string
    {
        return Config::get('responsebuilder.logging_level', 'info');
    }

    protected function getDetailedErrors(): bool
    {
        return Config::get('responsebuilder.detailed_errors', false);
    }

    protected function getDefaultResponseLanguage(): string
    {
        return Config::get('responsebuilder.default_response_language', 'en');
    }

    protected function getApiKeyHeader(): string
    {
        return Config::get('responsebuilder.api_key_header', 'X-API-KEY');
    }

    protected function getDebugMode(): bool
    {
        return Config::get('responsebuilder.debug_mode', false);
    }
}
