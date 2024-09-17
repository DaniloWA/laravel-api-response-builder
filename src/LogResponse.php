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
    public static function logResponse(IlluminateJsonResponse $response): void
    {
        if (Config::get('responsebuilder.log_responses', false) === false) {
            return;
        }

        $logData = [
            'status' => $response->status(),
            'headers' => $response->headers->all(),
            'content' => self::sanitizeContent($response->getContent()),
        ];

        self::logFormattedData($logData);
    }

    /**
     * Log the request details.
     *
     * @return void
     */
    public static function logRequest(): void
    {
        if (Config::get('responsebuilder.log_requests', false) === false) {
            return;
        }

        $request = Request::instance();

        $logData = [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'headers' => $request->headers->all(),
            'body' => $request->all(),
        ];

        self::logFormattedData($logData, 'Request Data: ');
    }

    /**
     * Log the response time.
     *
     * @param float $startTime
     * @return void
     */
    public static function logResponseTime(float $startTime): void
    {
        if (Config::get('responsebuilder.log_response_time', false) === false) {
            return;
        }

        $endTime = microtime(true);
        $responseTime = $endTime - $startTime;

        $logData = [
            'response_time' => number_format($responseTime * 1000, 2) . ' ms',
        ];

        self::logFormattedData($logData, 'Response Time: ');
    }

    /**
     * Log formatted data.
     *
     * @param array $logData
     * @param string $prefix
     * @return void
     */
    private static function logFormattedData(array $logData, string $prefix = ''): void
    {
        $level = self::getLogLevel();
        $channel = self::getLogChannel();

        $formattedLog = json_encode($logData, JSON_PRETTY_PRINT);

        Log::channel($channel)->log($level, $prefix . $formattedLog);
    }

    private static function getLogChannel(): string
    {
        $level = self::getLogLevel();

        return "responsebuilder_{$level}";
    }

    private static function getLogLevel(): string
    {
        $validLevels = ['emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'];
        $level = Config::get('responsebuilder.logging_level', 'info');

        if (!in_array($level, $validLevels, true)) {
            $level = 'info'; // Default level
        }

        return $level;
    }

    private static function sanitizeContent(string $content): string
    {
        $decodedContent = json_decode($content, true);

        if (isset($decodedContent['data']['token'])) {
            $decodedContent['data']['token'] = '***REDACTED***';
        }

        return json_encode($decodedContent, JSON_PRETTY_PRINT);
    }
}
