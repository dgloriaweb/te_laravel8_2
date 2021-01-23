<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Jobs
        </h2>
    </x-slot>

    
    
                @foreach($jobs as $job)
                {{$job->job_name}}<br/>
                @endforeach
            
    Here
</x-app-layout>
