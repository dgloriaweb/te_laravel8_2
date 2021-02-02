<?php

namespace App\Services;

use App\Models\Job;
use App\Models\JobDriversLicense;
use App\Models\MatchDay;
use App\Models\MatchHour;
use App\Models\Person;
use App\Models\Property;

class RateService
{

    protected $person;
    protected $job;

    public function __construct(Person $person, Job $job)
    {
        $this->person = $person;
        $this->job = $job;
    }


    /**
     * get the rate of match of skills
     *
     * @return int
     */
    public  function getSkillsRate()
    {
        //get person skills
        $personSkills = $this->person->properties->where('prop_link_type', 'skill')->pluck('prop_link_id')->toArray();
        //get job skills
        $jobSkills = $this->job->jobRequirements->pluck('skill_id')->toArray();

        $intersect = array_intersect($jobSkills, $personSkills);

        //get rate, from job to person
        $result = count($intersect) / count($jobSkills);
        return  intval($result * 100);
    }



    /**
     * get the rate of match of drivers licenses
     *
     * @return int
     */
    public  function getDriversLicenseRate()
    {
        //drivers license
        $personDriversLicenses = $this->person->properties->where('prop_link_type', 'drivers_license')->pluck('prop_link_id')->toArray();

        //get the job's drivers license array
        $jobDriversLicenses = $this->job->jobDriversLicenses->pluck('driver_id')->toArray();

        //if job license is none, then return empty array and return 100% match
        if ($jobDriversLicenses[0] == 'none') {
            return  100;
        } else {
            //if there is other than none, compare arrays
            //check intersection of the two arrays
            $a = count($jobDriversLicenses);
            $b = count(array_intersect($jobDriversLicenses, $personDriversLicenses));
            $result = ($b / $a);
            //compare length of intersection array with job array length, return match in percentage
            return  intval($result * 100);
        }
    }



    /**
     * get the rate of match of work day and hour preferences
     *
     * @return int
     */
    public  function getWorkPrefRate()
    {
        //hour pref settings
        //person codes
        //get the 5 digit code and pass it to the function to get code for person
        $personService = new PersonService($this->person);
        $hourPersonSettingsCode = $personService->getPersonWorkPrefHourSettings();
        //pass the settings_code to the assoc table to get code
        $hourPersonCode = $personService->getPersonWorkPrefHourCode($hourPersonSettingsCode);
        
        //job codes
        //get the 5 digit code and pass it to the function to get code for person
        $hourJobSettingsCode = $this->getJobWorkPrefHourSettings();
        //pass the settings_code to the assoc table to get code
        $hourJobCode = $this->getJobWorkPrefHourCode($hourJobSettingsCode);
        //get result from hour weight database table
        //model: MatchHour, column name: job_code, row name: person_code
        //find row for user, and get the column data from that row
        $personHourWeights = MatchHour::where('user', $hourPersonCode)->first();
        $hourWeight = 0;
        $hourAttributes = array_keys($personHourWeights->getAttributes());
        foreach ($hourAttributes as $attribute) {
            if ($attribute == $hourJobCode) {
                $hourWeight = $personHourWeights[$attribute];
                continue;
            }
        }


        //day pref settings
        //person codes
        //get the 5 digit code and pass it to the function to get code for person
        $dayPersonSettingsCode = $personService->getPersonWorkPrefDaySettings();
        //pass the settings_code to the assoc table to get code
        $dayPersonCode = $personService->getPersonWorkPrefDayCode($dayPersonSettingsCode);

        //job codes
        //get the 5 digit code and pass it to the function to get code for person
        $dayJobSettingsCode = $this->getJobWorkPrefDaySettings();
        //pass the settings_code to the assoc table to get code
        $dayJobCode = $this->getJobWorkPrefDayCode($dayJobSettingsCode);
        //get result from day weight database table
        //model: Matchday, column name: job_code, row name: person_code
        //find row for user, and get the column data from that row
        $personDayWeights = MatchDay::where('user', $dayPersonCode)->first();
        $dayWeight = 0;
        $dayAttributes = array_keys($personDayWeights->getAttributes());
        foreach ($dayAttributes as $attribute) {
            if ($attribute == $dayJobCode) {
                $dayWeight = $personDayWeights[$attribute];
                continue;
            }
        }
        
        //total achievable score for day and night 
        $totalScore = 4 + 6;
        //collected score for day and night 
        $totalDayAndHourScore = $hourWeight + $dayWeight;
        
        //match rate
        $workprefsMatchRate = ($totalDayAndHourScore / $totalScore);
        return  intval($workprefsMatchRate * 100);
    }
    
    /**
     * Build and return the code for Jobs work preferences hours settings
     * returns a five digit string like 10100
     *
     * @return string
     */
    public  function getJobWorkPrefHourSettings()
    {
        // build above setup from current database values
        $hu1 = $this->job['normal_hours'];
        $hu2 = $this->job['nightshift'];
        $hu3 = $this->job['nightshift_only'];
        $hu4 = $this->job['other_shift'];
        $hu5 = $this->job['other_shift_only'];

        return $hu1 . $hu2 . $hu3 . $hu4 . $hu5;
    }
   
   
    /**
     * Build and return the code for jobs work preferences days settings
     * returns a five digit string like 10100
     *
     * @return string
     */
    public  function getjobWorkPrefDaySettings()
    {

        // build above setup from current database values
        $du1 = $this->job['workdays'];
        $du2 = $this->job['saturday'];
        $du3 = $this->job['sunday'];
        $du4 = $this->job['bank_holidays'];
        $du5 = $this->job['sat_sun_bh_only'];

        return $du1 . $du2 . $du3 . $du4 . $du5;
    }
    public static function getJobWorkPrefHourCode($workPrefHourCase)
    {
        //get code from the associative table
        return WorkPreferenceService::workPrefSelectionCasesHours($workPrefHourCase);
    }
    public static function getJobWorkPrefDayCode($workPrefDayCase)
    {
        //get code from the associative table
        return WorkPreferenceService::workPrefSelectionCasesDays($workPrefDayCase);
    }

    /**
     * get the average rate caculated from the other rates
     *
     * @param [int] $jobId
     * @return int
     */
    public  function getAverageRate()
    {     

        $skillsRate = $this->getSkillsRate();
        $driversLicensesRate = $this->getDriversLicenseRate();
        
        $workPrefsRate = $this->getWorkPrefRate();
        $a = [$skillsRate, $driversLicensesRate, $workPrefsRate];
        if (count($a)) {
            $averageRate = array_sum($a) / count($a);
        }

        //get each array item and assign a job_rate to it
        return intval($averageRate);
    }
}
