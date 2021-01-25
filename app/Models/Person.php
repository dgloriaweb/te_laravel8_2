<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//tablename = people
//foreign key: person_id
class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'username', 
        'password', 
        'workplace',
        'remote',
        'workdays',
        'saturday',
        'sunday',
        'bank_holidays',
        'sat_sun_bh_only',
        'normal_hours',
        'nightshift',
        'nightshift_only',
        'other_shift',
        'other_shift_only',
        'overtime'
    ];


    protected $with = array('properties');

    /*** relationships */

    /* A person has many properties     */
    public function properties()
    {
        return $this->hasMany('App\Models\Property');
    }


    //*** functions */
    public static function getPersonById($personId)
    {
        return Person::where('id', $personId)->first();
    }
}
