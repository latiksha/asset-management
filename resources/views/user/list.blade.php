@extends('layouts.app')
@section( 'content')

<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-sm overflow-hidden">
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">User List</h1>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Name</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">email</th>
                        <th class=" py-3 px-6 text-left text-sm font-semibold text-gray-600">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @if(isset($data) && count($data) > 0)
                    @foreach($data as $member)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">

                        <td class="py-4 px-6 text-sm text-gray-600">{{ $member->name }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600">{{ $member->email }}</td>


                        <td class="py-4 px-6">
                            <form action="{{ route('user.delete', $member->id) }}" method="POST">

                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white  px-2 py-2 rounded text-sm transition-colors"><a onclick="return confirm('Are you sure you want to delete?')">Delete</a></button>

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
        </div>
    </div>
</div>

@endsection
