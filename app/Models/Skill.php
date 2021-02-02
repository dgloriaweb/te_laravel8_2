<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    
    /**
     * A skill has many properties
     */
    public function properties()
    {
        return $this->hasMany('App\Models\Property');
    }
}
