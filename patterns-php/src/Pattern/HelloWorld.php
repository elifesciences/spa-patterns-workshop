<?php

namespace SomeCompany\Patterns\Pattern;

use SomeCompany\Patterns\ArrayAccessFromProperties;
use SomeCompany\Patterns\ArrayFromProperties;
use SomeCompany\Patterns\Pattern;

final class HelloWorld implements Pattern
{
    use ArrayAccessFromProperties;
    use ArrayFromProperties;

    private $worldName;

    public function __construct(string $worldName = null)
    {
        $this->worldName = $worldName;
    }

    public function getTemplateName() : string
    {
        return 'resources/templates/hello-world.mustache';
    }
}
