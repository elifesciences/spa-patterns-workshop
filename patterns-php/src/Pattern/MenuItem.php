<?php

namespace SomeCompany\Patterns\Pattern;

use SomeCompany\Patterns\ArrayAccessFromProperties;
use SomeCompany\Patterns\ArrayFromProperties;
use SomeCompany\Patterns\CastsToArray;
use SomeCompany\Patterns\Pattern;

final class MenuItem implements Pattern
{
    use ArrayAccessFromProperties;
    use ArrayFromProperties;

    private $text;
    private $url;
    private $isCurrent;

    public function __construct(string $text, string $url, bool $isCurrent = false)
    {
        $this->text = $text;
        $this->url = $url;
        if ($isCurrent) {
            $this->isCurrent = $isCurrent;
        }
    }

    public function getTemplatePath() : string
    {
        return 'resources/templates/menu-item.mustache';
    }

    public function getSchemaPath() : string
    {
        return 'resources/schemas/menu-item.schema.json';
    }
}
