<?php

namespace Sven\LaravelViewAssertions\Tests\Constraints;

use Sven\LaravelViewAssertions\Constraints\ViewDoesNotExist;
use Sven\LaravelViewAssertions\Tests\TestCase;

class ViewDoesNotExistTest extends TestCase
{
    /** @test */
    public function a_view_exists(): void
    {
        $this->assertTrue((new ViewDoesNotExist)->evaluate('does-not-exist', '', true));
    }

    /** @test */
    public function a_view_does_not_exist(): void
    {
        $this->makeView('exists');

        $this->assertFalse((new ViewDoesNotExist)->evaluate('exists', '', true));
    }
}
