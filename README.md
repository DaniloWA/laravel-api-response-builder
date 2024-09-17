# Laravel API Response Builder

<p align="center">
  <img src="https://raw.githubusercontent.com/lwwcas/laravel-countries/master/assets/map.jpg" alt="Laravel API Response Builder"/>
</p>

<p align="center">
  <img src="https://img.shields.io/packagist/v/doliveira/laravel-api-response-builder" alt="Latest Version" />
  <img src="https://img.shields.io/packagist/dt/doliveira/laravel-api-response-builder" alt="Total Downloads" />

</p>

<p align="center">
  Welcome to the <strong>Laravel API Response Builder</strong>! This package simplifies the creation of structured and formatted API responses in both JSON and XML formats. It provides customizable status codes, messages, and data handling, making it a versatile tool for managing API responses, including error handling, logging, and extensive configuration options.
</p>

## 📚 Index

- [Installation](#installation)
- [Technologies](#technologies)
- [Concepts & Patterns](#concepts--patterns)
- [Prerequisites](#prerequisites)
- [Documentation](#documentation)
- [Links](#links)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

## 🚀 Features

- **Structured Responses:** Create consistent JSON and XML responses effortlessly.
- **Customizable Status Codes & Messages:** Adapt responses to fit your requirements.
- **Error Handling & Logging:** Detailed logging for both responses and requests.
- **Flexible Configuration:** Adjust settings for data wrapping, response languages, and more.

## ⚙️ Prerequisites

Ensure your project meets the following requirements before using this package:

- **Laravel Framework:** Version 8.12 or higher.
- **PHP:** Version 7.3 or higher.
- **Composer:** PHP dependency manager.

## 📦 Installation

To integrate the Laravel API Response Builder into your Laravel project, follow these steps:

1. **Install via Composer:**

   Run the following command in your terminal:

   ```bash
   composer require doliveira/laravel-api-response-builder
   ```

2. **Publish the Configuration:**

   After installation, publish the configuration file:

   ```bash
   php artisan vendor:publish --provider="Doliveira\LaravelResponseBuilder\Providers\ResponseBuilderServiceProvider"
   ```

   This will create a configuration file at `config/responsebuilder.php` where you can customize the package settings.

3. **Configuration:**

   Open the `config/responsebuilder.php` file and adjust the settings as needed for your project. Configure options such as data wrappers, API key headers, and logging preferences.

## 🧰 Technologies

The **Laravel API Response Builder** utilizes the following technologies:

- **Laravel Framework:** A PHP framework for web applications.
- **PHP:** The server-side scripting language.
- **JSON:** Data format for API responses.
- **XML:** Data format for API responses (currently under development).
- **Log:** Laravel's logging facilities for recording response details.

Claro, aqui está uma versão aprimorada para a seção "Concepts & Patterns", baseada no código e na funcionalidade descrita:

---

## 📚 Concepts & Patterns

The **Laravel API Response Builder** package integrates several advanced concepts and patterns designed to enhance API response management:

- **Response Wrapping:** This pattern wraps your response data in a unified format, ensuring consistency across all API responses. It includes customizable data wrappers that can be adjusted through the `config/responsebuilder.php` configuration file. This approach simplifies response handling and provides a clear structure for both successful and error responses.

- **Detailed Logging:** The package offers comprehensive logging capabilities for both responses and requests. Using Laravel’s built-in logging facilities, it captures key details such as response status, headers, and content. This feature supports various logging levels and allows you to specify log file paths, enabling efficient debugging and monitoring of your API interactions.

- **Flexible Configuration Management:** Leveraging Laravel’s configuration system, the package provides extensive options for customizing the response structure. You can easily configure data wrappers, API key headers, default status codes, and response languages. This flexibility allows you to tailor the package’s behavior to fit the specific needs of your project.

- **Standardized Error Handling:** The package standardizes the way error messages and statuses are generated. It provides a consistent approach to error responses, allowing for easier troubleshooting and improved user experience. Configuration options are available to adjust error message formats and response codes, ensuring that error handling aligns with your application’s requirements.

## 🌐 Documentation

### [JSON Response](#json-response)

- **Auto** - [Description](#) | [Examples](#)
- **Success** - [Description](#) | [Examples](#)
- **Error** - [Description](#) | [Examples](#)

### [Config](#config)

- **Custom Response Structure** - [Details](#custom-response-structure)
  - [Data Wrapper](#data-wrapper)
  - [API Key Header](#api-key-header)
  - [Response Language](#response-language)
  - [Default Status Code](#default-status-code)
  - [JSON Options](#json-options)
- **Logs** - [Details](#logs)
  - [Log Responses](#log-responses)
  - [Request Logging](#request-logging)
  - [Response Time Logging](#response-time-logging)
  - [Logging Level](#logging-level)
  - [Log Files Path](#log-files-path)

## 🔗 Links

- [Official Documentation](#documentation)
- [GitHub Repository](https://github.com/doliveira/laravel-api-response-builder)
- [Support & Issues](https://github.com/doliveira/laravel-api-response-builder/issues)

## 🤝 Contributing

To contribute to the development of this package, please fork the repository and submit a pull request.

## 📝 License

This package is licensed under the MIT License.

## 📬 Contact

For any questions or feedback, please reach out to:

- **Danilo Oliveira:** [daniloworkdev@gmail.com](mailto:daniloworkdev@gmail.com)
- **Website:** [daniloo.dev](http://www.daniloo.dev)

---

**Note:** This package is currently under development, and XML support is still in progress. As an early release, there might be bugs or incomplete features. We appreciate your patience and feedback.