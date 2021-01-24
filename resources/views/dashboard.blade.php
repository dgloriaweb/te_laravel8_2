<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                You haven't got a job that matches more than 40%, is it because you didn't provide enough data? Based on that I
			cannot give you recommendation for a future role. Please scroll down and fill in more data to continue.

            <br/>
            OR
            <br/>

            <div class="card">
                <h2>Recommended jobs</h2>
                <br>
                
                    <div class="card-text">
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <h5><a href="#">Potter</a></h5>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="progress progress_home" style="height:1.5rem;">
                                
                                    
                                    <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width:65%">
                                        <span class="sr-only">65% Complete</span>
                                    </div>
                                    <span class="progress-completed">&nbsp;65%</span>
                                </div>
    
                                
                            </div>
                        </div>
                        <br>
                    </div>
    
    
               
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
