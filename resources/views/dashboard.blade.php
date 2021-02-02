<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                You haven't got a job that matches more than 40%, is it because you didn't provide enough data? Based on
                that I
                cannot give you recommendation for a future career. Please scroll down and fill in more data to
                continue.

                <br />
                OR
                <br />

                <div class="p6">
                    <h2>Recommended jobs</h2>
                    <br>

                    <div class="p-6">
                        <h5><a href="#">Potter</a></h5>

                    </div>

                </div>
            </div>
            <br>
        </div>


        {{-- user settings --}}
        <div class="p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <div class="text-xl">

                        User Settings for {{ Auth::user()->name }}
                    </div>
                    <br />


                    <div class="text-lg">Working hours and workday preferences</div>
                    <div class="row">
                        <div class="col">
                            <ul>
                                @foreach($workprefs_array as $workprefs=>$values)
                                @if($workprefs!='id')
                                <li>
                                    {{$workprefs}} -
                                    @if($values==1)<i class="fas fa-check"></i>
                                    @else <i class="fas fa-ban"></i>
                                    @endif
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr>



                    <div class="text-lg">
                        Drivers' Licenses
                    </div>
                    <div class="row">
                        <div class="col">
                            <h3>List Drivers Licenses here</h3>
                        </div>
                    </div>
                    <hr>

                    <div class="text-lg">
                        Skills
                    </div>

                    <div class="row">
                        <div class="col">
                            <h3>List workprefs here</h3>
                        </div>
                    </div>
                    <hr>


                    </p>
                </div>
            </div>
        </div>





    </div>
    </div>
    </div>
    </div>
</x-app-layout>