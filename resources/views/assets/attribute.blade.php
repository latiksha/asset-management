@extends('layouts.app')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="max-w-7xl mx-auto bg-white shadow-sm mt-10">
    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800">Add Attribute</h1>
    </div>
    <div class="p-6 bg-gray-50">
        <form action="{{route('storeAttribute')}}" method="POST">
            @csrf
            <div class="bg-white p-6 rounded-sm shadow-sm">
                <!-- First Row: Asset ID ,key+value-->
                <div class="grid grid-cols-3 gap-4 mb-6 items-end">
                    <!-- Asset ID -->
                    <div>
                        <label for="asset_id" class="block text-sm font-bold text-gray-700 mb-1">Asset ID</label>
                        <input type="text" id="asset_id" name="asset_id" value="{{ $asset_id }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                    <!-- Key -->
                    <div>
                        <label for="attribute_key" class="block text-sm font-bold text-gray-700 mb-1">Key</label>
                        <input type="text" id="attribute_key" name="attribute_key[]" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                    <!-- Value -->
                    <div>
                        <label for="attribute_value" class="block text-sm font-bold text-gray-700 mb-1">Value</label>
                        <input type="text" id="attribute_value" name="attribute_value[]" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>
                </div>

                <!-- Container for dynamically adding fields -->
                <div id="field_container"></div>

                <!-- Buttons -->
                <div class="mt-6 flex justify-center space-x-4">
                    <button type="button" id="add_form_field" class="px-4 py-2 bg-gray-800 text-white rounded-sm text-sm font-medium uppercase font-sans">
                        Add Fields
                    </button>

                    <button type="submit" id="addAssetBtn" class="px-4 py-2 bg-gray-800 text-white rounded-sm text-sm font-medium uppercase font-sans">
                        Add Attribute
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
