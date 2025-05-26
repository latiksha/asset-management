@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-sm overflow-hidden dark:bg-gray-700">
    <div class="p-6">

        {{-- Header with Title and Search --}}
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white">User List</h1>

            <form method="GET" action="{{ route('user.list') }}" class="flex items-center space-x-2">
                <div class="relative">
                    <input type="text" name="search" id="default-search" value="{{ request('search') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " autocomplete="off" placeholder="search user..." required>

                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    </div>
                </div>

                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-0.5 rounded-md border-2">
                    Filter
                </button>

                <button type="button" onclick="window.location.href='{{ route('user.list') }}'" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-0.5 rounded-md border-2 ">
                    Clear
                </button>
            </form>
        </div>





        {{-- User Table --}}
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 shadow-md dark:bg-gray-600">
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600 dark:text-white">Name</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600 dark:text-white">Email</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600 dark:text-white">Mobile no.</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600 dark:text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($data) && count($data) > 0)
                    @foreach($data as $member)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $member->name }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $member->email }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $member->phone }}</td>
                        <td class="py-4 px-6 flex space-x-4">
                            <a href="{{ route('user.create') }}">
                                <i class="ri-edit-line text-gray-800 hover:text-blue-700"></i>
                            </a>
                            <form action="{{ route('user.delete', $member->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="ri-delete-bin-line text-gray-800 hover:text-gray-800"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="py-4 px-6 text-center text-gray-600 dark:text-white">No data available</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        {{-- Pagination & Items per page --}}
        <div class="mt-4 flex items-center justify-between">
            <div>
                {{ $data->appends(['items' => request('items')])->links() }}
            </div>

            <form>
                <select id="pagination" class="border border-gray-300 rounded-lg p-1 dark:bg-gray-600 dark:text-white">
                    <option value="5" @if($items==5) selected @endif>5</option>
                    <option value="10" @if($items==10) selected @endif>10</option>
                    <option value="25" @if($items==25) selected @endif>25</option>
                </select>
            </form>
        </div>

    </div>
</div>

<script>
    document.getElementById('pagination').onchange = function() {
        window.location = "{{ request()->url() }}?items=" + this.value;
    };

</script>

@endsection
