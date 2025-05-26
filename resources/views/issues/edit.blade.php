@extends('layouts.app')
@section('content')

<div class="max-w-7xl mx-auto bg-white shadow-sm dark:bg-gray-700">

    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800">Edit Issue</h1>
    </div>

    <div class="p-6 bg-gray-50 dark:bg-gray-700">

        <form action="{{route('issues.update',$issue->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method("PUT")
            <div class="bg-white p-6 rounded-sm shadow-sm dark:bg-gray-700">


                <div class="grid grid-cols-2  gap-4 mb-6">
                    <div>
                        <label for="select_asset" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Select asset</label>
                        <div class="relative">
                            <select id="select_asset" name="select_asset" value="{{$issue->select_asset}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none pr-8 dark:text-white dark:bg-gray-600">
                                <option value="">Select asset</option>
                                @foreach($asset as $set)
                                <option value="{{ $set->type }}=>{{ $set->issued_by }}" {{ old('select_asset', $issue->select_asset) == $set->type.'=>'.$set->issued_by ? 'selected' : '' }}>{{ $set->type}}=>{{ $set->issued_by}}</option>


                                @endforeach

                            </select>
                            @error('select_asset')
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
                        <label for="department" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white ">Department</label>
                        <input type="text" id="department" name="department" value="{{ $issue->department }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-bold  text-gray-700 mb-1 dark:text-white">Issue type</label>
                        <div class="relative">
                            <select id="type" name="type" value="{{ $issue->type }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none pr-8 dark:text-white dark:bg-gray-600">

                                <option>Not working</option>
                                <option>Broken</option>
                                <option>Misplaced</option>
                                <option>Stolen</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <div class="w-4 h-4 text-gray-400">
                                    <!-- Custom chevron-down using borders -->
                                    <div class="w-2 h-2 border-r border-b border-gray-500 transform rotate-45 mt-1 ml-1 dark:border-white"></div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div>
                        <label for="description" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Description</label>
                        <input type="text" id="description" name="description" value="{{ $issue->description }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                    </div>

                    <div>
                        <label for="date" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white ">Date</label>
                        <input type="date" id="date" name="date" value="{{ $issue->date }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                    </div>

                    <div>
                        <label for="status" class=" block text-sm font-bold  text-gray-700 mb-1 dark:text-white">Status</label>
                        <div class="relative">
                            <select id="status" name="status" value="{{ $issue->status }}" class=" w-full px-3 py-2 border border-gray-300 rounded-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none pr-8 dark:text-white dark:bg-gray-600">

                                <option>Open</option>
                                <option>In progress</option>
                                <option>Close</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <div class="w-4 h-4 text-gray-400">
                                    <!-- Custom chevron-down using borders -->
                                    <div class="w-2 h-2 border-r border-b border-gray-500 transform rotate-45 mt-1 ml-1 dark:border-white"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- edit images --}}

                    <div class="mt-4">
                        <p class="text-sm font-semibold text-gray-800 mb-2 dark:text-white mt-3">Uploaded Images:</p>
                        <div class="flex flex-wrap gap-3">
                            @foreach ($images as $img)
                            <div id="img-{{ $img->id }}" class="w-24 h-24 border rounded ">


                                {{-- delete button --}}
                                <button onclick="deleteImage({{ $img->id }})" class=" top-6 right-6 bg-red-600 text-white text-xs w-5 h-5 flex items-center justify-center rounded-bl z-10">
                                    &times;
                                </button>

                                <img src="{{ asset($img->image) }}" class="w-full h-full object-cover">

                            </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="text-sm text-gray-800 block border border-gray-300 rounded-sm focus:outline-none focus:ring-1">
                        <label class="form-label" for="inputImage">Image: you can choose more images</label>
                        <input type="file" name="image[]" id="inputImage" class="form-control @error('image.*') is-invalid @enderror" multiple="" />
                    </div>


                </div>
                <div class=" mt-24 flex justify-center gap-2">
                    <button type="submit" class=" px-4 py-2 bg-gray-800 text-white rounded-sm text-sm font-medium uppercase font-sans dark:text-white dark:bg-blue-500">update details</button>
                    <button class="px-10 py-2 bg-gray-500 text-white"><a href="{{ route('issues.list') }}">Back</a></button>

                </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function deleteImage(id) {
        if (confirm('Are you sure you want to delete this image?')) {
            $.ajax({
                url: '{{ url("issues/images/delete") }}/' + id,


                type: 'POST',

                data: {
                    "_token": $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    alert(response.success);
                    $('#img-' + id).remove();
                },

                error: function(xhr) {
                    console.log("Response:", xhr.responseText);
                    alert('Something went wrong. Please try again.');
                }
            });
        }
    }

</script>



@endsection
