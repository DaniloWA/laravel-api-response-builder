<?php

namespace Doliveira\LaravelResponseBuilder;

use Illuminate\Http\JsonResponse as IlluminateJsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class LogResponse
{
    /**
     * Log the response details.
     *
     * @param IlluminateJsonResponse $response
     * @return void
     */
    public static function log(IlluminateJsonResponse $response): void
    {
        $validLevels = ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'];
        $level = Config::get('responsebuilder.logging_level', 'info');

        if (!in_array($level, $validLevels, true)) {
            $level = 'info'; // Default level
        }


        $logData = [
            'status' => $response->status(),
            'headers' => $response->headers->all(),
            'content' => self::sanitizeContent($response->getContent()),
        ];

        $formattedLog = json_encode($logData, JSON_PRETTY_PRINT);


        if (Config::get('responsebuilder.log_responses', false)) {
            Log::$level($formattedLog);
        }
    }

    /**
     * Log the request details.
     *
     * @return void
     */
    public static function logRequest(): void
    {
        if (Config::get('responsebuilder.log_requests', false)) {
            return;
        }

        $request = Request::instance();

        $logData = [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'headers' => $request->headers->all(),
            'body' => $request->all(),
        ];

        $formattedLog = json_encode($logData, JSON_PRETTY_PRINT);

        Log::info('Request Data: ' . $formattedLog);
    }

    /**
     * Log the response time.
     *
     * @param float $startTime
     * @return void
     */
    public static function logResponseTime(float $startTime): void
    {
        if (Config::get('responsebuilder.log_response_time', false)) {
            return;
        }

        $endTime = microtime(true);
        $responseTime = $endTime - $startTime;

        $logData = [
            'response_time' => number_format($responseTime * 1000, 2) . ' ms',
        ];

        $formattedLog = json_encode($logData, JSON_PRETTY_PRINT);

        Log::info('Response Time: ' . $formattedLog);
    }

    /**
     * Sanitize response content to remove sensitive information.
     *
     * @param string $content
     * @return string
     */
    private static function sanitizeContent(string $content): string
    {
        $decodedContent = json_decode($content, true);

        if (isset($decodedContent['data']['token'])) {
            $decodedContent['data']['token'] = '***REDACTED***';
        }

        return json_encode($decodedContent, JSON_PRETTY_PRINT);
    }
}
