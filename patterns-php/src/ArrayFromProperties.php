<?php

namespace SomeCompany\Patterns;

trait ArrayFromProperties
{
    use NormalisesValues;

    final public function toArray() : array
    {
        $vars = [];

        foreach (get_object_vars($this) as $key => $value) {
            if ('_' === substr($key, 0, 1)) {
                continue;
            }

            $value = $this->normaliseValue($value);

            if (null !== $value && [] !== $value) {
                $vars[$key] = $value;
            }
        }

        return $vars;
    }
}
