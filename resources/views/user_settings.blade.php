<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Settings') }}
        </h2>
    </x-slot>

    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                User Settings for {{ Auth::user()->name }}
                <br />
                {{ $workprefs_array['workplace'] }}


                <h2>Skills</h2>
                <div class="row">
                    <div class="col">
                        <h3>List skills here</h3>
                    </div>
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#constrModal">
                            Edit
                        </button>

                        <!-- <a class="btn btn-primary pull-right" href="user_skills">Edit</a> -->
                    </div>
                </div>
                <hr>



                <h2>
                    Drivers' Licenses
                </h2>
                <div class="row">
                    <div class="col">
                        <h3>List Drivers Licenses here</h3>
                    </div>
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#constrModal">
                            Edit
                        </button>

                        <!-- <a class="btn btn-primary pull-right" href="user_licenses">Edit</a> -->
                    </div>
                </div>
                <hr>

                <h2>
                    Working hours and workday preferences
                </h2>

                <div class="row">
                    <div class="col">
                        <h3>List workprefs here</h3>
                    </div>
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#workpref_editModal">
                            Edit
                        </button>
                    </div>
                </div>
                <hr>


                <!--  in the modal, setup the rule the way selections can be made, check old code. -->
                </p>
            </div>
        </div>

    </div>
    </div>
    </div>


</x-app-layout>