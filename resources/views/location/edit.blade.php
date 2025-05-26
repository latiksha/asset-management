@extends('layouts.app')
@section( 'content')

<div class="max-w-7xl mx-auto bg-white shadow-sm dark:bg-gray-700">

    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800 dark:text-white">Edit Details</h1>

    </div>

    <div class="p-6 bg-gray-50 dark:bg-gray-700">

        <form action="{{route('location.update',$location->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="bg-white p-6 rounded-sm shadow-sm dark:bg-gray-700">


                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="location" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Location</label>
                        <input type="text" id="location" name="location" value="{{ $location->location }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                    </div>
                    <div>
                        <label for="contact_person" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Point of Contact (POC)</label>
                        <input type="text" id="contact_person" name="contact_person" value="{{ $location->contact_person }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                    </div>

                    <div>
                        <label for="contact_person_mobile" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">POC number</label>
                        <input type="number" id="contact_person_mobile" name="contact_person_mobile" value="{{ $location->contact_person_mobile }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                    </div>

                    <div>
                        <label for="address" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Address</label>
                        <input type="text" id="address" name="address" value="{{ $location->address }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                    </div>
                    {{-- google map --}}
                    <div class="col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Select Location on Map</label>
                        <div id="map" style="height: 400px; width: 100%;" class="mb-4 rounded shadow-sm"></div>
                    </div>


                    <div>
                        <label for="lat" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Latitude</label>
                        <input type="text" id="lat" name="lat" value="{{ $location->lat}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                    </div>

                    <div>
                        <label for="long" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Longitude</label>
                        <input type="text" id="long" name="long" value="{{ $location->long}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">
                    </div>

                </div>
            </div>

            <div class="mt-10 flex justify-center gap-2">
                <button type="submit" id="btn" class=" px-4 py-2 bg-gray-800 text-white rounded-sm text-sm font-medium uppercase font-sans dark:text-white dark:bg-blue-500">update details</button>
                <button class="px-10 py-2 bg-gray-500 text-white"><a href="{{ route('location.list') }}">Back</a></button>


            </div>
    </div>
    </form>
</div>
</div>
<script>
    let map;
    let marker;
    let infoWindow;

    window.initMap = async function() {
        // Get latitude and longitude from input fields
        var latInput = parseFloat(document.getElementById("lat").value);
        var lngInput = parseFloat(document.getElementById("long").value);
        var Previous = !isNaN(latInput) && !isNaN(lngInput);


        var center = Previous ? {
            lat: latInput
            , lng: lngInput
        } : {
            lat: 23.0225
            , lng: 72.5714
        };
        // new map
        map = new google.maps.Map(document.getElementById("map"), {

            center: center,

            zoom: 18
        , });
        infoWindow = new google.maps.InfoWindow();


        // If there's a saved marker, show it
        if (Previous) {
            marker = new google.maps.Marker({
                position: center
                , map: map
                , title: "Previously selected location"
            });
            marker.addListener("click", function() {
                infoWindow.setContent("Previously selected location");
                infoWindow.open(map, marker);
            });
        }



        // Set new marker
        map.addListener("click", function(event) {
            const clickedPosition = event.latLng;

            if (marker) {
                marker.map = null;
            }

            marker = new google.maps.Marker({

                map: map
                , position: clickedPosition,

                title: "Selected Location"
            , });

            infoWindow.setContent("Selected Location");
            infoWindow.open(map, marker);

            // Update form inputs
            document.getElementById("lat").value = clickedPosition.lat();
            document.getElementById("long").value = clickedPosition.lng();
        });
    };

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiA4S_sB5FmVtUv4yGKoQJ_IGMctiXl3s&callback=initMap" async defer></script>


@endsection
