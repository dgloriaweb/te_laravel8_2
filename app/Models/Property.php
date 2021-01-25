<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties';
    protected $primaryKey = 'property_id';

    /**
     * A property belongs to one person
     */
    public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }

    /**
     * A property belongs to one drivers license
     */
    public function driversLicense()
    {
        return $this->belongsTo('App\Models\Driver','prop_link_id','id');
    }

   
}
