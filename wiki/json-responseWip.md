# **JsonResponse Class Documentation**

## 📚 Overview

The `JsonResponse` class provides methods to generate standardized JSON responses with a consistent structure. It includes methods for handling successful responses, error responses, and custom responses with additional features like metadata, pagination, and trace information. This documentation provides detailed explanations for each method, including parameters, functionality, and usage examples.

## 📝 **Table of Contents**

1. [✔️ Success](#success)
   - [How to use](#how-to-use-success)
   - [Examples](#examples-success)
2. [❌ Error](#error)
   - [How to use](#how-to-use-error)
   - [Examples](#examples-error)
3. [✔️ SuccessWithMeta](#successwithmeta)
   - [How to use](#how-to-use-successwithmeta)
   - [Examples](#examples-successwithmeta)
4. [❌ ErrorWithSuggestions](#errorwithsuggestions)
   - [How to use](#how-to-use-errorwithsuggestions)
   - [Examples](#examples-errorwithsuggestions)
5. [✔️ SuccessWithPagination](#successwithpagination)
   - [How to use](#how-to-use-successwithpagination)
   - [Examples](#examples-successwithpagination)
6. [✔️ SuccessWithTrace](#successwithtrace)
   - [How to use](#how-to-use-successwithtrace)
   - [Examples](#examples-successwithtrace)

---

## ✔️ **Success**

### 📖 **Description**

Generates a successful JSON response with a customizable message and data.

### 🔧 **Parameters**

- `mixed $data` – The data to include in the response.
- `string|null $message` – Optional success message (default: 'success').
- `bool|null $wrap` – Whether to wrap the data (default: configuration setting).
- `string|null $wrapKey` – Key to wrap the data (default: configuration setting).
- `int $statusCode` – HTTP status code (default: 200).

### 🛠️ **How to use** {#how-to-use-success}

![how_to_use_success](/wiki/imgs/jsonResponse/how_to_use_success.png)

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::success($data, 'Operation successful.');
```

</details>

### **Examples** {#examples-success}

**Example 1:**
Generates a success response with user details.

![Example 1](/wiki/imgs/jsonResponse/example_1_success.png)

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::success($userData, 'User details retrieved successfully.');
```

</details>

**Example 2:**
Generates a success response with product details and a custom status code.

![Example 2](/wiki/imgs/jsonResponse/example_2_success.png)

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::success($productData, 'Product details retrieved successfully.', true, 'product');
```

</details>

---

## ❌ **Error**

### 📖 **Description**

Generates an error JSON response with a customizable status code, message, and data.

### 🔧 **Parameters**

- `int $statusCode` – HTTP status code.
- `string|null $message` – Optional error message (default: 'server_error').
- `mixed $data` – Optional data to include in the response.
- `bool|null $wrap` – Whether to wrap the data (default: configuration setting).
- `string|null $wrapKey` – Key to wrap the data (default: configuration setting).

### 🛠️ **How to use** {#how-to-use-error}

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::error(400, 'Bad request.', $data);
```

</details>

### **Examples** {#examples-error}

**Example 1:**
Generates an error response for a resource not found.

![Example 1](/wiki/imgs/jsonResponse/example_1_error.png)

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::error(404, 'Resource not found.');
```

</details>

---

## ✔️ **SuccessWithMeta**

### 📖 **Description**

Generates a successful JSON response with additional metadata.

### 🔧 **Parameters**

- `mixed $data` – The data to include in the response.
- `array $meta` – Metadata to include in the response.
- `string|null $message` – Optional success message (default: 'success').
- `bool|null $wrap` – Whether to wrap the data (default: configuration setting).
- `string|null $wrapKey` – Key to wrap the data (default: configuration setting).
- `int $statusCode` – HTTP status code (default: 200).

### 🛠️ **How to use** {#how-to-use-successwithmeta}

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::successWithMeta($data, $meta, 'Operation successful.');
```

</details>

### **Examples** {#examples-successwithmeta}

**Example 1:**
Generates a success response with user details and metadata about the request.

![Example 1](/wiki/imgs/jsonResponse/example_1_success_with_meta.png)

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::successWithMeta($userData, ['request_time' => now()], 'User details retrieved successfully.');
```

</details>

---

## ❌ **ErrorWithSuggestions**

### 📖 **Description**

Generates an error JSON response with suggested actions to resolve the issue.

### 🔧 **Parameters**

- `int $statusCode` – HTTP status code.
- `string|null $message` – Optional error message (default: 'server_error').
- `mixed $data` – Optional data to include in the response.
- `bool|null $wrap` – Whether to wrap the data (default: configuration setting).
- `string|null $wrapKey` – Key to wrap the data (default: configuration setting).
- `array $suggestions` – Suggestions for resolving the error.

### 🛠️ **How to use** {#how-to-use-errorwithsuggestions}

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::errorWithSuggestions(400, 'Bad request.', $data, ['Check request parameters']);
```

</details>

### **Examples** {#examples-errorwithsuggestions}

**Example 1:**
Generates an error response with suggestions to check request parameters.

![Example 1](/wiki/imgs/jsonResponse/example_1_error_with_suggestions.png)

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::errorWithSuggestions(400, 'Bad request.', null, ['Ensure all required parameters are included.']);
```

</details>

---

## ✔️ **SuccessWithPagination**

### 📖 **Description**

Generates a successful JSON response with pagination information.

### 🔧 **Parameters**

- `mixed $data` – The data to include in the response.
- `array $pagination` – Pagination information.
- `string|null $message` – Optional success message (default: 'success').
- `bool|null $wrap` – Whether to wrap the data (default: configuration setting).
- `string|null $wrapKey` – Key to wrap the data (default: configuration setting).
- `int $statusCode` – HTTP status code (default: 200).

### 🛠️ **How to use** {#how-to-use-successwithpagination}

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::successWithPagination($data, ['page' => 1, 'total_pages' => 10], 'Data retrieved successfully.');
```

</details>

### **Examples** {#examples-successwithpagination}

**Example 1:**
Generates a success response with user list and pagination information.

![Example 1](/wiki/imgs/jsonResponse/example_1_success_with_pagination.png)

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::successWithPagination($userData, ['page' => 1, 'total_pages' => 5], 'Users retrieved successfully.');
```

</details>

---

## ✔️ **SuccessWithTrace**

### 📖 **Description**

Generates a successful JSON response with trace information for debugging purposes.

### 🔧 **Parameters**

- `mixed $data` – The data to include in the response.
- `array $trace` – Trace information for debugging.
- `string|null $message` – Optional success message (default: 'success').
- `bool|null $wrap` – Whether to wrap the data (default: configuration setting).
- `string|null $wrapKey` – Key to wrap the data (default: configuration setting).
- `int $statusCode` – HTTP status

code (default: 200).

### 🛠️ **How to use** {#how-to-use-successwithtrace}

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::successWithTrace($data, ['trace' => debug_backtrace()], 'Operation successful.');
```

</details>

### **Examples** {#examples-successwithtrace}

**Example 1:**
Generates a success response with trace information for debugging.

![Example 1](/wiki/imgs/jsonResponse/example_1_success_with_trace.png)

<details>
<summary>Click to view code</summary>

```php
use Doliveira\LaravelResponseBuilder\JsonResponse;

return JsonResponse::successWithTrace($userData, ['trace' => debug_backtrace()], 'User details retrieved successfully.');
```

</details>

---

## **Links**

- [JsonResponse Class Documentation](#overview)
- [Success](#success)
- [Error](#error)
- [SuccessWithMeta](#successwithmeta)
- [ErrorWithSuggestions](#errorwithsuggestions)
- [SuccessWithPagination](#successwithpagination)
- [SuccessWithTrace](#successwithtrace)
