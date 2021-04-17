<?php

namespace Sven\LaravelViewAssertions\Tests\Constraints;

use Sven\LaravelViewAssertions\Constraints\ViewNotEquals;
use Sven\LaravelViewAssertions\Tests\TestCase;

class ViewNotEqualsTest extends TestCase
{
    /** @test */
    public function the_contents_of_a_view_do_not_equal_the_given_value(): void
    {
        $this->makeView('viewname', 'Contents of the view');

        $constraint = new ViewNotEquals('Other contents');

        $this->assertTrue($constraint->evaluate('viewname', '', true));
    }

    /** @test */
    public function the_contents_of_a_view_equal_the_given_value(): void
    {
        $this->makeView('viewname', 'Contents of the view');

        $constraint = new ViewNotEquals('Contents of the view');

        $this->assertFalse($constraint->evaluate('viewname', '', true));
    }
}
