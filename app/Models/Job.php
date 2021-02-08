<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
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

    protected $with = array('jobDriversLicenses', 'jobRequirements');

    /*** relationships ***/

    /**
     * A job has many licenses
     */
    public function jobDriversLicenses()
    {
        return $this->hasMany('App\Models\JobDriversLicense');
    }

    public function jobRequirements()
    {
        return $this->hasMany('App\Models\JobRequirement');
    }

    /*** functions ***/

    /**
     * Undocumented function
     *
     * @param [int] $jobId
     * @return mixed
     */
    public static function getJobById($jobId)
    {
        return Job::where('id', $jobId)
            ->with('jobRequirements')
            ->with('jobDriversLicenses')
            ->first();
    }
}
