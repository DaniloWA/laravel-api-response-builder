# JsonResponse Documentation

The `JsonResponse` class provides a set of methods to generate JSON responses with a standardized structure. Below is a detailed description of each method, including parameters, return types, and usage examples.

## Methods

### `success()`

Returns a JSON response with a successful status code (200) and a success message.

**Parameters:**

- `mixed $data`: The data to include in the response (array or object).
- `string|null $message`: The success message (optional). Defaults to a default message if not provided.
- `bool|null $wrap`: Determines whether to wrap the data (optional). Uses configuration setting if null.
- `string|null $wrapKey`: The key for wrapping the data (optional). Uses configuration setting if null.
- `int $statusCode`: The HTTP status code (default is 200).

**Returns:**

- `IlluminateJsonResponse`: A JSON response with the provided data and message.

**Usage Example:**

```php
$response = JsonResponse::success(['user' => $user], 'User fetched successfully.');
```

**Example Response:**

```json
{
  "status": 200,
  "message": "User fetched successfully.",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe"
    }
  }
}
```

### `successWithMeta()`

Returns a JSON response with a successful status code (200), data, and meta information.

**Parameters:**

- `mixed $data`: The data to include in the response (array or object).
- `array $meta`: Meta information to include in the response.
- `string|null $message`: The success message (optional). Defaults to a default message if not provided.
- `bool|null $wrap`: Determines whether to wrap the data (optional). Uses configuration setting if null.
- `string|null $wrapKey`: The key for wrapping the data (optional). Uses configuration setting if null.
- `int $statusCode`: The HTTP status code (default is 200).

**Returns:**

- `IlluminateJsonResponse`: A JSON response with the provided data, message, and meta information.

**Usage Example:**

```php
$response = JsonResponse::successWithMeta(['user' => $user], ['total' => 1], 'User fetched successfully.');
```

**Example Response:**

```json
{
  "status": 200,
  "message": "User fetched successfully.",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe"
    }
  },
  "meta": {
    "total": 1
  }
}
```

### `successWithHeaders()`

Returns a JSON response with a successful status code (200), data, and custom headers.

**Parameters:**

- `mixed $data`: The data to include in the response (array or object).
- `array $headers`: Custom headers to include in the response.
- `string|null $message`: The success message (optional). Defaults to a default message if not provided.
- `bool|null $wrap`: Determines whether to wrap the data (optional). Uses configuration setting if null.
- `string|null $wrapKey`: The key for wrapping the data (optional). Uses configuration setting if null.
- `int $statusCode`: The HTTP status code (default is 200).

**Returns:**

- `IlluminateJsonResponse`: A JSON response with the provided data, message, and headers.

**Usage Example:**

```php
$response = JsonResponse::successWithHeaders(['user' => $user], ['X-Custom-Header' => 'Value']);
```

**Example Response:**

```json
{
  "status": 200,
  "message": "Success",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe"
    }
  }
}
```

### `successWithPagination()`

Returns a JSON response with a successful status code (200), data, and pagination information.

**Parameters:**

- `mixed $data`: The data to include in the response (array or object).
- `array $pagination`: Pagination information including current page, total pages, etc.
- `string|null $message`: The success message (optional). Defaults to a default message if not provided.
- `bool|null $wrap`: Determines whether to wrap the data (optional). Uses configuration setting if null.
- `string|null $wrapKey`: The key for wrapping the data (optional). Uses configuration setting if null.
- `int $statusCode`: The HTTP status code (default is 200).

**Returns:**

- `IlluminateJsonResponse`: A JSON response with the provided data, message, and pagination information.

**Usage Example:**

```php
$response = JsonResponse::successWithPagination(['users' => $users], ['current_page' => 1, 'total_pages' => 10], 'Users fetched successfully.');
```

**Example Response:**

```json
{
  "status": 200,
  "message": "Users fetched successfully.",
  "data": {
    "users": [
      { "id": 1, "name": "John Doe" },
      { "id": 2, "name": "Jane Smith" }
    ]
  },
  "pagination": {
    "current_page": 1,
    "total_pages": 10
  }
}
```

### `error()`

Returns a JSON response with an error status code and an error message.

**Parameters:**

- `int $statusCode`: The HTTP status code (e.g., 400, 404, 500).
- `string|null $message`: The error message (optional). Defaults to a default message if not provided.
- `mixed $data`: The data to include in the response (optional, array or object).
- `bool|null $wrap`: Determines whether to wrap the data (optional). Uses configuration setting if null.
- `string|null $wrapKey`: The key for wrapping the data (optional). Uses configuration setting if null.

**Returns:**

- `IlluminateJsonResponse`: A JSON response with the provided status code, message, and data.

**Usage Example:**

```php
$response = JsonResponse::error(404, 'Resource not found.');
```

**Example Response:**

```json
{
  "status": 404,
  "message": "Resource not found.",
  "data": {}
}
```

### `errorWithTrace()`

Returns a JSON response with an error status code, an error message, and technical details for debugging.

**Parameters:**

- `int $statusCode`: The HTTP status code (e.g., 400, 404, 500).
- `string|null $message`: The error message (optional). Defaults to a default message if not provided.
- `mixed $data`: The data to include in the response (optional, array or object).
- `bool|null $wrap`: Determines whether to wrap the data (optional). Uses configuration setting if null.
- `string|null $wrapKey`: The key for wrapping the data (optional). Uses configuration setting if null.
- `string|null $trace`: The technical details or stack trace (optional).

**Returns:**

- `IlluminateJsonResponse`: A JSON response with the provided status code, message, data, and trace.

**Usage Example:**

```php
$response = JsonResponse::errorWithTrace(500, 'Internal server error', null, null, null, 'Stack trace details...');
```

**Example Response:**

```json
{
  "status": 500,
  "message": "Internal server error",
  "data": {},
  "trace": "Stack trace details..."
}
```

### `errorWithSuggestions()`

Returns a JSON response with an error status code, an error message, and suggestions for resolving the issue.

**Parameters:**

- `int $statusCode`: The HTTP status code (e.g., 400, 404, 500).
- `string|null $message`: The error message (optional). Defaults to a default message if not provided.
- `array $suggestions`: An array of suggestions or tips to help the user resolve the issue.
- `mixed $data`: The data to include in the response (optional, array or object).
- `bool|null $wrap`: Determines whether to wrap the data (optional). Uses configuration setting if null.
- `string|null $wrapKey`: The key for wrapping the data (optional). Uses configuration setting if null.

**Returns:**

- `IlluminateJsonResponse`: A JSON response with the provided status code, message, data, and suggestions.

**Usage Example:**

```php
$response = JsonResponse::errorWithSuggestions(400, 'Bad request', ['Check the request parameters'], null);
```

**Example Response:**

```json
{
  "status": 400,
  "message": "Bad request",
  "data": {},
  "suggestions": ["Check the request parameters"]
}
```

### `buildResponse()`

Builds and returns the JSON response with the standardized structure.

**Returns:**

- `IlluminateJsonResponse`: The final JSON response with the standardized structure.

**Usage Example:**

```php
$response = (new JsonResponse(200, 'Success', $data))->buildResponse();
```

**Example Response:**

```json
{
  "status": 200,
  "message": "Success",
  "data": {
    "example_key": "example_value"
  }
}
```

---

Feel free to integrate this documentation into your package's README or any other relevant documentation resources. If you need further customization or additional details, let me know!
