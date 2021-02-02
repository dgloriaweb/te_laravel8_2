<?php

namespace App\Services;

use App\Models\Person;
use App\Models\Property;
use Exception;

class PropertyService
{
    protected $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }


}
