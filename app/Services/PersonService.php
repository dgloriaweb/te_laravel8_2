<?php

namespace App\Services;

use App\Models\Person;
use Exception;

class PersonService
{
    protected $person;

    public function __construct(Person $person)
    {
        $this->person = $person;
    }


    /**
     * Build and return the code for persons work preferences hours settings
     * returns a five digit string like 10100
     *
     * @return string
     */
    public  function getPersonWorkPrefHourSettings()
    {

        // build above setup from current database values
        $hu1 = $this->person['normal_hours'];
        $hu2 = $this->person['nightshift'];
        $hu3 = $this->person['nightshift_only'];
        $hu4 = $this->person['other_shift'];
        $hu5 = $this->person['other_shift_only'];

        return $hu1 . $hu2 . $hu3 . $hu4 . $hu5;
    }

    /**
     * Build and return the code for persons work preferences days settings
     * returns a five digit string like 10100
     *
     * @param [int] $personId
     * @return string
     */
    public  function getPersonWorkPrefDaySettings()
    {

        // build above setup from current database values
        $du1 = $this->person['workdays'];
        $du2 = $this->person['saturday'];
        $du3 = $this->person['sunday'];
        $du4 = $this->person['bank_holidays'];
        $du5 = $this->person['sat_sun_bh_only'];

        return $du1 . $du2 . $du3 . $du4 . $du5;
    }

    public  function getPersonWorkPrefHourCode($workPrefHourCase)
    {
        //get code from the associative table
        return WorkPreferenceService::workPrefSelectionCasesHours($workPrefHourCase);
    }
    public  function getPersonWorkPrefDayCode($workPrefDayCase)
    {
        //get code from the associative table
        return WorkPreferenceService::workPrefSelectionCasesDays($workPrefDayCase);
    }

    public  function getWorkprefsById($personId)
    {
        $existingUser = Person::getPersonById($personId);
        if ($existingUser) {
            //setup this->workprefs array with the real user data
            $workprefsArray = [
                'id'=>$existingUser->id,
                'workplace' => $existingUser->workplace,
                'remote' => $existingUser->remote,
                'workdays' => $existingUser->workdays,
                'saturday' => $existingUser->saturday,
                'sunday' => $existingUser->sunday,
                'bank_holidays' => $existingUser->bank_holidays,
                'sat_sun_bh_only' => $existingUser->sat_sun_bh_only,
                'normal_hours' => $existingUser->normal_hours,
                'nightshift' => $existingUser->nightshift,
                'nightshift_only' => $existingUser->nightshift_only,
                'other_shift' => $existingUser->other_shift,
                'other_shift_only' => $existingUser->other_shift_only,
                'overtime' => $existingUser->overtime
            ];
            //old code
            // $workprefsArray = [
            //     'workprefs_array' => [
            //         'location' => [
            //             'workplace' => $existingUser->workplace,
            //             'remote' => $existingUser->remote,
            //         ],
            //         'days' => [
            //             'workdays' => $existingUser->workdays,
            //             'saturday' => $existingUser->saturday,
            //             'sunday' => $existingUser->sunday,
            //             'bank_holidays' => $existingUser->bank_holidays,
            //             'sat_sun_bh_only' => $existingUser->sat_sun_bh_only,
            //         ],
            //         'hours' => [
            //             'normal_hours' => $existingUser->normal_hours,
            //             'nightshift' => $existingUser->nightshift,
            //             'nightshift_only' => $existingUser->nightshift_only,
            //             'other_shift' => $existingUser->other_shift,
            //             'other_shift_only' => $existingUser->other_shift_only,
            //         ],
            //         'overtime' => [
            //             'overtime' => $existingUser->Overtime
            //         ]
            //     ]
            // ];
            return $workprefsArray;
        }
    }

    public  function storeWorkPrefChanges($request)
    {
        
        if($this->person->update([ 
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
        ]))
        {
            return true;
        }

    }
}
