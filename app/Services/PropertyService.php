<?php

namespace App\Services;

use App\Models\Drivers;
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

    public function getPersonProperties()
    {
        return Property::where('person_id', $this->person->id)->get();
    }

    public function getPersonPropertiesWithDrivingLicenses()
    {
        $personProperties= Property::where('person_id', $this->person->id)
        ->where('prop_link_type', 'drivers_license')
        ->with('driversLicense')->get();
        return $personProperties;
    }

    public function getPersonPropertiesWithSkills()
    {
        $personProperties= Property::where('person_id', $this->person->id)
        ->where('prop_link_type', 'skill')
        ->with('skill')->get();
        return $personProperties;
    }
}
