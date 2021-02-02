<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = [
        'drivers_license',
        'code'
    ];


    /**
     * A drivers license has many properties
     */
    public function properties()
    {
        return $this->hasMany('App\Models\Property');
    }
    /**
     * A Drivers license has many links to jobs
     */
    public function jobDriversLicenses()
    {
        return $this->hasMany('App\Models\JobDriversLicense');
    }
    
}
