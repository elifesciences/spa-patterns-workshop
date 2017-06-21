<?php

namespace SomeCompany\Patterns;

trait NormalisesValues
{
    final private static function normaliseValue($value)
    {
        if (is_array($value)) {
            foreach ($value as $subKey => $subValue) {
                $value[$subKey] = static::normaliseValue($subValue);
            }
        } elseif ($value instanceof CastsToArray) {
            $value = $value->toArray();
        }

        if (is_array($value)) {
            ksort($value);
        }

        return $value;
    }
}
