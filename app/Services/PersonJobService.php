<?php

namespace App\Services;

use App\Models\Job;
use App\Models\Person as Person;

class PersonJobService
{

    protected $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }


    public function getAllJobMatchRates()
    {
        //get all jobs from database
        $jobs = Job::get(['id', 'job_name'])->toArray();
        //need job_id and job_name from jobs table
        //need to go through all jobs, and calculate each rate individually
        foreach ($jobs as $key => $value) {
            //get skills rate
            $jobId = $value['id'];
            $job = Job::getJobById($jobId);
            $rateService = new RateService($this->person, $job);
            $job_rate = $rateService->getAverageRate();
            $jobs[$key]['job_rate'] = $job_rate;
        }
        //sort result in descending order
        $column = 'job_rate';
        usort($jobs, function ($a, $b) use ($column) {
            return $b[$column] <=> $a[$column];
        });

        //return full array
        return $jobs;
    }

    public function getJobMatchRate($id)
    {
        //get all jobs from database
        $job = Job::get(['id', 'job_name'])
            ->where('id', $id)->first();
            //need job_id and job_name from jobs table
            //need to go through all jobs, and calculate each rate individually
            //get skills rate
            $rateService = new RateService($this->person, $job);
            $job_rate = $rateService->getAverageRate();
            $job['job_rate'] = $job_rate;
            

        //return full array
        return $job;
    }
}
