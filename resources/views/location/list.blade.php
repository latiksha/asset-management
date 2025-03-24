@extends('layouts.app')
@section('content')




<div class="max-w-7xl bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="p-6 ">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Location list</h1>
        <div class="overflow-x-auto">


            <table class="w-full  ">

                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Location</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Point Of Contact (POC)</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">POC number</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Address</th>
                        <th class="py-1 px-4 text-left text-sm font-semibold text-gray-600">Latitude</th>
                        <th class="py-1 px-4 text-left text-sm font-semibold text-gray-600">Longitude</th>
                        <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @if(isset($location) && count($location) > 0)
                    @foreach($location as $loc)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $loc->location }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $loc->contact_person}}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $loc->contact_person_mobile }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $loc->address }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $loc->lat }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $loc->long }}</td>
                        <td class="py-2 px-4 flex flex-cols-2">
                            <form action="{{ route('location.delete', $loc->id) }}" method="POST">
                                <div class="flex flex-cols-2 mt-1">

                                    <button class="bg-blue-500  hover:bg-blue-600 text-white  px-4 rounded text-sm transition-colors"><a href="{{ route('location.edit', $loc->id) }}">Edit</a></button>


                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" bg-blue-500  hover:bg-blue-600 text-white py-2 px-2 ml-2 rounded text-sm transition-colors"><a onclick="return confirm('Are you sure you want to delete?')">Delete</a></button>

                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="py-4 px-6 text-center text-gray-600">No data available</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class="mt-4">
                {{ $location->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
