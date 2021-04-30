<?php

namespace Sven\LaravelViewAssertions\Constraints;

use PHPUnit\Framework\Constraint\Constraint;

class ViewDoesNotEqual extends Constraint
{
    public function __construct(protected string $expected)
    {
        //
    }

    protected function matches($other): bool
    {
        /** @var \Illuminate\View\ViewFinderInterface $finder */
        $finder = app('view.finder');

        $contents = file_get_contents($finder->find($other));

        if ($contents === false) {
            return false;
        }

        return $this->expected !== $contents;
    }

    protected function failureDescription($other): string
    {
        return 'the content of the view ' . parent::failureDescription($other);
    }

    public function toString(): string
    {
        return 'does not equal the specified value';
    }
}
