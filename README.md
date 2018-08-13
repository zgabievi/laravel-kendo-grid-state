# Laravel Kendo Grid State

[![Build Status](https://travis-ci.org/zgabievi/kendo-grid-state.svg?branch=master)](https://travis-ci.org/zgabievi/kendo-grid-state)
[![styleci](https://styleci.io/repos/144536973/shield)](https://styleci.io/repos/144536973)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/zgabievi/laravel-kendo-grid-state/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/zgabievi/laravel-kendo-grid-state/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/CHANGEME/mini.png)](https://insight.sensiolabs.com/projects/CHANGEME)
[![Coverage Status](https://coveralls.io/repos/github/zgabievi/laravel-kendo-grid-state/badge.svg?branch=master)](https://coveralls.io/github/zgabievi/laravel-kendo-grid-state?branch=master)

[![Packagist](https://img.shields.io/packagist/v/zgabievi/kendo-grid-state.svg)](https://packagist.org/packages/zgabievi/kendo-grid-state)
[![Packagist](https://poser.pugx.org/zgabievi/kendo-grid-state/d/total.svg)](https://packagist.org/packages/zgabievi/kendo-grid-state)
[![Packagist](https://img.shields.io/packagist/l/zgabievi/kendo-grid-state.svg)](https://packagist.org/packages/zgabievi/kendo-grid-state)

Package description: CHANGE ME

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
