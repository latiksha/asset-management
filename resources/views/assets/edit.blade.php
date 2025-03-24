@extends('layouts.app')
@section( 'content')

<div class="max-w-7xl mx-auto bg-white shadow-sm">
    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800">Edit Asset</h1>
    </div>

    <div class="p-6 bg-gray-50">
        <form action="{{route('assets.update',$asset->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="bg-white p-6 rounded-sm shadow-sm">

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="type" class="block text-sm font-bold text-gray-700 mb-1">Asset name</label>
                        <input type="text" id="type" name="type" value="{{ $asset->type}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">

                    </div>

                    <div>
                        <label for="assigned_to" class="block text-sm font-bold text-gray-700 mb-1">Holder name</label>
                        <input type="text" id="assigned_to" name="assigned_to" value="{{ $asset->assigned_to}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">

                    </div>

                    <div>
                        <label for="location" class="block text-sm font-bold text-gray-700 mb-1">Location</label>
                        <input type="location" id="location" name="location" value="{{ $asset->location}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">

                    </div>
                    <div>
                        <label for="issue_date" class="block text-sm font-bold text-gray-700 mb-1">Issue date</label>
                        <input type="date" id="issue_date" name="issue_date" value="{{ $asset->issue_date}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">

                    </div>

                    <div>
                        <label for="resubmit_date" class="block text-sm font-bold text-gray-700 mb-1">Resubmit date</label>
                        <input type="date" id="resubmit_date" name="resubmit_date" value="{{ $asset->resubmit_date}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">

                    </div>

                    <div>
                        <label for="issued_by" class="block text-sm font-bold text-gray-700 mb-1">Issued by</label>
                        <input type="text" id="issued_by" name="issued_by" value="{{ $asset->issued_by}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">

                    </div>

                    <div>
                        <label for="approved_by" class="block text-sm font-bold text-gray-700 mb-1">Approved by</label>
                        <input type="text" id="approved_by" name="approved_by" value="{{ $asset->approved_by}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">

                    </div>


                </div>

                <div class="flex justify-center">
                    <button type="submit" class=" px-4 py-2  bg-gray-800 text-white rounded-sm text-sm font-medium uppercase font-sans">update details</button>
                </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
