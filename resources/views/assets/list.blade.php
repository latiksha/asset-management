@extends('layouts.app')
@section( 'content')


<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Asset List</h1>
        <div class="overflow-x-auto">

            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Type</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Holder name</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Location</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Issue date</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Resubmit date</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Issued by</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Approved by</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @if(isset($asset) && count($asset) > 0)
                    @foreach($asset as $set)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $set->type }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $set->assigned_to }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $set->location}}</td>
                        <td class="py-4 px-6 text-sm text-gray-600" style="width: 8rem;">{{ $set->issue_date }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $set->resubmit_date }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $set->issued_by }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $set->approved_by }}</td>
                        <td class="py-2 px-4 flex flex-cols-2">
                            <div class="flex flex-cols-2 mt-1">

                                <button class="bg-blue-500  hover:bg-blue-600 text-white  px-4 rounded text-sm transition-colors"><a href="{{ route('assets.edit', $set->id) }}">Edit</a></button>

                                <form action="{{ route('assets.delete', $set->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" bg-blue-500  hover:bg-blue-600 text-white py-2 px-2 ml-2 rounded text-sm transition-colors"><a onclick="return confirm('Are you sure you want to delete?')">Delete</a></button>
                                </form>
                            </div>
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
                {{ $asset->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
