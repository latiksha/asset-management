@extends('layouts.app')
@section('content')



<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Issue List</h1>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Issue</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Description</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">IssueType</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">priority</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Department</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Status</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Date</th>
                        <th class=" flex justify-center py-3 px-6 text-left text-sm font-semibold text-gray-600">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @if(isset($issue) && count($issue) > 0)
                    @foreach($issue as $list)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $list->issue }}</td>
                        <td class="py-4  text-sm text-gray-600">{{ $list->description}}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $list->type }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $list->priority }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $list->department }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $list->status }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $list->date}}</td>
                        <td class="py-2 px-4 flex flex-cols-2">
                            <div class="flex flex-cols-2 mt-1">
                                <button class="bg-blue-500  hover:bg-blue-600 text-white  px-4 rounded text-sm transition-colors"><a href="{{ route('issues.edit', $list->id) }}">Edit</a></button>
                                <form action="{{ route('issues.delete', $list->id) }}" method="POST">



                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" bg-blue-500  hover:bg-blue-600 text-white py-2 px-2 ml-2 rounded text-sm transition-colors">
                                        <a onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    </button>


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
                {{ $issue->links() }}
            </div>

        </div>
    </div>
</div>
@endsection
