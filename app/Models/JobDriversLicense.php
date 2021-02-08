<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobDriversLicense extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'driver_id',
        'must',
        'driving_years',
        'clean'
    ];

    protected $with = array( 'driver');

    /**
     * this table links the jobs and driver licenses together
     */
    public function job()
    {
        return $this->belongsTo('App\Models\Job');
    }
    public function driver()
    {
        return $this->belongsTo('App\Models\Driver');
    }

    public static function getJobDrivingLicenseByJobId($jobId)
    {

        $jobDriversLicense =  JobDriversLicense::where('job_id', $jobId)
            ->with('driver')
            ->with('job')
            ->get();

        return $jobDriversLicense;
    }
}
