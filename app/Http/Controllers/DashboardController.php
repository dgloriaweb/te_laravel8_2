<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        // dd($skills);

        $data = [
            'title' => 'Personal settings',
            'modaltitle' => 'edit work day, time and location preferences',
            'modaltext' => 'select or deselect preferred options.',
            'workpreferences' => $workpreferences,
            'personProperties' => $personProperties,
            'drivingLicenses' => $drivingLicenses,
            'skills' => $skills
        ];
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
