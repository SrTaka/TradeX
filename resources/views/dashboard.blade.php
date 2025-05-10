<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- @include('dashboard-content') --}}
    <!-- <script src="{{ asset('js/dashboard.js') }}"></script> -->
</x-app-layout>
