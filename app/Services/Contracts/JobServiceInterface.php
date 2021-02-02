<?php

namespace App\Services\Contracts;


use App\Models\Job;

interface JobServiceInterface {
    public function __construct(?Job $job);
    public function getJob(int $jobId): Job;
}
