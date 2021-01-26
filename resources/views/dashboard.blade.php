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
                    <div class="text-blue-700 hover:text-purple-800 underline">
                        <a href="{{ route('user_settings') }}">Go to user settings</a>
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