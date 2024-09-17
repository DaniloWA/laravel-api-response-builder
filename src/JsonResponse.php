<?php

namespace Doliveira\LaravelResponseBuilder;

use Illuminate\Http\JsonResponse as IlluminateJsonResponse;

/**
 * Class JsonResponse
 * Provides methods to generate JSON responses with standardized structure.
 */
class JsonResponse extends BaseResponse
{
    public function __construct($statusCode, $message = null, $data, $wrap = null, $wrapKey = null)
    {
        $message = $message ?? $this->getMessageFromStatusCode($statusCode);
        parent::__construct($statusCode, $message, $data, $wrap, $wrapKey);
    }

    /**
     * Returns a JSON response with a successful status code (200) and a success message.
     *
     * @param mixed $data The data to include in the response. Can be an array or an object.
     * @param string|null $message The success message to include in the response. If not provided, a default message is used.
     * @param bool|null $wrap Determines whether to wrap the data. If null, uses the configuration setting.
     * @param string|null $wrapKey The key to use for wrapping the data. If null, uses the configuration setting.
     * @param int $statusCode The HTTP status code for the response. Default is 200.
     * @return IlluminateJsonResponse A JSON response with the provided data and message.
     */
    public static function success($data = null, $message = null, $wrap = null, $wrapKey = null, $statusCode = 200): IlluminateJsonResponse
    {
        return (new self($statusCode, $message, $data, $wrap, $wrapKey))->buildResponse();
    }

    /**
     * Returns a JSON response with a successful status code (200), data, and meta information.
     *
     * @param mixed $data The data to include in the response. Can be an array or an object.
     * @param array $meta Meta information to include in the response.
     * @param string|null $message The success message to include in the response. If not provided, a default message is used.
     * @param bool|null $wrap Determines whether to wrap the data. If null, uses the configuration setting.
     * @param string|null $wrapKey The key to use for wrapping the data. If null, uses the configuration setting.
     * @param int $statusCode The HTTP status code for the response. Default is 200.
     * @return IlluminateJsonResponse A JSON response with the provided data, message, and meta information.
     */
    public static function successWithMeta($data = null, $meta = [], $message = null, $wrap = null, $wrapKey = null, $statusCode = 200): IlluminateJsonResponse
    {
        $response = (new self($statusCode, $message, $data, $wrap, $wrapKey))->buildResponse();
        $responseData = json_decode($response->getContent(), true);
        $responseData['meta'] = $meta;
        return response()->json($responseData, $statusCode);
    }

    /**
     * Returns a JSON response with a successful status code (200), data, and custom headers.
     *
     * @param mixed $data The data to include in the response. Can be an array or an object.
     * @param array $headers Custom headers to include in the response.
     * @param string|null $message The success message to include in the response. If not provided, a default message is used.
     * @param bool|null $wrap Determines whether to wrap the data. If null, uses the configuration setting.
     * @param string|null $wrapKey The key to use for wrapping the data. If null, uses the configuration setting.
     * @param int $statusCode The HTTP status code for the response. Default is 200.
     * @return IlluminateJsonResponse A JSON response with the provided data, message, and headers.
     */
    public static function successWithHeaders($data = null, $headers = [], $message = null, $wrap = null, $wrapKey = null, $statusCode = 200): IlluminateJsonResponse
    {
        $response = (new self($statusCode, $message, $data, $wrap, $wrapKey))->buildResponse();
        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }
        return $response;
    }

    /**
     * Returns a JSON response with a successful status code (200), data, and pagination information.
     *
     * @param mixed $data The data to include in the response. Can be an array or an object.
     * @param array $pagination Pagination information including current page, total pages, etc.
     * @param string|null $message The success message to include in the response. If not provided, a default message is used.
     * @param bool|null $wrap Determines whether to wrap the data. If null, uses the configuration setting.
     * @param string|null $wrapKey The key to use for wrapping the data. If null, uses the configuration setting.
     * @param int $statusCode The HTTP status code for the response. Default is 200.
     * @return IlluminateJsonResponse A JSON response with the provided data, message, and pagination information.
     */
    public static function successWithPagination($data = null, $pagination = [], $message = null, $wrap = null, $wrapKey = null, $statusCode = 200): IlluminateJsonResponse
    {
        $response = (new self($statusCode, $message, $data, $wrap, $wrapKey))->buildResponse();
        $responseData = json_decode($response->getContent(), true);
        $responseData['pagination'] = $pagination;
        return response()->json($responseData, $statusCode);
    }

    /**
     * Returns a JSON response with an error status code and an error message.
     *
     * @param int $statusCode The HTTP status code for the response. Common error codes include 400, 404, 500, etc.
     * @param string|null $message The error message to include in the response. If not provided, a default message is used.
     * @param mixed $data The data to include in the response. Can be an array or an object.
     * @param bool|null $wrap Determines whether to wrap the data. If null, uses the configuration setting.
     * @param string|null $wrapKey The key to use for wrapping the data. If null, uses the configuration setting.
     * @return IlluminateJsonResponse A JSON response with the provided status code, message, and data.
     */
    public static function error($statusCode, $message = null, $data = null, $wrap = null, $wrapKey = null): IlluminateJsonResponse
    {
        return (new self($statusCode, $message, $data, $wrap, $wrapKey))->buildResponse();
    }

    /**
     * Returns a JSON response with an error status code, an error message, and technical details for debugging.
     *
     * @param int $statusCode The HTTP status code for the response. Common error codes include 400, 404, 500, etc.
     * @param string|null $message The error message to include in the response. If not provided, a default message is used.
     * @param mixed $data The data to include in the response. Can be an array or an object.
     * @param bool|null $wrap Determines whether to wrap the data. If null, uses the configuration setting.
     * @param string|null $wrapKey The key to use for wrapping the data. If null, uses the configuration setting.
     * @param string|null $trace The technical details or stack trace to include in the response.
     * @return IlluminateJsonResponse A JSON response with the provided status code, message, data, and trace.
     */
    public static function errorWithTrace($statusCode, $message = null, $data = null, $wrap = null, $wrapKey = null, $trace = null): IlluminateJsonResponse
    {
        $response = (new self($statusCode, $message, $data, $wrap, $wrapKey))->buildResponse();
        $responseData = json_decode($response->getContent(), true);
        if ($trace) {
            $responseData['trace'] = $trace;
        }
        return response()->json($responseData, $statusCode);
    }

    /**
     * Returns a JSON response with an error status code, an error message, and suggestions for resolving the issue.
     *
     * @param int $statusCode The HTTP status code for the response. Common error codes include 400, 404, 500, etc.
     * @param string|null $message The error message to include in the response. If not provided, a default message is used.
     * @param array $suggestions An array of suggestions or tips to help the user resolve the issue.
     * @param mixed $data The data to include in the response. Can be an array or an object.
     * @param bool|null $wrap Determines whether to wrap the data. If null, uses the configuration setting.
     * @param string|null $wrapKey The key to use for wrapping the data. If null, uses the configuration setting.
     * @return IlluminateJsonResponse A JSON response with the provided status code, message, data, and suggestions.
     */
    public static function errorWithSuggestions($statusCode, $message = null, $suggestions = [], $data = null, $wrap = null, $wrapKey = null): IlluminateJsonResponse
    {
        $response = (new self($statusCode, $message, $data, $wrap, $wrapKey))->buildResponse();
        $responseData = json_decode($response->getContent(), true);
        $responseData['suggestions'] = $suggestions;
        return response()->json($responseData, $statusCode);
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
        $response = response()->json($response, $this->statusCode);

        LogResponse::logResponse(new IlluminateJsonResponse($jsonResponse, $this->statusCode));
        LogResponse::logResponseTime($startTime);

        return $response;
    }
}
