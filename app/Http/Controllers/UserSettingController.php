<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\PersonService;
use Illuminate\Support\Facades\Auth;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * $workprefs object
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $person = Auth::user()->person;
        // dd($person->id);
        $personService = new PersonService($person);
        $workprefsArray = $personService->getWorkprefsById($person->id);

        $data = [
            'title' => 'Personal settings',
            'modaltitle' => 'edit work day, time and location preferences',
            'modaltext' => 'select or deselect preferred options.',
            'workprefs_array' => $workprefsArray,
        ];
        // return new PersonService($person);
        return view('user_settings', $data);
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
