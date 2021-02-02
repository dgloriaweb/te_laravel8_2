<?php

namespace App\Services;

use App\Models\Job;
use App\Services\Contracts\JobServiceInterface;

class JobService implements JobServiceInterface
{
    protected ?Job $job = null;

    public function __construct(?Job $job)
    {
        $this->job = $job;
    }

    public  function getWorkprefsById()
    {
        if ($this->job) {
            //setup this->workprefs array with the real user data
            $workprefsArray = [
                'id' => $this->job->id,
                'workplace' => $this->job->workplace,
                'remote' => $this->job->remote,
                'workdays' => $this->job->workdays,
                'saturday' => $this->job->saturday,
                'sunday' => $this->job->sunday,
                'bank_holidays' => $this->job->bank_holidays,
                'sat_sun_bh_only' => $this->job->sat_sun_bh_only,
                'normal_hours' => $this->job->normal_hours,
                'nightshift' => $this->job->nightshift,
                'nightshift_only' => $this->job->nightshift_only,
                'other_shift' => $this->job->other_shift,
                'other_shift_only' => $this->job->other_shift_only,
                'overtime' => $this->job->overtime
            ];

            return $workprefsArray;
        }
    }
    public  function storeWorkPrefChanges($request)
    {

        if ($this->job->update([
            'workplace' => $request->input('workplace') == 'on' ? 1 : 0,
            'remote' => $request->input('remote') == 'on' ? 1 : 0,
            'workdays' => $request->input('workdays') == 'on' ? 1 : 0,
            'saturday' => $request->input('saturday') == 'on' ? 1 : 0,
            'sunday' => $request->input('sunday') == 'on' ? 1 : 0,
            'bank_holidays' => $request->input('bank_holidays') == 'on' ? 1 : 0,
            'sat_sun_bh_only' => $request->input('sat_sun_bh_only') == 'on' ? 1 : 0,
            'normal_hours' => $request->input('normal_hours') == 'on' ? 1 : 0,
            'nightshift' => $request->input('nightshift') == 'on' ? 1 : 0,
            'nightshift_only' => $request->input('nightshift_only') == 'on' ? 1 : 0,
            'other_shift' => $request->input('other_shift') == 'on' ? 1 : 0,
            'other_shift_only' => $request->input('other_shift_only') == 'on' ? 1 : 0,
            'overtime' => $request->input('overtime') == 'on' ? 1 : 0,
        ])) {
            return true;
        }
    }

    public function getJob(int $jobId): Job
    {
        /** @var Job $Job */
        $job = Job::findOrFail($jobId);
        return $job;
    }
}
