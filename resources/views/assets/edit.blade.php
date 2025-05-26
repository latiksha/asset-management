@extends('layouts.app')
@section( 'content')

<div class="max-w-7xl mx-auto bg-white shadow-sm dark:bg-gray-700">

    <div class="border-b border-gray-200 py-4 px-6 text-center">
        <h1 class="text-lg font-medium text-gray-800 dark:text-white">Edit Asset</h1>

    </div>

    <div class="p-6 bg-gray-50 dark:bg-gray-700">

        <form action="{{route('assets.update',$asset->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="bg-white p-6 rounded-sm shadow-sm dark:bg-gray-700">


                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label for="type" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Asset name</label>
                        <input type="text" id="type" name="type" value="{{ $asset->type}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                    </div>

                    <div>
                        <label for="assigned_to" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Holder name</label>

                        <input type="text" id="assigned_to" name="assigned_to" value="{{ $asset->assigned_to}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                    </div>

                    <div>
                        <label for="location" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Location</label>

                        <div class="relative">
                            <select id="location" name="location" class="w-full px-3 py-2 border border-gray-300 rounded-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none pr-8 dark:text-white dark:bg-gray-600">

                                <option value="">Select location</option>
                                @foreach($location as $loc)
                                <option value="{{ $loc->location }}" {{ old('location',$asset->location) == $loc->location ? 'selected' : '' }}>{{ $loc->location }}</option> @endforeach

                            </select>
                            @error('location')
                            <span class="text-sm text-red-500">{{ $message }}</span>
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
                        <label for="issue_date" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Issue date</label>

                        <input type="date" id="issue_date" name="issue_date" value="{{ $asset->issue_date}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                    </div>

                    <div>
                        <label for="resubmit_date" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Resubmit date</label>

                        <input type="date" id="resubmit_date" name="resubmit_date" value="{{ $asset->resubmit_date}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                    </div>

                    <div>
                        <label for="issued_by" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Issued by</label>

                        <input type="text" id="issued_by" name="issued_by" value="{{ $asset->issued_by}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                    </div>

                    <div>
                        <label for="approved_by" class=" text-sm font-bold text-gray-700 mb-1 dark:text-white">Approved by</label>

                        <input type="text" id="approved_by" name="approved_by" value="{{ $asset->approved_by}}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                    </div>
                </div>

                {{-- attribute form  --}}
                <div class="mt-8">
                    <h2 class="text-lg font-medium text-gray-800 mb-2 dark:text-white">Add Attributes</h2>

                    <div id="attribute_fields">
                        @if( $asset->attributes->count())
                        @foreach( $asset->attributes as $attribute)
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <input type="text" name="attribute_key[]" value="{{$attribute->attribute_key}}" placeholder="Key" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                            <input type="text" name="attribute_value[]" value="{{$attribute->attribute_value }}" placeholder="Value" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white  dark:bg-gray-600">

                        </div>
                        @endforeach
                        @else
                        <div class="grid grid-cols-2 gap-4 mb-4 ">
                            <input type="text" name="attribute_key[]" placeholder="Key" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                            <input type="text" name="attribute_value[]" placeholder="Value" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white  dark:bg-gray-600">


                        </div>
                        @endif
                    </div>

                    <button type="button" id="add_field_btn" class="mt-2 px-2 py-2 bg-gray-400 text-black rounded-sm text-sm font-medium uppercase font-sans dark:bg-green-500 dark:text-white">
                        Add fields
                    </button>
                </div>




                <div class="flex justify-center gap-2">
                    <button type="submit" class=" px-4 py-2  bg-gray-800 text-white rounded-sm text-sm font-medium uppercase font-sans dark:bg-blue-500 dark:text-white">update details</button>
                    <button class="px-10 py-2 bg-gray-500 text-white"><a href="{{ route('assets.list') }}">Back</a></button>

                </div>
            </div>
    </div>
    </form>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var maxInputs = 5;
        var fieldCount = 1;

        $("#add_field_btn").click(function(e) {
            e.preventDefault();
            if (fieldCount < maxInputs) {
                fieldCount++;
                $("#attribute_fields").append(`
                <div class="grid grid-cols-2 gap-4 mb-4">
                
                    <input type="text" name="attribute_key[]" placeholder="Key"
                        class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">
                    <div class="flex">
                        <input type="text" name="attribute_value[]" placeholder="Value"
                            class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:bg-gray-600 dark:text-white">

                        <button type="button" class="remove_field bg-red-500 text-white px-3 py-2 ml-2 rounded-sm">
                            Delete
                        </button>
                    </div>
                </div>
                `);
            } else {
                alert("You reached the maximum limit of 5 attributes.");
            }
        });

        $(document).on("click", ".remove_field", function(e) {
            e.preventDefault();
            $(this).closest('.grid').remove();
            fieldCount--;
        });
    });

</script>


@endsection
