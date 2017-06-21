<?php

namespace SomeCompany\Patterns\Pattern;

use SomeCompany\Patterns\ArrayAccessFromProperties;
use SomeCompany\Patterns\ArrayFromProperties;
use SomeCompany\Patterns\Pattern;

final class SiteHeader implements Pattern
{
    use ArrayAccessFromProperties;
    use ArrayFromProperties;

    private $title;
    private $homeUrl;
    private $text;
    private $menu;

    public function __construct(string $title, string $homeUrl, string $text, Menu $menu = null)
    {
        $this->title = $title;
        $this->homeUrl = $homeUrl;
        $this->text = $text;
        $this->menu = $menu;
    }

    public function getTemplatePath() : string
    {
        return 'resources/templates/site-header.mustache';
    }

    public function getSchemaPath() : string
    {
        return 'resources/schemas/site-header.schema.json';
    }
}
