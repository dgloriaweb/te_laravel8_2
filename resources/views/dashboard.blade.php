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
                {{$all_job_match_rate['job_name']}}
                <br />
                <div>Location:</div>
                <div>Workplace or remote or both</div>
                <div>Preferred working days</div>
                                                     <div>Workdays</div> @if($all_job_match_rate['workdays'] == $workpreferences['days']['workdays']) <i class="fas fa-thumbs-up text-xs"></i> @else <i class="far fa-thumbs-down text-xs"></i> @endif
                <div>Saturday</div>
                <div>Sunday</div>
                <div>bank holidays</div>
                <div>Sat, Sun and Bank holidays only</div>
                <div>Preferred work hours</div>
                <div>Normal hours</div>
                <div>nightshift</div>
                <div>nightshift only</div>
                <div>Other shift</div>
                <div>Other shift only</div>
                <div>Overtime</div>
            </div>
        </div>
        @endforeach
    </div>
    <script>
        function openJobContent(jobId) {
            var x = document.getElementById("job" + jobId);
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

    </script>

</x-app-layout>