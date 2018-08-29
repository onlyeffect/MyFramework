<?php

namespace App\Models;

class User 
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function greet()
    {
        return $this->name . ": " . "greetings!";
    }
}
