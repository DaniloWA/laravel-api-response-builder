<p align="center">
  <img src="https://img.shields.io/packagist/v/doliveira/laravel-api-response-builder" alt="Latest Version" />
  <img src="https://img.shields.io/packagist/dt/doliveira/laravel-api-response-builder" alt="Total Downloads" />
</p>

<p align="center">
  <strong>Simplify Your API Responses with Laravel API Response Builder!</strong> This package helps you create structured and formatted API responses in both JSON and XML formats effortlessly. It provides customizable status codes, messages, and data handling, making it a versatile tool for managing API responses, including error handling, logging, and extensive configuration options.
</p>

## 📚 Index

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
