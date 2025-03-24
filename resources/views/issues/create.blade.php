@extends('layouts.app')



@section('content')



<div class="max-w-7xl mx-auto bg-white shadow-sm">
    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800">Add Issue</h1>
    </div>

    <div class="p-6 bg-gray-50">
        <form action="{{ route('storeIssue') }}" method="POST">
            @csrf
            <div class="bg-white p-6 rounded-sm shadow-sm">
                <!-- First row: Name, Address, GSTIN, State -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="issue" class="block text-sm font-bold text-gray-700 mb-1">Issue</label>
                        <input type="text" id="issue" name="issue" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('issue')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-bold text-gray-700 mb-1">Description</label>
                        <input type="text" id="description" name="description" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('description')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>


                    <div>
                        <label for="priority" class="block text-sm font-bold text-gray-700 mb-1">Priority</label>
                        <div class="relative">
                            <select id="Priority" name="priority" class="w-full px-3 py-2 border border-gray-300 rounded-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none pr-8">
                                <option>High</option>
                                <option>Medium</option>
                                <option>Low</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <div class="w-4 h-4 text-gray-400">
                                    <!-- Custom chevron-down using borders instead of SVG -->
                                    <div class="w-2 h-2 border-r border-b border-gray-500 transform rotate-45 mt-1 ml-1"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="department" class="block text-sm font-bold text-gray-700 mb-1">Department</label>
                        <input type="text" id="department" name="department" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('department')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>



                    <div>
                        <label for="status" class="block text-sm font-bold text-gray-700 mb-1">Status</label>
                        <div class="relative">
                            <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 rounded-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none pr-8">
                                <option>Closed</option>
                                <option>In progress</option>
                                <option>Not started</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <div class="w-4 h-4 text-gray-400">
                                    <!-- Custom chevron-down using borders instead of SVG -->
                                    <div class="w-2 h-2 border-r border-b border-gray-500 transform rotate-45 mt-1 ml-1"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div>
                        <label for="date" class="block text-sm font-bold text-gray-700 mb-1">Date</label>
                        <input type="date" id="date" name="date" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('date')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-bold text-gray-700 mb-1">Issue Type</label>
                        <input type="text" id="type" name="type" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('type')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-center">
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-sm text-sm font-medium uppercase">Add Issue</button>
                </div>
            </div>
    </div>
</div>
</form>
@endsection
