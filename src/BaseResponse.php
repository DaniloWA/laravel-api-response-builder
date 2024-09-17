<?php

namespace Doliveira\LaravelResponseBuilder;

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Config;

abstract class BaseResponse
{
    protected $statusCode;
    protected $message;
    protected $data;
    protected $wrap;
    protected $wrapKey;

    public function __construct($statusCode = null, $message = null, $data = null, $wrap = null, $wrapKey = null)
    {
        $this->statusCode = $statusCode ?? Config::get('responsebuilder.default_status_code');
        $this->message = $message;
        $this->data = $data;
        $this->wrap = $wrap ?? config('responsebuilder.wrap_data', true);
        $this->wrapKey = $wrapKey ?? config('responsebuilder.wrap_data_key', 'items');
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
        if (is_null($data)) {
            return $this->wrap ? [$this->wrapKey => []] : [];
        }

        if ($this->wrap) {
            return [$this->wrapKey => is_array($data) ? $data : json_decode(json_encode($data), true)];
        }

        return is_array($data) ? $data : json_decode(json_encode($data), true);
    }

    /**
        * Retorna uma mensagem padrão com base no status code.
        *
        * @param int $statusCode O código de status HTTP.
        * @return string A mensagem traduzida correspondente ao status code.
        */
    protected function getMessageFromStatusCode($statusCode): string
    {
        switch ($statusCode) {
            case 200:
                return Lang::get('responsebuilder.success');
            case 400:
                return Lang::get('responsebuilder.bad_request');
            case 401:
                return Lang::get('responsebuilder.unauthorized');
            case 404:
                return Lang::get('responsebuilder.not_found');
            case 500:
                return Lang::get('responsebuilder.server_error');
            default:
                return Lang::get('responsebuilder.server_error');
        }
    }

    protected function getJsonOptions(): int
    {
        return Config::get('responsebuilder.json_options', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    protected function getLoggingSetting(): bool
    {
        return Config::get('responsebuilder.log_responses', false);
    }

    protected function getLoggingLevel(): string
    {
        return Config::get('responsebuilder.logging_level', 'info');
    }

    protected function getDefaultResponseLanguage(): string
    {
        return Config::get('responsebuilder.default_response_language', 'en');
    }

    protected function getApiKeyHeader(): string
    {
        return Config::get('responsebuilder.api_key_header', 'X-API-KEY');
    }
}
