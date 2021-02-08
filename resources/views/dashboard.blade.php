<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="personal_results max-w-7xl mx-auto sm:px-6 lg:px-8">
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

        <div class="job_results">

        </div>

        {{-- user settings --}}
        <div class="user_settings p-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                    <div class="text-xl">

                        User Settings for {{ Auth::user()->name }}
                    </div>
                    <br />


                    <div class="text-xl">Working hours and workday preferences</div>
                    <div class="row">
                        <div class="col">
                            <ul>
                                @foreach($workpreferences as $categories=>$values)
                                @if($categories!='id')
                                <li class="text-lg">
                                    {{$categories}}
                                  <ul>
                                    @foreach($values as $key=>$value)
                                      <li class="text-base">
                                        {{$key}} - 
                                         @if($value==1)<i class="fas fa-check"></i>
                                        @else <i class="fas fa-ban"></i>
                                        @endif
                                      </li>
                                      @endforeach
                                  </ul>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr>



                    {{-- drivers licenses --}}
                    <div class="text-xl">
                        Drivers' Licenses
                    </div>
                    <div class="row">
                        <div class="col">

                            <ul>
                                @foreach ($drivingLicenses as $drivingLicense)
                                {{-- TODO: check for error: if driversLicense returns an array of more than one element,
                                that means we have duplicate in the properties table! --}}
                                <li>
                                    Drivers license type: {{$drivingLicense->driversLicense->drivers_license}}
                                    <br />
                                    Driving years: {{$drivingLicense->driving_years}}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr>

                    <div class="text-xl">
                        Skills
                    </div>

                    <div class="row">
                        <div class="col">
                            <ul>
                                @foreach($skills as $skill)
                                <li>
                                    {{$skill->skill->skill}}
                                    <br />
                                </li>
                                @endforeach
                            </ul>
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