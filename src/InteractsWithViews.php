<?php

namespace Sven\LaravelViewAssertions;

use PHPUnit\Framework\Assert as PHPUnit;
use Sven\LaravelViewAssertions\Constraints\ViewDoesNotEqual;
use Sven\LaravelViewAssertions\Constraints\ViewDoesNotExist;
use Sven\LaravelViewAssertions\Constraints\ViewEquals;
use Sven\LaravelViewAssertions\Constraints\ViewExists;

trait InteractsWithViews
{
    public function assertViewExists(string $name, string $message = ''): void
    {
        PHPUnit::assertThat($name, new ViewExists, $message);
    }

    public function assertViewsExist(array $names): void
    {
        foreach ($names as $name) {
            $this->assertViewExists($name);
        }
    }

    public function assertViewDoesNotExist(string $name, string $message = ''): void
    {
        PHPUnit::assertThat($name, new ViewDoesNotExist, $message);
    }

    /** @deprecated */
    public function assertViewNotExists(string $name, string $message = ''): void
    {
        $this->assertViewDoesNotExist($name, $message);
    }

    public function assertViewsDoNotExist(array $names): void
    {
        foreach ($names as $name) {
            $this->assertViewDoesNotExist($name);
        }
    }

    public function assertViewEquals(string $expected, string $view, string $message = ''): void
    {
        PHPUnit::assertThat($view, new ViewEquals($expected), $message);
    }

    public function assertViewDoesNotEqual(string $expected, string $view, string $message = ''): void
    {
        PHPUnit::assertThat($view, new ViewDoesNotEqual($expected), $message);
    }

    /** @deprecated */
    public function assertViewNotEquals(string $expected, string $view, string $message = ''): void
    {
        $this->assertViewDoesNotEqual($expected, $view, $message);
    }
}
