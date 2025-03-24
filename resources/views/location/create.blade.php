@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-sm">
    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800">Add Details</h1>
    </div>

    <div class="p-6 bg-gray-50">
        <form action="{{route('storeData')}}" method="POST">
            @csrf
            <div class="bg-white p-6 rounded-sm shadow-sm">

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="location" class="block text-sm font-bold text-gray-700 mb-1">Location Name</label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('location')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-bold text-gray-700 mb-1">Address</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('address')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror


                    </div>
                    <div>
                        <label for="contact_person" class="block text-sm font-bold text-gray-700 mb-1">Point Of Contact (POC)</label>
                        <input type="text" id="contact_person" name="contact_person" value="{{ old('contact_person') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('contact_person')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror

                    </div>

                    <div>
                        <label for="contact_person_mobile" class="block text-sm font-bold text-gray-700 mb-1">POC Number</label>
                        <input type="number" id="contact_person_mobile" name="contact_person_mobile" value="{{old('contact_person_mobile')}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('contact_person_mobile')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror

                    </div>
                    <div>
                        <label for="lat" class="block text-sm font-bold text-gray-700 mb-1">Latitude</label>
                        <input type="text" id="lat" name="lat" value="{{old('lat')}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('lat')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror

                    </div>
                    <div>
                        <label for="long" class="block text-sm font-bold text-gray-700 mb-1">Longitude</label>
                        <input type="text" id="long" name="long" value="{{old('long')}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('long')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror

                    </div>

                </div>
            </div>
            <div class="mt-6 flex justify-center">
                <button type="submit" id="btn" class=" w-36 justify-center px-4 py-2 bg-gray-800 text-white rounded-sm text-sm font-medium uppercase font-sans ">Add Details</button>
            </div>

    </div>
    </form>
</div>
@endsection
