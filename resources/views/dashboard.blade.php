<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    {{-- personal results --}}

    Recommended jobs
    <div class="grid grid-cols-12 p-1 border-b-2">
        @foreach ($all_job_match_rates as $all_job_match_rate)
        @php
        $id = $all_job_match_rate['id']
        @endphp
        <div class="col-span-3 border-b-2">
            <a href="#" onclick="openJobContent({{$id}})">
                {{$all_job_match_rate['job_name']}}
            </a>
        </div>
        <div class="col-span-2 border-b-2">
            Job rate: {{$all_job_match_rate['job_rate']}} %
        </div>
        <div class="col-span-7 border-b-2 bg-gray-50">
            <div class="jobContent hidden" id="job{{$all_job_match_rate['id']}}">
               
                <div>Location:</div>
                <div>Workplace 
                    @if($all_job_match_rate['workplace'] == $workpreferences['location']['workplace']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif
                </div>
                <div>Remote 
                    @if($all_job_match_rate['remote'] == $workpreferences['location']['remote']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif
                </div>

                <div>Preferred working days:</div>
                <div>Workdays 
                    @if($all_job_match_rate['workdays'] == $workpreferences['days']['workdays']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif
                </div> 
                <div>Saturday 
                    @if($all_job_match_rate['saturday'] == $workpreferences['days']['saturday']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif
                </div>
                <div>Sunday                    
                    @if($all_job_match_rate['sunday'] == $workpreferences['days']['sunday']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif</div>
                <div>bank holidays 
                    @if($all_job_match_rate['bank_holidays'] == $workpreferences['days']['bank_holidays']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif</div>
                <div>Sat, Sun and Bank holidays only 
                    @if($all_job_match_rate['sat_sun_bh_only'] == $workpreferences['days']['sat_sun_bh_only']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif</div>
                <div>Preferred work hours:</div>
                <div>Normal hours 
                    @if($all_job_match_rate['normal_hours'] == $workpreferences['hours']['normal_hours']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif</div>
                <div>nightshift 
                    @if($all_job_match_rate['nightshift'] == $workpreferences['hours']['nightshift']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif</div>
                <div>nightshift only 
                    @if($all_job_match_rate['nightshift_only'] == $workpreferences['hours']['nightshift_only']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif</div>
                <div>Other shift 
                    @if($all_job_match_rate['other_shift'] == $workpreferences['hours']['other_shift']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif</div>
                <div>Other shift only 
                    @if($all_job_match_rate['other_shift_only'] == $workpreferences['hours']['other_shift_only']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif</div>
                <div>Overtime 
                    @if($all_job_match_rate['overtime'] == $workpreferences['overtime']['overtime']) 
                    <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif</div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- user settings --}}
    <div class="text-xl">

        User Settings for {{ Auth::user()->name }}
    </div>


    <script>
        // function openJobContent(jobId) {
        //     var x = document.getElementById("job" + jobId);
        //     if (x.style.display === "none") {
        //         x.style.display = "block";
        //     } else {
        //         x.style.display = "none";
        //     }
        // }

    </script>

</x-app-layout>