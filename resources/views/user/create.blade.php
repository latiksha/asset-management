@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-sm dark:bg-gray-700">
    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800 dark:text-white">Add user</h1>
    </div>

    <div class="p-6 bg-gray-50 dark:bg-gray-700">
        <form action="{{route('user.store')}}" method="POST">
            @csrf

            <div class="bg-white p-6 rounded-sm shadow-sm dark:bg-gray-700">


                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white ">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">email</label>
                        <input type="text" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">

                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Mobile no.</label>
                        <input type="text" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">

                    </div>
                    <div>
                        <label for="password" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Password</label>
                        <input type="text" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">

                    </div>




                </div>

                <div class="mt-10 flex justify-center gap-2">
                    <button type="submit" class=" px-4 py-2 bg-gray-800 text-white rounded-sm text-sm font-medium uppercase font-sans dark:text-white dark:bg-blue-500">Add user</button>
                    <button class="px-10 py-2 bg-gray-500 text-white"><a href="{{ route('user.list') }}">Back</a></button>

                </div>
            </div>
        </form>
    </div>
</div>








@endsection
