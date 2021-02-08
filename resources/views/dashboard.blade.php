<x-app-layout>
    <x-slot name="header">
    </x-slot>
    {{-- personal results --}}

    <div class="personal_results lg:px-12 sm:p-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if($all_job_match_rates[0]['job_rate']<60) You haven't got a job that matches more than 40%, is it
                    because you didn't provide enough data? Based on that I cannot give you recommendation for a future
                    career. Please scroll down and fill in more data to continue. @else <div class="p6">
                    <div class="text-xl">
                        Recommended jobs
                    </div>
                    <div class="grid grid-cols-3">
                        @foreach ($all_job_match_rates as $all_job_match_rate)
                        <div class="col-span-2">
                            @if ($all_job_match_rate['job_rate']>50)
                            <i class="fas fa-thumbs-up text-xs"></i>
                            @else
                            <i class="far fa-thumbs-down text-xs"></i>
                            @endif
                            <a href="jobs/{{$all_job_match_rate['id']}}">
                                {{$all_job_match_rate['job_name']}}
                            </a>
                        </div>
                        <div class="col-span-1">
                            Job rate: {{$all_job_match_rate['job_rate']}} 
                            <i class="fas fa-percent text-xs"></i>
                        </div>
                        @endforeach
                    </div>

            </div>
            @endif
        </div>
    </div>
    </div>

    {{-- user settings --}}
    <div class="user_settings lg:px-12 sm:p-1">
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
                            {{-- TODO: check for error: if driversLicense returns an array of more than one
                            element,
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

</x-app-layout>