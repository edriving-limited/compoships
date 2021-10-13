<?php

namespace Awobaz\Compoships\Database\Eloquent\Concerns;

trait UsesDictionary
{
    
    /**
     * Normalize the dictionary key.
     * @param  string|mixed  $key
     * @return string|mixed
     */
    protected function normalizeDictionaryKey($key)
    {
        return is_string($key) ? strtolower($key) : $key;
    }
}
