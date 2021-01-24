<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Settings') }}
        </h2>
    </x-slot>

    <div class="p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               User Settings for {{ Auth::user()->name }}
               <br/>
               Workplace:
               {{ $person['workplace'] }}
            </div>
        </div>
    </div>
    

</x-app-layout>
