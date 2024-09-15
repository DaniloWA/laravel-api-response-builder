<?php

namespace Doliveira\LaravelResponseBuilder;

use Illuminate\Http\JsonResponse as IlluminateJsonResponse;
use Illuminate\Support\Facades\Lang;

class JsonResponse extends BaseResponse
{
    public static function success($data = null, $message = null): IlluminateJsonResponse
    {
        $message = $message ?? Lang::get('response.success');
        return (new self(200, $message, $data))->buildResponse();
    }

    public static function error($statusCode, $message = null, $data = null): IlluminateJsonResponse
    {
        $message = $message ?? Lang::get('response.server_error');
        return (new self($statusCode, $message, $data))->buildResponse();
    }

    public static function auto($statusCode, $message = null, $data = null): IlluminateJsonResponse
    {
        return (new self($statusCode, $message, $data))->buildResponse();
    }

    public function buildResponse(): IlluminateJsonResponse
    {
        LogResponse::logRequest();
        
        $startTime = microtime(true);
        
        $structure = $this->getResponseStructure();
        $response = [
            $structure['status'] => $this->statusCode,
            $structure['message'] => $this->message,
            $structure['data'] => $this->wrapData($this->data),
        ];

        $jsonOptions = $this->getJsonOptions();
        $jsonResponse = json_encode($response, $jsonOptions);

        if ($this->getCompressionSetting()) {
            $jsonResponse = gzcompress($jsonResponse);
        }

        if ($this->getLoggingSetting()) {
            LogResponse::log(new IlluminateJsonResponse($jsonResponse, $this->statusCode));
        }

        $response = response()->json($response, $this->statusCode);

        LogResponse::logResponseTime($startTime);

        return $response;
    }
}
