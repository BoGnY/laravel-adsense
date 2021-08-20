# Google Adsense Ads for Laravel 6.x, 7.x and 8.x

[![Latest Version][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]
[![Scrutinizer][ico-scrutinizer]][link-scrutinizer]
[![Code Coverage][ico-coverage]][link-coverage]
[![License][ico-license]][link-license]

Package for easily including Google Adsense Ad units in [Laravel 6.x, 7.x and 8.x][link-laravel] and [Lumen][link-lumen]. For use with Laravel 5.x use original [Mastergalen/Adsense-Ads package][link-mastergalen-adsense].

## Installation

### 1 - Dependency

In your project root run

The first step is using [Composer][link-composer] to install the package and automatically update your `composer.json` file, you can do this by running:

```shell
composer require martinbutt/laravel-adsense
```

### 2 - Set up config file

Run `php artisan config:publish martinbutt/laravel-adsense`.

Edit the generated config file in `/config/adsense.php` to add your ad units

```php
return [
    'client_id' => 'YOUR_CLIENT_ID', //Your Adsense client ID e.g. ca-pub-9508939161510421
    'ads' => [
        'responsive' => [
            'ad_slot' => 1111111111,
            'ad_format' => 'fluid',
            'ad_full_width_responsive' => true,
            'ad_style' => 'display:inline-block'
        ],
        'rectangle' => [
            'ad_slot' => 2222222222,
            'ad_style' => 'display:inline-block;width:300px;height:250px',
            'ad_full_width_responsive' => false,
            'ad_format' => 'auto'
        ]
    ]
];
```

### 3 - Register the provider with Laravel

You need to update your application configuration in order to register the package so it can be loaded by Laravel, just update your `config/app.php` file adding the following code at the end of your `'providers'` section:

> `config/app.php`

```php
<?php

return [
    // ...
    'providers' => [
        MartinButt\Laravel\Adsense\Providers\AdsenseServiceProvider::class,
        // ...
    ],
    // ...
];
```

#### Lumen

Go to `bootstrap/app.php` file and add this line:

```php
<?php
// ...

$app = new Laravel\Lumen\Application(
    dirname(__DIR__)
);

// ...

$app->register(MartinButt\Laravel\Adsense\Providers\AdsenseServiceProvider::class);

// ...

return $app;
```

### 4 - Register the alias with Laravel

> Note: facades are not supported in Lumen.

You may get access to the Google Adsense Ads services using following facades:

- `MartinButt\Laravel\Adsense\Facades\AdsenseFacade`

You can setup a short-version aliases for these facades in your `config/app.php` file. For example:

```php
<?php

return [
    // ...
    'aliases' => [
        'Adsense' => MartinButt\Laravel\Adsense\Facades\AdsenseFacade::class,
        // ...
    ],
    // ...
];
```

### 5 - Configuration

#### Publish config

In your terminal type

```shell
php artisan vendor:publish
```

or

```shell
php artisan vendor:publish --provider="MartinButt\Laravel\Adsense\Providers\AdsenseServiceProvider"
```

> Lumen does not support this command, for it you should copy the file `src/resources/config/adsense.php` to `config/adsense.php` of your project.

In `adsense.php` configuration file you can determine the properties of the default values and some behaviors.

## Usage
Add `{!! Adsense::javascript() !!}` in your `<head>` tag.

To show ads, add `{!! Adsense::ads('ads_unit') !!}`, where `ads_unit` is one of your ads units in your config file (for example `{!! Adsense::ads('responsive') !!}`).

Use `{!! Adsense::ads('ads_unit') !!}` every time you want to show an ad.

## Changelog

Please see the [CHANGELOG.md][link-changelog] file for more information on what has changed recently.

## Credits

- [Martin Butt][link-author]
- [Crypto Technology srl][link-coauthor1]
- [Luca Bognolo][link-coauthor2]
- [All Contributors][link-contributors]

## License

The Google Adsense Ads is open-sourced software licensed under the [MIT license][link-mit-license].  
Please see the [LICENSE.md][link-license] file for more information.

[ico-version]: https://img.shields.io/packagist/v/martinbutt/laravel-adsense.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/martinbutt/laravel-adsense.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/martinbutt/laravel-adsense/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/359045604/shield?style=flat-square
[ico-scrutinizer]: https://scrutinizer-ci.com/g/martinbutt/laravel-adsense/badges/quality-score.png?b=master
[ico-coverage]: https://scrutinizer-ci.com/g/martinbutt/laravel-adsense/badges/coverage.png
[ico-license]: https://img.shields.io/packagist/l/martinbutt/laravel-adsense?style=flat-square

[link-packagist]: https://packagist.org/packages/martinbutt/laravel-adsense
[link-downloads]: https://packagist.org/packages/martinbutt/laravel-adsense
[link-travis]: https://travis-ci.com/martinbutt/laravel-adsense
[link-styleci]: https://styleci.io/repos/359045604
[link-scrutinizer]: https://scrutinizer-ci.com/g/martinbutt/laravel-adsense/?branch=master
[link-coverage]: https://scrutinizer-ci.com/g/martinbutt/laravel-adsense
[link-laravel]: https://laravel.com
[link-lumen]: https://lumen.laravel.com
[link-mastergalen-adsense]: https://github.com/Mastergalen/Adsense-Ads
[link-composer]: https://getcomposer.org
[link-license]: LICENSE.md
[link-changelog]: CHANGELOG.md
[link-author]: https://www.martinbutt.com
[link-coauthor1]: https://cryptotech.srl
[link-coauthor2]: https://bogny.eu
[link-contributors]: ../../contributors
[link-mit-license]: https://opensource.org/licenses/MIT
