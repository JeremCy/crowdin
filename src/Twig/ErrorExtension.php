<?php

namespace App\Twig;

use Symfony\Component\Form\FormErrorIterator;
use Symfony\Component\Form\FormView;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class ErrorExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('error_first', [$this, 'getFirst']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('hasError', [$this, 'hasError']),
        ];
    }

    public function getFirst(FormView $property): string
    {
        if (!$this->hasError($property)) {
            return '';
        }
        /**
         * @var FormErrorIterator
         */
        $errors = $property->vars['errors'];

        return $errors->offsetGet(0)->getMessage();
    }

    public function hasError(FormView $property): bool
    {
        /**
         * @var FormErrorIterator
         */
        $errors = $property->vars['errors'];

        return 0 < $errors->count();
    }
}
