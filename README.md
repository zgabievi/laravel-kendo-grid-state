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

## Usage

To use this package you only need to add `Filterable` trait to your model

**Example:**

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

**URL Examples:**

- `https://domain.com/api/posts?take=5`
- `https://domain.com/api/posts?skip=5&take=2`
- `https://domain.com/api/posts?sort[0][field]=title&sort[0][dir]=desc`
- `https://domain.com/api/posts?filter[logic]=and&filter[filters][0][field]=title&filter[filters][0][operator]=eq&filter[filters][0][value]=POST_TITLE`

**Query Parameters:**

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

## Credits

- [Zura Gabievi](https://github.com/zgabievi/kendo-grid-state)
- [All contributors](https://github.com/zgabievi/kendo-grid-state/graphs/contributors)


