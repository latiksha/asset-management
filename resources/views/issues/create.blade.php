@extends('layouts.app')
@section('content')

@if ($errors->has('error'))
<div class="text-sm text-red-500 dark:text-red-500 mb-4">
    {{ $errors->first('error') }}
</div>
@endif



<div class="max-w-7xl mx-auto bg-white shadow-sm dark:bg-gray-700">

    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800 dark:text-white">Add Issue</h1>

    </div>

    <div class="p-6 bg-gray-50 dark:bg-gray-700">

        <form action="{{ route('storeIssue') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="bg-white p-6 rounded-sm shadow-sm dark:bg-gray-700">

                <!-- First row -->
                <div class="grid grid-cols-2 gap-6 mb-6">

                    <div>
                        <label for="select_asset" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Select asset (asset|name)</label>
                        <div class="relative">
                            <select id="select_asset" name="select_asset" value="{{ old('select_asset') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none pr-8 dark:text-white dark:bg-gray-600">
                                <option value="">Select asset</option>
                                @foreach($asset as $set)
                                <option value="{{ $set->type }} | {{ $set->issued_by }}" {{ old('select_asset') == $set->type. '|' .$set->issued_by ? 'selected' : '' }}>{{ $set->type}} | {{ $set->issued_by}}</option>

                                @endforeach

                            </select>


                            <div class="absolute inset-y-0 right-0 mt-3 items-center px-2 pointer-events-none">
                                <div class="w-4 h-4 text-gray-400">
                                    <!-- Custom chevron-down using borders instead of SVG -->
                                    <div class="w-2 h-2 border-r border-b border-gray-500 transform rotate-45 mt-1 ml-1 dark:border-white"></div>
                                </div>
                            </div>
                            @error('select_asset')
                            <span class="text-sm text-red-500 dark:text-red-500">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>


                    <div>
                        <label for="department" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Department</label>
                        <input type="text" id="department" name="department" value="{{ old('department') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                        @error('department')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block dark:text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="type" class=" block text-sm font-bold text-gray-700 mb-1 dark:text-white">Issue type</label>
                        <div class="relative">
                            <select id="type" name="type" value="{{ old('type') }}" class=" w-full px-3 py-2 border border-gray-300 rounded-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none pr-8 dark:text-white dark:bg-gray-600">


                                <option>Not working</option>
                                <option>Broken</option>
                                <option>Misplaced</option>
                                <option>Stolen</option>
                            </select>
                            @error('type')
                            <span class="text-sm text-red-500 dark:text-red-500">{{ $message }}</span>

                            @enderror


                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <div class="w-4 h-4 text-gray-400">
                                    <!-- Custom chevron-down using borders instead of SVG -->
                                    <div class="w-2 h-2 border-r border-b border-gray-500 transform rotate-45 mt-1 ml-1 dark:border-white"></div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div>
                        <label for="description" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Description</label>
                        <input type="text" id="description" name="description" value="{{ old('description') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                        @error('description')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block dark:text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Date of issue</label>
                        <input type="date" id="date" name="date" value="{{ old('date') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                        @error('date')
                        <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block dark:text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Status</label>
                        <div class="relative">
                            <select id="status" name="status" value="{{ old('status') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none pr-8 dark:text-white dark:bg-gray-600">


                                <option>Open</option>
                                <option>Out for service</option>
                                <option>Can't repair</option>
                                <option>Close</option>
                            </select>
                            @error('')
                            <span class="mt-2 text-sm text-red-500 peer-[&:not(:placeholder-shown):not(:focus):invalid]:block dark:text-red-500">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <div class="w-4 h-4 text-gray-400">
                                    <!-- Custom chevron-down using borders instead of SVG -->
                                    <div class="w-2 h-2 border-r border-b border-gray-500 transform rotate-45 mt-1 ml-1 dark:border-white"></div>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="mb-3 text-sm font-bold text-gray-700 w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600  ">


                        <label class="form-label" for="inputImage">Image: you can choose more images</label>
                        <input type="file" name="image[]" id="inputImage" class="form-control @error('image.*') is-invalid @enderror" multiple="" />

                        @error('image')
                        <span class="text-danger dark:text-red-500">{{ $message }}</span>
                        @enderror
                    </div>


                </div>

                <div class="mt-6 flex justify-center gap-2">
                    <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-sm text-sm font-medium uppercase dark:text-white dark:bg-blue-500">Add Issue</button>
                    <button class="px-10 py-2 bg-gray-500 text-white"><a href="{{ route('issues.list') }}">Back</a></button>

                </div>
            </div>

    </div>
</div>

</form>
@endsection
