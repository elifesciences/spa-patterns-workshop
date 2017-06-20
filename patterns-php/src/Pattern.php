<?php

namespace SomeCompany\Patterns;

interface Pattern extends CastsToArray
{
    public function getTemplateName() : string;
}
