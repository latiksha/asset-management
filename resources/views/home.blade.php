@extends('layouts.app')

@section('content')
<div class="p-6 text-center">
    <!-- SI logo -->
    <div class="flex justify-center mb-4">
        <div class="text-green-500 font-bold text-3xl">91</div>
    </div>

    <!-- User profile image -->
    <div class="flex justify-center mb-4">
        <div class="w-16 h-16 bg-gray-300 rounded-full flex items-center justify-center">
            <i class="fas fa-user text-2xl text-gray-600"></i>
        </div>
    </div>

    <!-- Welcome message -->
    <div class="text-gray-700">
        <span class="font-bold"> Welcome to ninety one</span>

    </div>
</div>
@endsection
