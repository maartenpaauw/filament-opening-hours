# This is my package filament-opening-hours

[![Latest Version on Packagist](https://img.shields.io/packagist/v/maartenpaauw/filament-opening-hours.svg?style=flat-square)](https://packagist.org/packages/maartenpaauw/filament-opening-hours)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/maartenpaauw/filament-opening-hours/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/maartenpaauw/filament-opening-hours/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/maartenpaauw/filament-opening-hours/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/maartenpaauw/filament-opening-hours/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/maartenpaauw/filament-opening-hours.svg?style=flat-square)](https://packagist.org/packages/maartenpaauw/filament-opening-hours)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require maartenpaauw/filament-opening-hours
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-opening-hours-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-opening-hours-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-opening-hours-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentOpeningHours = new Maartenpaauw\Filament\OpeningHours\FilamentOpeningHours();
echo $filamentOpeningHours->echoPhrase('Hello, Maartenpaauw\Filament\OpeningHours!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Maarten Paauw](https://github.com/maartenpaauw)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
