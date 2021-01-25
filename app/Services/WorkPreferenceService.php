<?php

namespace App\Services;


class WorkPreferenceService
{
    //Understand each selection case that can occur for both jobs and users
    //columns: jobs, rows: persons
    //numbers in order: normal_hours, nightshift, nightshift_only, other_shift, other_shift_only

    public static $workprefsArray = [
        'workprefs_array' => [
            'location' => [
                'workplace' => 'Workplace',
                'remote' => 'Remote',
            ],
            'days' => [
                'workdays' => 'Workdays',
                'saturday' => 'Saturday',
                'sunday' => 'Sunday',
                'bank_holidays' => 'Bank holidays',
                'sat_sun_bh_only' => 'Saturday, Sunday, Bank holiday only',
            ],
            'hours' => [
                'normal_hours' => 'Normal hours',
                'nightshift' => 'Nightshift',
                'nightshift_only' => 'Nightshift only',
                'other_shift' => 'Other shift',
                'other_shift_only' => 'Other shift only',
            ],
            'overtime' => [
                'overtime' => 'Overtime'
            ]
        ]
    ];

   
    public static function workPrefSelectionCasesDays($workPrefDayCase)
    {
        // matching workdays, sat, sun, bh and sat_sun_bh_only with each other
        $cases = [
            'sd1' =>    '00001',
            'sd2' =>    '00010',
            'sd3' =>    '00100',
            'sd4' =>    '00110',
            'sd5' =>    '01000',
            'sd6' =>    '01010',
            'sd7' =>    '10000',
            'sd8' =>    '10010',
            'sd9' =>    '10100',
            'sd10' =>   '11000',
            'sd11' =>   '11010',
            'sd12' =>   '10110',
            'sd13' =>   '11100',
            'sd14' =>   '11110',
            'sd15' =>   '01100'
        ];
        foreach ($cases as $key => $value) {
            if ($value == $workPrefDayCase) {
                return $key;
            }
        }
        return false;
    }

    public static function workPrefSelectionCasesHours($workPrefHourCase)
    {
        $cases = [
            // normal_hours
            'sh1' => '10000',
            // normal + nightshift
            'sh2' => '11000',
            // normal + other_shift
            'sh3' => '10010',
            // normal + ns + os
            'sh4' => '11010',
            // nightshift_only
            'sh5' => '01100',
            // other_shift_only
            'sh6' => '00011',
            // nightshift + other_shift
            'sh7' => '01010',
        ];

        foreach ($cases as $key => $value) {
            if ($value == $workPrefHourCase) {
                return $key;
            }
        }

        return false;
    }
}
