<?php

namespace SomeCompany\Patterns;

interface PatternRenderer
{
    public function render(Pattern ...$patterns) : string;
}
