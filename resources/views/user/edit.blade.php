@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-sm">
    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800">Edit Details</h1>
    </div>

    <div class="p-6 bg-gray-50">
        <form action="{{route('user.update',$user->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="bg-white p-6 rounded-sm shadow-sm">

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-1 ">Name</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-1 ">email</label>
                        <input type="text" id="email" name="email" value="{{ $user->email }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>


                </div>

                <div class="mt-10 flex justify-center">
                    <button type="submit" id="btn" class=" px-4 py-2 bg-gray-800 text-white rounded-sm text-sm font-medium uppercase font-sans">update details</button>
                </div>
            </div>
        </form>
    </div>
</div>








@endsection
