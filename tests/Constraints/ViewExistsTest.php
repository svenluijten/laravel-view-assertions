<?php

namespace Sven\LaravelViewAssertions\Tests\Constraints;

use Illuminate\Support\Facades\View;
use Sven\LaravelViewAssertions\Constraints\ViewExists;
use Sven\LaravelViewAssertions\Tests\TestCase;

class ViewExistsTest extends TestCase
{
    /** @test */
    public function a_view_exists(): void
    {
        $this->makeView('exists');

        $this->assertTrue((new ViewExists)->evaluate('exists', returnResult: true));
    }

    /** @test */
    public function a_view_with_a_different_extension_exists(): void
    {
        // /** @var \Illuminate\View\ViewFinderInterface $finder */
        // $finder = app('view.finder');
        // $finder->addExtension('html.twig');

        View::addExtension('.html.twig', 'blade');

        $this->makeView('different-extension', extension: '.html.twig');

        $this->assertTrue((new ViewExists)->evaluate('different-extension', returnResult: true));
    }

    /** @test */
    public function a_view_does_not_exist(): void
    {
        $this->assertFalse((new ViewExists)->evaluate('does-not-exist', returnResult: true));
    }
}
