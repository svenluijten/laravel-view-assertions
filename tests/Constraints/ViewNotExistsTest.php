<?php

namespace Sven\LaravelViewAssertions\Tests\Constraints;

use Sven\LaravelViewAssertions\Constraints\ViewNotExists;
use Sven\LaravelViewAssertions\Tests\TestCase;

class ViewNotExistsTest extends TestCase
{
    /** @test */
    public function a_view_exists(): void
    {
        $this->assertTrue((new ViewNotExists)->evaluate('does-not-exist', '', true));
    }

    /** @test */
    public function a_view_does_not_exist(): void
    {
        $this->makeView('exists');

        $this->assertFalse((new ViewNotExists)->evaluate('exists', '', true));
    }
}
