<?php

namespace SomeCompany\Patterns;

interface Pattern extends CastsToArray
{
    public static function getTemplatePath() : string;

    public static function getSchemaPath() : string;
}
