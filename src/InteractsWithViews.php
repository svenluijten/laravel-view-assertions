<?php

namespace Sven\LaravelViewAssertions;

use PHPUnit\Framework\Assert as PHPUnit;
use Sven\LaravelViewAssertions\Constraints\ViewEquals;
use Sven\LaravelViewAssertions\Constraints\ViewExists;
use Sven\LaravelViewAssertions\Constraints\ViewNotEquals;
use Sven\LaravelViewAssertions\Constraints\ViewNotExists;

trait InteractsWithViews
{
    public function assertViewExists(string $name, string $message = ''): void
    {
        PHPUnit::assertThat($name, new ViewExists, $message);
    }

    public function assertViewNotExists(string $name, string $message = ''): void
    {
        PHPUnit::assertThat($name, new ViewNotExists, $message);
    }

    public function assertViewEquals(string $expected, string $view, string $message = ''): void
    {
        PHPUnit::assertThat($view, new ViewEquals($expected), $message);
    }

    public function assertViewNotEquals(string $expected, string $view, string $message = ''): void
    {
        PHPUnit::assertThat($view, new ViewNotEquals($expected), $message);
    }
}
