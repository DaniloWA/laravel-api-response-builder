<p align="center">
  <img src="https://img.shields.io/packagist/v/doliveira/laravel-api-response-builder" alt="Latest Version" />
  <img src="https://img.shields.io/packagist/dt/doliveira/laravel-api-response-builder" alt="Total Downloads" />
</p>

<p align="center">
  <strong>Simplify Your API Responses with Laravel API Response Builder!</strong> This package helps you create structured and formatted API responses in both JSON and XML formats effortlessly. It provides customizable status codes, messages, and data handling, making it a versatile tool for managing API responses, including error handling, logging, and extensive configuration options.
</p>

## 📚 Index

<a href="#-how-to-use-resume" style="font-size: 18px; font-weight: bold;">🔍 How to Use</a>  
<span style="font-size: 15px; color: #666; ">Overview of the most commonly used methods and their brief descriptions.</span>

- [Features](#-features)
- [Requirements](#-requirements)
- [Installation](#-installation)
- [Translations](#-translations)
- [Technologies](#-technologies)
- [Concepts & Patterns](#-concepts--patterns)
- [Documentation](#-documentation)
- [Links](#-links)
- [Contributing](#-contributing)
- [License](#-license)
- [Contact](#-contact)

## 🚀 Features

- **Structured Responses:** Create consistent JSON and XML responses effortlessly.
- **Customizable Status Codes & Messages:** Adapt responses to fit your requirements.
- **Error Handling & Logging:** Detailed logging for both responses and requests.
- **Flexible Configuration:** Adjust settings for data wrapping, response languages, and more.

## ⚙️ Requirements

Ensure your project meets the following requirements before using this package:

- **Laravel Framework:** Version 8.12 or higher.
- **PHP:** Version 7.3 or higher.
- **Composer:** PHP dependency manager.

With these features in place, let’s dive into the installation process!

## 📦 Installation

To integrate the Laravel API Response Builder into your Laravel project, follow these steps:

1. **Install via Composer:**

Run the following command in your terminal:

```bash
composer require doliveira/laravel-api-response-builder
```

2. **Publish the Configuration (Optional):**

After installation, publish the configuration file:

```bash
php artisan vendor:publish --provider="Doliveira\LaravelResponseBuilder\Providers\ResponseBuilderServiceProvider"
```

This will create a configuration file at `config/responsebuilder.php`, where you can customize the package settings.

3. **Configuration:**

Open the `config/responsebuilder.php` file and adjust the settings as needed for your project. Configure options such as data wrappers, API key headers, and logging preferences.

With the configuration in place, your package is ready to go!

## 🌍 Translations

The **Laravel API Response Builder** supports multiple languages for API responses. By default, it includes English (`en`) and Brazilian Portuguese (`pt_BR`). To use translations in your project, follow these steps:

1. **Publish the Translation Files (Optional):**

If you wish to customize or add new languages, you can publish the translation files to your project by running:

```bash
php artisan vendor:publish --tag=lang
```

This will create a `resources/lang/vendor/responsebuilder` directory where you can modify or add new translation files (e.g., `es`, `fr`).

2. **Use Existing Translation Files:**

If you do not need custom translations, the package will automatically use the default language files from the `vendor/doliveira/laravel-api-response-builder/resources/lang` directory.

## 🧰 Technologies

The **Laravel API Response Builder** utilizes the following technologies:

- **Laravel Framework:** A PHP framework for web applications.
- **PHP:** The server-side scripting language.
- **JSON:** Data format for API responses.
- **XML:** Data format for API responses (currently under development).
- **Log:** Laravel's logging facilities for recording response details.

## 📚 Concepts & Patterns

The **Laravel API Response Builder** package integrates several advanced concepts and patterns designed to enhance API response management:

- **Response Wrapping:** This pattern wraps your response data in a unified format, ensuring consistency across all API responses. It includes customizable data wrappers that can be adjusted through the `config/responsebuilder.php` configuration file. This approach simplifies response handling and provides a clear structure for both successful and error responses.

- **Detailed Logging:** The package offers comprehensive logging capabilities for both responses and requests. Using Laravel’s built-in logging facilities, it captures key details such as response status, headers, and content. This feature supports various logging levels and allows you to specify log file paths, enabling efficient debugging and monitoring of your API interactions.

  _Example: You can view response logs in your designated log file, set in the configuration file under `logging.channels`. For instance, responses with status codes `500` will be logged as errors, helping you track and debug critical issues._

- **Flexible Configuration Management:** Leveraging Laravel’s configuration system, the package provides extensive options for customizing the response structure. You can easily configure data wrappers, API key headers, default status codes, and response languages. This flexibility allows you to tailor the package’s behavior to fit the specific needs of your project.

- **Standardized Error Handling:** The package standardizes the way error messages and statuses are generated. It provides a consistent approach to error responses, allowing for easier troubleshooting and improved user experience. Configuration options are available to adjust error message formats and response codes, ensuring that error handling aligns with your application’s requirements.

## 📝 How to Use Resume

In this section, we highlight the two most frequently used methods (**Success** and **Error** ) in the package for quick reference. For a comprehensive overview and detailed explanations of all available methods, including additional functionalities and usage scenarios, please consult the full documentation.

- **Success** - Returns a standard success response with optional data and a default message.
- **SuccessWithMeta** - Returns a success response with data and additional metadata.
- **SuccessWithHeaders** - Returns a success response with data and custom headers included.
- **SuccessWithPagination** - Returns a success response with data and pagination details.
- **Error** - Returns an error response with a specified status code and message.
- **ErrorWithTrace** - Returns an error response with an additional trace for debugging purposes.
- **ErrorWithSuggestions** - Returns an error response with suggestions for resolving the issue.

### Customizing Response Settings

You can customize the response structure and behavior in the package configuration file. Here are some key options:

- **Custom Response Structure:** Modify the default response keys (`status`, `message`, `data`) to fit your API needs.

  ```php
  /*
  |--------------------------------------------------------------------------
  | Custom Response Structure
  |--------------------------------------------------------------------------
  | Define a custom structure for responses. The example below includes
  | 'status', 'message', and 'data', but you can modify these as needed.
  |
  */
  'custom_response_structure' => [
      'status' => 'status',
      'message' => 'message',
      'data' => 'data',
  ],
  ```

- **Response Data Wrapper:** Enable or disable wrapping the response data in an additional `data` key. This helps maintain a consistent response structure.

  ```php
  /*
  |--------------------------------------------------------------------------
  | Response Data Wrapper
  |--------------------------------------------------------------------------
  | If enabled, the response data will be wrapped in an additional 'data'
  | key. This is useful if you want a consistent structure for all responses.
  |
  */
  'wrap_data' => true,
  ```

- **Response Data Wrapper Key:** Customize the key used to wrap the response data. The default key is `data`, but you can change it according to your API structure.

  ```php
  /*
  |--------------------------------------------------------------------------
  | Response Data Wrapper Key
  |--------------------------------------------------------------------------
  | This value sets the key used to wrap the response data. By default, it is
  | 'data', but you can customize it according to your API structure.
  |
  */
  'wrap_data_key' => 'items',
  ```

These configuration options allow you to tailor the response structure to fit the needs of your application and ensure consistency across your API responses.

---

### success()

**Description:**

The `success()` method returns a JSON response with a successful status code (200) and a success message. This is useful for standardizing success responses in your API.

**Parameters:**

- **`mixed $data`**:

  - **Optional**
  - **Type**: `array` or `object`
  - **Description**: The data to include in the response. This can be any data structure that you want to return to the client.
  - **Example**: `['user' => $user]` or `new User($userId)`.

- **`string|null $message`**:

  - **Optional**
  - **Type**: `string` or `null`
  - **Description**: The success message to include in the response. If not provided, a default message will be used. This parameter is optional.
  - **Example**: `'User fetched successfully.'` or `null`.

- **`bool|null $wrap`**:

  - **Optional**
  - **Type**: `bool` or `null`
  - **Description**: Determines whether to wrap the data in a wrapper object. If `true`, the data will be wrapped according to the configuration. If `false`, no wrapping will be applied. If `null`, the wrapping behavior will follow the default configuration setting. This parameter is optional.
  - **Example**: `true` | `false` or `null` .

- **`string|null $wrapKey`**:

  - **Optional**
  - **Type**: `string` or `null`
  - **Description**: The key for wrapping the data. If specified, the data will be wrapped under this key. If not provided, the default key from the configuration will be used. This parameter is optional.
  - **Example**: `'items'` or `null`.

- **`int $statusCode`**:
  - **Optional**
  - **Type**: `int`
  - **Description**: The HTTP status code for the response. Default is `200`, but can be changed if needed.
  - **Example**: `200` (for a successful request).

**Returns:**

- **`IlluminateJsonResponse`**: A JSON response object with the provided data and message.

**Usage Examples:**

0. **Default Success Response:**

   ```php
   $response = JsonResponse::success();
   ```

   - **Description**: Returns a JSON response with the user data and a default success message.
   - **Example Output:**
     ```json
     {
       "status": "success",
       "message": "Operation completed successfully.",
       "data": null
     }
     ```

1. **Basic Success Response:**

   ```php
   $response = JsonResponse::success(['user' => $user]);
   ```

   - **Description**: Returns a JSON response with the user data and a default success message.
   - **Example Output:**
     ```json
     {
       "status": "success",
       "message": "Operation successful.",
       "data": {
         "user": {
           "id": 1,
           "name": "John Doe",
           "email": "john.doe@example.com"
         }
       }
     }
     ```

2. **Success Response with Custom Message:**

   ```php
   $response = JsonResponse::success(['user' => $user], 'User fetched successfully.');
   ```

   - **Description**: Returns a JSON response with the user data and a custom success message.
   - **Example Output:**
     ```json
     {
       "status": "success",
       "message": "User fetched successfully.",
       "data": {
         "user": {
           "id": 1,
           "name": "John Doe",
           "email": "john.doe@example.com"
         }
       }
     }
     ```

3. **Success Response with Wrapping:**
   ```php
   $response = JsonResponse::success(['user' => $user], 'User fetched successfully.', true);
   ```
   - **Description**: Returns a JSON response with the user data wrapped under the key `'items'` by default and a custom success message.
   - **Example Output:**
     ```json
     {
       "status": "success",
       "message": "User fetched successfully.",
       "data": {
         "items": {
           "user": {
             "id": 1,
             "name": "John Doe",
             "email": "john.doe@example.com"
           }
         }
       }
     }
     ```
4. **Success Response with Custom Wrap key:**
   ```php
   $response = JsonResponse::success(['user' => $user], 'User fetched successfully.', true, 'customWrap');
   ```
   - **Description**: Returns a JSON response with the user data wrapped under the custom key `'customWrap'` and a custom success message.
   - **Example Output:**
     ```json
     {
       "status": "success",
       "message": "User fetched successfully.",
       "data": {
         "customWrap": {
           "user": {
             "id": 1,
             "name": "John Doe",
             "email": "john.doe@example.com"
           }
         }
       }
     }
     ```

---

### `error()`

**Description:**

The `error()` method returns a JSON response with an error status code and an error message. This is useful for standardizing error responses in your API.

**Parameters:**

- **`int $statusCode`**:

  - **Required**
  - **Type**: `int`
  - **Description**: The HTTP status code to indicate the type of error (e.g., 400 for Bad Request, 404 for Not Found, 500 for Internal Server Error).
  - **Example**: `404`.

- **`string|null $message`**:

  - **Optional**
  - **Type**: `string` or `null`
  - **Description**: The error message to include in the response. If not provided, a default error message will be used. This parameter is optional.
  - **Example**: `'Resource not found.'` or `null`.

- **`mixed $data`**:

  - **Optional**
  - **Type**: `array` or `object` or `null`
  - **Description**: The data to include in the response. This can be used to provide additional information about the error (e.g., validation errors). If not provided, no additional data will be included. This parameter is optional.
  - **Example**: `['field' => 'username', 'error' => 'Username is required.']` or `null`.

- **`bool|null $wrap`**:

  - **Optional**
  - **Type**: `bool` or `null`
  - **Description**: Determines whether to wrap the error data in a wrapper object. If `true`, the data will be wrapped according to the configuration. If `false`, no wrapping will be applied. If `null`, the wrapping behavior will follow the default configuration setting. This parameter is optional.
  - **Example**: `true` | `false` or `null`.

- **`string|null $wrapKey`**:

  - **Optional**
  - **Type**: `string` or `null`
  - **Description**: The key for wrapping the error data. If specified, the data will be wrapped under this key. If not provided, the default key from the configuration will be used. This parameter is optional.
  - **Example**: `'error'` or `null`.

**Returns:**

- **`IlluminateJsonResponse`**: A JSON response object with the provided status code, message, and data.

**Usage Examples:**

0. **Default Error Response**

   ```php
   $response = JsonResponse::error(404);
   ```

   - **Description**: Returns a JSON response with a `404` status code and a default error message.
   - **Example Output:**
     ```json
     {
       "status": "error",
       "message": "The requested resource could not be found.",
       "data": null
     }
     ```

1. **Basic Error Response:**

   ```php
   $response = JsonResponse::error(404, 'Resource not found.');
   ```

   - **Description**: Returns a JSON response with a `404` status code and a default error message.
   - **Example Output:**
     ```json
     {
       "status": "error",
       "message": "Resource not found.",
       "data": null
     }
     ```

2. **Error Response with Custom Message and Data:**

   ```php
   $response = JsonResponse::error(400, 'Bad request', ['field' => 'username', 'error' => 'Username is required.']);
   ```

   - **Description**: Returns a JSON response with a `400` status code, a custom error message, and additional data describing the validation error.
   - **Example Output:**
     ```json
     {
       "status": "error",
       "message": "Bad request",
       "data": {
         "field": "username",
         "error": "Username is required."
       }
     }
     ```

3. **Error Response with Wrapping:**
   ```php
   $response = JsonResponse::error(500, 'Internal server error', null, true);
   ```
   - **Description**: Returns a JSON response with a `500` status code and the error wrapped under the key `'items'` by default.
   - **Example Output:**
     ```json
     {
       "status": "error",
       "message": "Internal server error",
       "data": {
         "items": null
       }
     }
     ```
4. **Error Response with custom Wrap key:**
   ```php
   $response = JsonResponse::error(500, 'Internal server error', null, true, 'error');
   ```
   - **Description**: Returns a JSON response with a `500` status code and the error wrapped under the custom key `'error'`.
   - **Example Output:**
     ```json
     {
       "status": "error",
       "message": "Internal server error",
       "data": {
         "error": null
       }
     }
     ```

---

## 🌐 Documentation

### [JSON Response](./wiki/json-response.md)

- **Success** - [Description](./wiki/json-response.md#success) | [Examples](./wiki/json-response.md#success-examples)
- **SuccessWithMeta** - [Description](./wiki/json-response.md#successwithmeta) | [Examples](./wiki/json-response.md#successwithmeta-examples)
- **SuccessWithHeaders** - [Description](./wiki/json-response.md#successwithheaders) | [Examples](./wiki/json-response.md#successwithheaders-examples)
- **SuccessWithPagination** - [Description](./wiki/json-response.md#successwithpagination) | [Examples](./wiki/json-response.md#successwithpagination-examples)
- **Error** - [Description](./wiki/json-response.md#error) | [Examples](./wiki/json-response.md#error-examples)
- **ErrorWithTrace** - [Description](./wiki/json-response.md#errorwithtrace) | [Examples](./wiki/json-response.md#errorwithtrace-examples)
- **ErrorWithSuggestions** - [Description](./wiki/json-response.md#errorwithsuggestions) | [Examples](./wiki/json-response.md#errorwithsuggestions-examples)

### [Config](./wiki/config.md)

- **Custom Response Structure** - [Details](./wiki/config.md#custom-response-structure)
    - [Data Wrapper](./wiki/config.md#data-wrapper)
    - [API Key Header](./wiki/config.md#api-key-header)
    - [Response Language](./wiki/config.md#response-language)
    - [Default Status Code](./wiki/config.md#default-status-code)
    - [JSON Options](./wiki/config.md#json-options)
- **Logs** - [Details](./wiki/config.md#logs)
    - [Log Responses](./wiki/config.md#log-responses)
    - [Request Logging](./wiki/config.md#request-logging)
    - [Response Time Logging](./wiki/config.md#response-time-logging)
    - [Logging Level](./wiki/config.md#logging-level)
    - [Log Files Path](./wiki/config.md#log-files-path)

## 🔗 Links

- [Official Documentation](https://github.com/DaniloWA/laravel-api-response-builder)
- [GitHub Repository](https://github.com/DaniloWA/laravel-api-response-builder)
- [Support & Issues](https://github.com/DaniloWA/laravel-api-response-builder/issues)

## 🤝 Contributing

You can contribute by forking the repository and submitting a pull request.

## 📝 License

This package is licensed under the MIT License.

## 📬 Contact

For any questions or feedback, please reach out to:

- **Danilo Oliveira:** [daniloworkdev@gmail.com](mailto:daniloworkdev@gmail.com)
- **Website:** [daniloo.dev](http://www.daniloo.dev)

---

**Note:** This package is currently under development, and XML support is still in progress. As an early release, there might be bugs or incomplete features. We appreciate your patience and feedback.
