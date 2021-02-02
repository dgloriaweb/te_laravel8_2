<?php

namespace App\Services;

use App\Models\Job;
use App\Models\JobRequirement;

class JobRequirementService
{
    
    protected $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

   
}