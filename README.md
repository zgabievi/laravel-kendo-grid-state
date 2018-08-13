# Laravel Kendo Grid State

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zgabievi/kendo-grid-state.svg?style=flat-square)](https://packagist.org/packages/beyondcode/laravel-self-diagnosis)
[![Build Status](https://img.shields.io/travis/zgabievi/laravel-kendo-grid-state/master.svg?style=flat-square)](https://travis-ci.org/zgabievi/laravel-kendo-grid-state)
[![Quality Score](https://img.shields.io/scrutinizer/g/zgabievi/laravel-kendo-grid-state.svg?style=flat-square)](https://scrutinizer-ci.com/g/zgabievi/laravel-kendo-grid-state)
[![Total Downloads](https://img.shields.io/packagist/dt/zgabievi/kendo-grid-state.svg?style=flat-square)](https://packagist.org/packages/zgabievi/kendo-grid-state)

**DESCRIPTION HERE**

## Installation

Install via composer
```bash
composer require zgabievi/kendo-grid-state
```

### Register Service Provider

**Note! This and next step are optional if you use laravel>=5.5 with package
auto discovery feature.**

Add service provider to `config/app.php` in `providers` section
```php
Zgabievi\KendoGridState\ServiceProvider::class,
```

### Register Facade

Register package facade in `config/app.php` in `aliases` section
```php
Zgabievi\KendoGridState\Facades\KendoGridState::class,
```

### Publish Configuration File

```bash
php artisan vendor:publish --provider="Zgabievi\KendoGridState\ServiceProvider" --tag="config"
```

## Usage

CHANGE ME

## Security

If you discover any security related issues, please email zura.gabievi@gmail.com
instead of using the issue tracker.

## Credits

- [Zura Gabievi](https://github.com/zgabievi/kendo-grid-state)
- [All contributors](https://github.com/zgabievi/kendo-grid-state/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).


### Reminder
- `use Filterable`
- `config/database.php` > `"strict" => false`
