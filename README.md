# Laravel API Response Builder

**Laravel API Response Builder** is a Laravel package designed to simplify the creation of structured and formatted API responses (JSON, XML) with customizable status codes, messages, and data. This package provides a flexible way to handle API responses, including error handling, logging, and various configuration options.

## Features

- **Structured Responses**: Define custom response structures for consistency.
- **Format Options**: Choose between JSON and XML response formats.
- **Logging**: Log requests and responses for debugging and auditing.
- **Compression**: Optionally compress responses to reduce payload size.
- **Error Handling**: Include detailed error messages for debugging.

## Installation

To install the package, run the following command:

```bash
composer require doliveira/laravel-api-response-builder
```

## Configuration

After installing the package, publish the configuration file using the following command:

```bash
php artisan vendor:publish --provider="Doliveira\LaravelResponseBuilder\Providers\ResponseBuilderServiceProvider"
```

This will create a `config/laravel-api-response-builder.php` file where you can customize the package settings.

## Configuration Options

Here's a brief overview of the available configuration options:

- **`default_format`**: The default format for responses (`'json'` or `'xml'`).
- **`json_options`**: Options for JSON encoding (e.g., `JSON_UNESCAPED_SLASHES`).
- **`xml_root_element`**: The default root element for XML responses.
- **`default_status_code`**: The default HTTP status code for responses.
- **`detailed_errors`**: Whether to include detailed error messages for debugging.
- **`wrap_data`**: Whether to wrap response data in an additional `'data'` key.
- **`default_locale`**: The default locale for custom messages.
- **`default_response_language`**: The default language for responses (`'en'` or `'pt'`).
- **`compress_responses`**: Whether to compress responses.
- **`log_responses`**: Whether to log responses.
- **`logging_level`**: The level of detail for logging responses.
- **`api_key_header`**: The name of the header used for API keys.
- **`custom_response_structure`**: Define a custom structure for responses.
- **`debug_mode`**: Enable or disable debug mode.
- **`log_requests`**: Whether to log requests.
- **`log_response_time`**: Whether to log response times.

## Usage

### JSON Responses

#### Success Response

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::success($data, 'Operation successful.');
```

#### Error Response

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::error(400, 'Bad request.', $data);
```

### XML Responses

To create XML responses, use the `XmlResponse` class:

```php
use Doliveira\LaravelResponseBuilder\XmlResponse;

$response = new XmlResponse($statusCode, $message, $data);
return $response->build();
```

## Error Handling

The package allows you to include detailed error messages for debugging. By default, this is disabled in production environments:

```php
'logging_level' => 'info',
'detailed_errors' => false,
```

You can enable detailed error messages for debugging purposes by setting `'detailed_errors'` to `true` in the configuration.

## Examples

### Success JSON Response

```json
{
    "status": 200,
    "message": "Operation successful.",
    "data": {
        "id": 1,
        "name": "Example"
    }
}
```

### Error JSON Response

```json
{
    "status": 400,
    "message": "Bad request.",
    "data": null
}
```

### Success XML Response

```xml
<response>
    <status>200</status>
    <message>Operation successful.</message>
    <data>
        <id>1</id>
        <name>Example</name>
    </data>
</response>
```

### Error XML Response

```xml
<response>
    <status>400</status>
    <message>Bad request.</message>
    <data/>
</response>
```

## Logging

The package can log requests, responses, and response times. Configure logging settings in `config/laravel-api-response-builder.php`:

```php
'log_responses' => true,
'log_requests' => true,
'log_response_time' => true,
'logging_level' => 'info',
```

## Contributing

If you want to contribute to the development of this package, please fork the repository and submit a pull request.

## License

This package is licensed under the MIT License.

## Contact

For any questions or feedback, please contact:

- **Danilo Oliveira**: [daniloworkdev@gmail.com](mailto:daniloworkdev@gmail.com)
- **Website**: [daniloo.dev](http://www.daniloo.dev)

---

**Note:** The Package is currently under construction and may be updated further. As this is an early release, there may be bugs or incomplete features. We appreciate your understanding and feedback as we continue to improve the package.