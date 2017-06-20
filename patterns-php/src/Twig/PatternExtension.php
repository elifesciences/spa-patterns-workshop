<?php

namespace SomeCompany\Patterns\Twig;

use SomeCompany\Patterns\Pattern;
use SomeCompany\Patterns\PatternRenderer;
use Twig_Extension;
use Twig_Function;

final class PatternExtension extends Twig_Extension
{
    private $renderer;

    public function __construct(PatternRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function getFunctions()
    {
        return [
            new Twig_Function(
                'render_pattern',
                [$this, 'renderPattern'],
                ['is_safe' => ['html']]
            ),
        ];
    }

    public function renderPattern(Pattern $pattern) : string
    {
        return $this->renderer->render($pattern);
    }
}
