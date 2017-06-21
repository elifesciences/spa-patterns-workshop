<?php

namespace SomeCompany\Patterns\Pattern;

use SomeCompany\Patterns\ArrayAccessFromProperties;
use SomeCompany\Patterns\ArrayFromProperties;
use SomeCompany\Patterns\Pattern;

final class Menu implements Pattern
{
    use ArrayAccessFromProperties;
    use ArrayFromProperties;

    private $items;

    public function __construct(MenuItem ...$items)
    {
        $this->items = $items;
    }

    public function getTemplatePath() : string
    {
        return 'resources/templates/menu.mustache';
    }

    public function getSchemaPath() : string
    {
        return 'resources/schemas/menu.schema.json';
    }
}
