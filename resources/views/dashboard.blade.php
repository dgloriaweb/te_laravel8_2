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

            </div>
        </div>
    </div>
</x-app-layout>
