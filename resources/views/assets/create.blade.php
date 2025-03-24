@extends('layouts.app')
@section('content')

<div class="mx-auto bg-white shadow-sm text-center mt-5">
    <h1 class="text-lg font-medium text-gray-800">Add Asset</h1>
    <hr>
</div>

<form action="{{route('storeAsset')}}" method="POST">
    @csrf

    <div class="bg-white p-6 rounded-sm shadow-sm mt-5">
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label for="type" class="block text-sm font-bold text-gray-700 mb-1">Asset Name</label>
                <input type="text" id="type" name="type" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
                @error('type') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="assigned_to" class="block text-sm font-bold text-gray-700 mb-1">Holder Name</label>
                <input type="text" id="assigned_to" name="assigned_to" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
                @error('assigned_to') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="location" class="block text-sm font-bold text-gray-700 mb-1">Location</label>
                <input type="text" id="location" name="location" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
                @error('location') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="issue_date" class="block text-sm font-bold text-gray-700 mb-1">Issue Date</label>
                <input type="date" id="issue_date" name="issue_date" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
                @error('issue_date') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="resubmit_date" class="block text-sm font-bold text-gray-700 mb-1">Resubmit Date</label>
                <input type="date" id="resubmit_date" name="resubmit_date" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
                @error('resubmit_date') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="issued_by" class="block text-sm font-bold text-gray-700 mb-1">Issued By</label>
                <input type="text" id="issued_by" name="issued_by" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
                @error('issued_by') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="approved_by" class="block text-sm font-bold text-gray-700 mb-1">Approved By</label>
                <input type="text" id="approved_by" name="approved_by" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
                @error('approved_by') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- attribute form  --}}
        <div class="mt-8">
            <h2 class="text-lg font-medium text-gray-800 mb-2">Add Attributes</h2>

            <div id="attribute_fields">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input type="text" name="attribute_key[]" placeholder="Key" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
                    <input type="text" name="attribute_value[]" placeholder="Value" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
                </div>
            </div>

            <button type="button" id="add_field_btn" class="mt-2 px-2 py-2 bg-gray-400 text-black rounded-sm text-sm font-medium uppercase font-sans">
                Add fields
            </button>
        </div>


        <div class="mt-6 flex justify-center">
            <button type="submit" class="px-10 py-2 bg-gray-800 text-white rounded-sm text-sm font-medium uppercase">
                Save
            </button>
        </div>

    </div>
</form>

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
                        class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
                    <div class="flex">
                        <input type="text" name="attribute_value[]" placeholder="Value"
                            class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500">
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
