<?php

namespace App\Rules;

class EndsWith
{
    protected $needle;

    public function __construct($needle)
    {
        $this->needle = $needle;
    }

    public function passes($attribute, $value)
    {
        return substr($value, -strlen($this->needle)) === $this->needle;
    }

    public function message()
    {
        return 'The :attribute must end with ' . $this->needle;
    }
}
