![Laravel View Assertions](https://user-images.githubusercontent.com/11269635/115122193-f2b8e580-9fb6-11eb-9604-eb8ba59cc445.jpg)

# Laravel View Assertions

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-build]][link-build]
[![StyleCI][ico-styleci]][link-styleci]

The missing assertions for your views in your Laravel applications.

## Installation
You'll have to follow a couple of simple steps to install this package.

### Downloading
Via [composer](http://getcomposer.org):

```bash
$ composer require sven/laravel-view-assertions --dev
```

Or add the package to your dependencies in `composer.json` and run
`composer update` on the command line to download the package:

```json
{
    "require-dev": {
        "sven/laravel-view-assertions": "^1.1"
    }
}
```

## Usage
This package exposes a single trait: `\Sven\LaravelViewAssertions\InteractsWithViews`.
When you `use` this trait in your tests as below, you'll get access to several assertions:

```php
<?php

use Sven\LaravelViewAssertions\InteractsWithViews;
use Illuminate\Foundation\Testing\TestCase;

class ExampleTest extends TestCase
{
    use InteractsWithViews;

    public function test_it_creates_a_view()
    {
        // ...
        
        $this->assertViewExists('some.view-file');
        $this->assertViewsExist(['posts.index', 'posts.show']);
    }

    public function test_it_does_not_create_a_view()
    {
        // ...
        
        $this->assertViewDoesNotExist('some.view-file');
        $this->assertViewsDoNotExist(['posts.edit', 'posts.create']);
    }

    public function test_the_view_equals()
    {
        // ...
        
        $this->assertViewEquals('The Expected Contents', 'index');
    }

    public function test_the_view_does_not_equal()
    {
        // ...
        
        $this->assertViewDoesNotEqual('This Is Not The Content You\'re Looking For', 'index');
    }
}
```

## Contributing
All contributions (pull requests, issues and feature requests) are
welcome. Make sure to read through the [CONTRIBUTING.md](CONTRIBUTING.md) first,
though. See the [contributors page](../../graphs/contributors) for all contributors.

## License
`sven/laravel-view-assertions` is licensed under the MIT License (MIT). Please see the
[license file](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/sven/laravel-view-assertions.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-green.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sven/laravel-view-assertions.svg?style=flat-square
[ico-build]: https://img.shields.io/github/actions/workflow/status/svenluijten/laravel-view-assertions/run-tests.yml?style=flat-square
[ico-styleci]: https://styleci.io/repos/358929420/shield

[link-packagist]: https://packagist.org/packages/sven/laravel-view-assertions
[link-downloads]: https://packagist.org/packages/sven/laravel-view-assertions
[link-build]: https://github.com/svenluijten/laravel-view-assertions/actions/workflows/run-tests.yml
[link-styleci]: https://styleci.io/repos/358929420
