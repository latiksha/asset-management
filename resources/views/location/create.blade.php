@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto bg-white shadow-sm dark:bg-gray-700">
    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800 dark:text-white">Add Details</h1>
    </div>

    <div class="p-6 bg-gray-50 dark:bg-gray-700">

        <form action="{{route('storeData')}}" method="POST">
            @csrf
            <div class="bg-white p-6 rounded-sm shadow-sm dark:bg-gray-700">


                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="location" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Location Name</label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">
                        @error('location')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block dark:text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    {{-- location code --}}
                    <div>
                        <label for="location_code" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Location code (e.g-GJ)</label>
                        <input type="text" id="location_code" value="{{ old('location_code') }}" name="location_code" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">

                    </div>
                    <div>
                        <label for="address" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Address</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">

                        @error('address')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block dark:text-red-500">

                            {{ $message }}
                        </span>
                        @enderror


                    </div>
                    <div>
                        <label for="contact_person" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Point Of Contact (POC)</label>
                        <input type="text" id="contact_person" name="contact_person" value="{{ old('contact_person') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">

                        @error('contact_person')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block dark:text-red-500">

                            {{ $message }}
                        </span>
                        @enderror

                    </div>

                    <div>
                        <label for="contact_person_mobile" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">POC Number</label>
                        <input type="number" id="contact_person_mobile" name="contact_person_mobile" value="{{old('contact_person_mobile')}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">

                        @error('contact_person_mobile')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block dark:text-red-500">

                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    {{-- google map --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Select Location on Map</label>
                        <div id="map" style="height: 400px; width: 100%;" class="mb-4 rounded shadow-sm"></div>
                    </div>
                    <div>
                        <label for="lat" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Latitude</label>
                        <input type="text" id="lat" name="lat" value="{{old('lat')}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">

                        @error('lat')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block dark:text-red-500">

                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="long" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Longitude</label>
                        <input type="text" id="long" name="long" value="{{old('long')}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">

                        @error('long')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block dark:text-red-500">

                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>
            </div>

    </div>
</div>
<div class="mt-6 flex justify-center gap-2">
    <button type="submit" id="btn" class=" w-36 justify-center px-4 py-2 bg-gray-800 text-white rounded-sm text-sm font-medium uppercase font-sans dark:text-white dark:bg-blue-500 ">Add Details</button>
    <button class="px-10 py-2 bg-gray-500 text-white"><a href="{{ route('location.list') }}">Back</a></button>

</div>

</div>
</form>
</div>
<script>
    let map;
    let marker;

    window.initMap = async function() {
        const position = {
            lat: 23.0225
            , lng: 72.5714
        }; // Default location (ahmd)

        // Load libraries
        const {
            Map
        } = await google.maps.importLibrary("maps");
        const {
            AdvancedMarkerElement
        } = await google.maps.importLibrary("marker");

        // new map
        map = new Map(document.getElementById("map"), {
            center: position
            , zoom: 8
        , });

        // Set new marker
        map.addListener("click", function(event) {
            const clickedPosition = event.latLng;

            if (marker) {
                marker.setMap(null);

            }

            marker = new google.maps.Marker({

                map: map
                , position: clickedPosition
                , title: "Selected Location"
            , });



            // Update form inputs
            document.getElementById("lat").value = clickedPosition.lat();
            document.getElementById("long").value = clickedPosition.lng();
        });
    };


    const locationCodeMap = {
        'ahmd': 'GJ'
        , 'ahmedabad': 'GJ'
        , 'mumbai': 'MH'
        , 'delhi': 'DL'
        , 'baroda': 'GJ'
        , 'kerala': 'KL'
        , 'ludhiana': 'PB'
    , };


    document.addEventListener('DOMContentLoaded', () => {
        const locationInput = document.getElementById('location');
        const codeInput = document.getElementById('location_code');
        if (!locationInput || !codeInput) return;


        locationInput.addEventListener('input', function() {
            const key = this.value.toLowerCase().trim();
            codeInput.value = locationCodeMap[key] || '';
        });


    });

</script>
<!-- Google Maps API key  -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&callback=initMap" async defer></script>



@endsection
