<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    {{-- personal results --}}
    
    Recommended jobs
    <div class="grid grid-cols-12 p-1 border-b-2">
        @foreach ($all_job_match_rates as $all_job_match_rate)
      
        <div class="col-span-3 border-b-2">
            <a href="#"  onclick="openJobContent({{$all_job_match_rate['id']}})">
                {{$all_job_match_rate['job_name']}}
            </a>
        </div>
        <div class="col-span-2 border-b-2">
            Job rate: {{$all_job_match_rate['job_rate']}} %
        </div>
        <div class="col-span-7 border-b-2 bg-gray-50">
            <div class="jobContent hidden" id="job{{$all_job_match_rate['id']}}">
                {{$all_job_match_rate['job_name']}}
                <br/>
                habba
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