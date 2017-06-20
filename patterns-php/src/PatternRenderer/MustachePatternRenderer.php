<?php

namespace SomeCompany\Patterns\PatternRenderer;

use Mustache_Engine;
use SomeCompany\Patterns\Pattern;
use SomeCompany\Patterns\PatternRenderer;

final class MustachePatternRenderer implements PatternRenderer
{
    private $mustache;

    public function __construct(Mustache_Engine $mustache)
    {
        $this->mustache = $mustache;
    }

    public function render(Pattern ...$patterns) : string
    {
        return implode('', array_map([$this, 'renderPattern'], $patterns));
    }

    private function renderPattern(Pattern $pattern) : string
    {
        return $this->mustache->render($pattern::getTemplatePath(), $pattern);
    }
}
