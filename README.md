# Laravel Kendo Grid State

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zgabievi/kendo-grid-state.svg?style=flat-square)](https://packagist.org/packages/beyondcode/laravel-self-diagnosis)
[![Build Status](https://img.shields.io/travis/zgabievi/laravel-kendo-grid-state/master.svg?style=flat-square)](https://travis-ci.org/zgabievi/laravel-kendo-grid-state)
[![Quality Score](https://img.shields.io/scrutinizer/g/zgabievi/laravel-kendo-grid-state.svg?style=flat-square)](https://scrutinizer-ci.com/g/zgabievi/laravel-kendo-grid-state)
[![Total Downloads](https://img.shields.io/packagist/dt/zgabievi/kendo-grid-state.svg?style=flat-square)](https://packagist.org/packages/zgabievi/kendo-grid-state)

Do you love to use Kendo Grid on your website? Have you ever tried to manage it's state to return correct data? With the help of this package, it will only take you several seconds now. You just need to install our helper, and tell us on which model should it work... Done! 

## Installation

Install via composer
```bash
composer require zgabievi/kendo-grid-state
```

## Usage

To use this package you only need to add `Filterable` trait to your model

#### Example:

```php
 namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 use Zgabievi\KendoGridState\Traits\Filterable;
 
 class Post extends Model
 {
     use Filterable;
     
     //
 }
```

#### URL Examples:

- `https://domain.com/api/posts?take=5`
- `https://domain.com/api/posts?skip=5&take=2`
- `https://domain.com/api/posts?sort[0][field]=title&sort[0][dir]=desc`
- `https://domain.com/api/posts?filter[logic]=and&filter[filters][0][field]=title&filter[filters][0][operator]=eq&filter[filters][0][value]=POST_TITLE`

#### Query Parameters:

- **filter?**
  - **filters[]**
    - **field?** (string | Function)
    - **ignoreCase?** (boolean)
    - **operator** ("eq", "neq", "isnull", "isnotnull", "lt", "lte", "gt", "gte", "startswith", "endswith", "contains", "doesnotcontain", "isempty", "isnotempty")
    - **value?** (any)
  - **logic** ("or", "and")
- **group?[]**
  - **aggregates?[]**
    - **aggregate** ("count", "sum", "average", "min", "max")
    - **field** (string)
  - **dir?** ("asc", "desc")
  - **field** (string)
- **skip?** (number)
- **sort?**
  - **dir?** ("asc", "desc")
  - **field** (string)
- **take?** (number)

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email zura.gabievi@gmail.com instead of using the issue tracker.

## Credits

- [Zura Gabievi](https://github.com/zgabievi/kendo-grid-state)
- [All contributors](https://github.com/zgabievi/kendo-grid-state/graphs/contributors)

## License

The MIT License (MIT). Please see [License file](LICENSE) for more information.
