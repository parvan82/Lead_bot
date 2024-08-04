<?php

namespace App\Models;

class Objects
{
    public $keyValue;

    public function __construct()
    {
        $this->keyValue = [
            "phonenumber" => "",
            "key2" => "value2",
            "key3" => "value3"
        ];
    }

    public function getValue()
    {
        return $this->keyValue;
    }
}