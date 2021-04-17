<?php

namespace Sven\LaravelViewAssertions\Tests\Constraints;

use Sven\LaravelViewAssertions\Constraints\ViewExists;
use Sven\LaravelViewAssertions\Tests\TestCase;

class ViewExistsTest extends TestCase
{
    /** @test */
    public function a_view_exists(): void
    {
        $this->makeView('exists');

        $this->assertTrue((new ViewExists)->evaluate('exists', '', true));
    }

    /** @test */
    public function a_view_does_not_exist(): void
    {
        $this->assertFalse((new ViewExists)->evaluate('does-not-exist', '', true));
    }
}
