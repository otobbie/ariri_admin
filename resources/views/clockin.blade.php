@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-10">
    <div
        class="rounded-sm border border-stroke bg-white px-5 pb-2.5 pt-6 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
            <h4 class="text-xl font-bold text-black dark:text-white">
                Clock In & Clock Out
            </h4>
            @if(session('clockin'))
                <a href="{{ route('clock.out') }}" class="bg-red-500 text-white px-6 py-2 rounded-lg font-semibold shadow-md hover:bg-red-600 transition duration-300 mt-3 md:mt-0">
                    Clock Out
                </a>
            @else
                <a href="{{ route('clock.in') }}" class="bg-green-500 text-white px-6 py-2 rounded-lg font-semibold shadow-md hover:bg-green-600 transition duration-300 mt-3 md:mt-0">
                    Clock In
                </a>
            @endif


        </div>


        @if(session('success'))
            <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </button>
            </div>
        @elseif(session('warning'))

            <div id="alert-4" class="flex items-center p-4 mb-4 text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('warning') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-4" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </button>
            </div>
        @endif

        <div class="flex flex-col">
            <div class="grid grid-cols-3 rounded-sm bg-gray-2 dark:bg-meta-4 sm:grid-cols-5">
                <div class="p-2.5 xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Date</h5>
                </div>
                <div class="p-2.5 text-center xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Clock In Time</h5>
                </div>
                <div class="hidden p-2.5 text-center sm:block xl:p-5">
                    <h5 class="text-sm font-medium uppercase xsm:text-base">Clock Out Time</h5>
                </div>
            </div>

            @foreach($clockIns as $clockIn)
                <div class="grid grid-cols-3 border-b border-stroke dark:border-strokedark sm:grid-cols-5">
                    <div class="flex items-center gap-3 p-2.5 xl:p-5">
                        <p class="hidden font-medium text-black dark:text-white sm:block">
                            {{\Carbon\Carbon::parse($clockIn->created_at)->format('Y-m-d') }}
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-black dark:text-white">
                            {{ \Carbon\Carbon::parse($clockIn->clock_in_time)->format('H:i:s') }}
                        </p>
                    </div>

                    <div class="flex items-center justify-center p-2.5 xl:p-5">
                        <p class="font-medium text-meta-3">
                            {{ $clockIn->clock_out_time ? \Carbon\Carbon::parse($clockIn->clock_out_time)->format('H:i:s') :  $clockIn->clock_out_time }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection