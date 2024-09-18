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
        $messages = [
            200 => Lang::get('responsebuilder::messages.success'),
            201 => Lang::get('responsebuilder::messages.created'),
            202 => Lang::get('responsebuilder::messages.accepted'),
            204 => Lang::get('responsebuilder::messages.no_content'),
            400 => Lang::get('responsebuilder::messages.bad_request'),
            401 => Lang::get('responsebuilder::messages.unauthorized'),
            403 => Lang::get('responsebuilder::messages.forbidden'),
            404 => Lang::get('responsebuilder::messages.not_found'),
            405 => Lang::get('responsebuilder::messages.method_not_allowed'),
            409 => Lang::get('responsebuilder::messages.conflict'),
            422 => Lang::get('responsebuilder::messages.unprocessable_entity'),
            429 => Lang::get('responsebuilder::messages.too_many_requests'),
            500 => Lang::get('responsebuilder::messages.server_error'),
            502 => Lang::get('responsebuilder::messages.bad_gateway'),
            503 => Lang::get('responsebuilder::messages.service_unavailable'),
            504 => Lang::get('responsebuilder::messages.gateway_timeout'),
        ];
    
        return $messages[$statusCode] ?? Lang::get('responsebuilder::messages.unknown_error');
    }

    protected function getJsonOptions(): int
    {
        return Config::get('responsebuilder.json_options', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    protected function getLoggingResponse(): bool
    {
        return Config::get('responsebuilder.log_responses', false);
    }

    protected function getLoggingRequest(): bool
    {
        return Config::get('responsebuilder.log_requests', false);
    }

    protected function getLoggingResponseTime(): bool
    {
        return Config::get('responsebuilder.log_response_time', false);
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
