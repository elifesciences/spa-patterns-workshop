<?php

namespace SomeCompany\Patterns;

interface Pattern extends CastsToArray
{
    public function getTemplatePath() : string;

    public function getSchemaPath() : string;
}
