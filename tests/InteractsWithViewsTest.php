<?php

namespace Sven\LaravelViewAssertions\Tests;

use Sven\LaravelViewAssertions\InteractsWithViews;

class InteractsWithViewsTest extends TestCase
{
    use InteractsWithViews;

    /** @test */
    public function views_existance(): void
    {
        $this->makeView('exists');
        $this->makeView('also-exists');

        $this->assertViewExists('exists');
        $this->assertViewsExist(['exists', 'also-exists']);
        $this->assertViewDoesNotExist('does-not-exist');
        $this->assertViewsDoNotExist(['does-not-exist', 'also-does-not-exist']);
    }

    /** @test */
    public function views_equal(): void
    {
        $this->makeView('one', 'hello');
        $this->makeView('two', 'goodbye');

        $this->assertViewEquals('hello', 'one');
        $this->assertViewDoesNotEqual('farewell', 'two');
    }
}
