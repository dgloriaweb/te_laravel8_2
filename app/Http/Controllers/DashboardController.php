<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\PersonJobService;
use Illuminate\Http\Request;
use App\Services\PersonService;
use App\Services\PropertyService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * $workpreferences object
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $person = Auth::user()->person;
        // dd($person->id);
        $personService = new PersonService($person);
        $workpreferences = $personService->getWorkpreferencesById($person->id);

        $propertyService = new PropertyService($person);
        $personProperties = $propertyService->getPersonProperties();

        $drivingLicenses = $propertyService->getPersonPropertiesWithDrivingLicenses();
        $skills = $propertyService->getPersonPropertiesWithSkills();


        $data = [
            'title' => 'Personal settings',
            'modaltitle' => 'edit work day, time and location preferences',
            'modaltext' => 'select or deselect preferred options.',
            'workpreferences' => $workpreferences,
            'personProperties' => $personProperties,
            'drivingLicenses' => $drivingLicenses,
            'skills' => $skills
        ];

        //show matching jobs array
        //job id is required, job name, match rate
        $personJobService = new PersonJobService($person);
        /*$data['all_job_match_rates'] =
                array:10 [▼
                0 => array:5 [▼
                    "id" => 3
                    "job_name" => "CNC machinist"
                    "job_drivers_licenses" => array:1 [▼
                    0 => array:7 [▶]
                    ]
                    "job_requirements" => array:5 [▼
                    0 => array:3 [▼
                        "id" => 32
                        "job_id" => 3
                        "skill_id" => 186
                    ]
                    1 => array:3 [▶]
                    2 => array:3 [▶]
                    3 => array:3 [▶]
                    4 => array:3 [▶]
                    ]
                    "job_rate" => 66
                ]
                1 => array:5 [▶]
        */

        $data['all_job_match_rates'] = array_slice($personJobService->getAllJobMatchRates(), 0, 10);

        // return new PersonService($person);
        return view('dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
