<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobRequirement extends Model
{
       /**
     * this table links the jobs and requirements together
     */
    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }
}
