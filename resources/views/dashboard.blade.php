@extends('layouts.app')
@section( 'content')
<div class="p-6 dark:bg-gray-700">

    <span class="text-2xl font-bold text-gray-800 dark:text-white">Dashboard</span>


    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-pink-100  rounded-xl shadow p-4 w-64">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-gray-500 ">Number of Locations</div>
                        <div class="text-3xl font-bold dark:text-gray-800">{{$locationCount}}</div>


                    </div>
                    <div class="text-5xl opacity-30 dark:text-gray-400">
                        <i class="ri-user-location-line"></i>

                    </div>
                </div>

            </div>


            <div class="bg-blue-100  rounded-xl shadow p-4 w-64">
                <div class="flex items-center justify-between">
                    <div>
                        <div class=" text-gray-500">Number of Assets</div>
                        <div class="text-3xl font-bold dark:text-gray-800">{{ $assetCount}}</div>


                    </div>
                    <div class="text-5xl opacity-30 dark:text-gray-400">
                        <i class="ri-macbook-line"></i>
                    </div>
                </div>

            </div>


            <div class="bg-yellow-100  rounded-xl shadow p-4 w-64">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-gray-500">Number of Issues</div>
                        <div class="text-3xl text-red-500 font-bold">{{$issueCount}}</div>


                    </div>
                    <div class="text-5xl opacity-30 dark:text-gray-400">
                        <i class="ri-questionnaire-line"></i>



                    </div>
                </div>

            </div>

        </div>


    </div>
</div>
@endsection
