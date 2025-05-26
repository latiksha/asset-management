@extends('layouts.app')
@section('content')

<div class="mx-auto bg-white shadow-sm text-center mt-5 dark:bg-gray-700">

    <h1 class="text-lg font-medium text-gray-800 dark:text-white">Add Asset</h1>
    <hr>
</div>

<form action="{{route('storeAsset')}}" method="POST">
    @csrf

    <div class="bg-white p-6 rounded-sm shadow-sm mt-5 dark:bg-gray-700">

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <label for="type" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Asset Name</label>
                <input type="text" id="type" name="type" value="{{ old('type') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                @error('type') <span class="text-sm text-red-500 dark:text-red-500">{{ $message }}</span> @enderror

            </div>

            <div>
                <label for="assigned_to" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Holder Name</label>

                <input type="text" id="assigned_to" name="assigned_to" value="{{ old('assigned_to') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                @error('assigned_to') <span class="text-sm text-red-500 dark:text-red-500">{{ $message }}</span> @enderror

            </div>

            <div>
                <label for="location" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Location</label>

                <div class="relative">

                    <select id="location" name="location" value="{{ old('location') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm bg-white focus:outline-none focus:ring-1 focus:ring-blue-500 appearance-none pr-8 dark:text-white dark:bg-gray-600">

                        <option value="">Select location</option>
                        @foreach($location as $loc)
                        <option value="{{ $loc->location }}" data-code="{{ strtoupper($loc->location_code) }}">{{ $loc->location }}</option> @endforeach


                    </select>
                    <input type="hidden" name="location_code" value="{{ $location->first()->location_code ?? '' }}">



                    @error('location')
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
                <label for="issue_date" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Issue Date</label>

                <input type="date" id="issue_date" name="issue_date" value="{{ old('issue_date') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                @error('issue_date') <span class="text-sm text-red-500 dark:text-red-500">{{ $message }}</span> @enderror

            </div>

            <div>
                <label for="resubmit_date" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Resubmit Date</label>

                <input type="date" id="resubmit_date" name="resubmit_date" value="{{ old('resubmit_date') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                @error('resubmit_date') <span class="text-sm text-red-500 dark:text-red-500">{{ $message }}</span> @enderror

            </div>

            <div>
                <label for="issued_by" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Issued By</label>

                <input type="text" id="issued_by" name="issued_by" value="{{ old('issued_by') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                @error('issued_by') <span class="text-sm text-red-500 dark:text-red-500">{{ $message }}</span> @enderror

            </div>

            <div>
                <label for="approved_by" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Approved By</label>

                <input type="text" id="approved_by" name="approved_by" value="{{ old('approved_by') }}" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">


                @error('approved_by') <span class="text-sm text-red-500 dark:text-red-500">{{ $message }}</span> @enderror

            </div>

            {{-- asset_number --}}
            {{-- <div>
                <label for="asset_number" class="block text-sm font-bold text-gray-700 mb-1 dark:text-white">Asset Number</label>
                <input type="text" id="asset_number" name="asset_number" value="" readonly class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">
            </div> --}}


        </div>

        {{-- attribute form  --}}
        <div class="mt-8">
            <h2 class="text-lg font-medium text-gray-800 mb-2 dark:text-white">Add Attributes</h2>

            <div id="attribute_fields">
                @if( old('attribute_key') )
                @foreach( old('attribute_key') as $value=>$key)
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input type="text" name="attribute_key[]" value="{{$key}}" placeholder="Key" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                    <input type="text" name="attribute_value[]" value="{{ old('attribute_value')[$value] }}" placeholder="Value" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                </div>
                @endforeach
                @else
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <input type="text" name="attribute_key[]" placeholder="Key" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                    <input type="text" name="attribute_value[]" placeholder="Value" class="w-full px-3 py-2 border border-gray-300 rounded-sm focus:ring-1 focus:ring-blue-500 dark:text-white dark:bg-gray-600">

                </div>
                @endif
            </div>

            <button type="button" id="add_field_btn" class="mt-2 px-2 py-2 bg-gray-400 text-black rounded-sm text-sm font-medium uppercase font-sans dark:text-white dark:bg-red-500">


                Add fields
            </button>
        </div>


        <div class="mt-6 flex justify-center gap-2">
            <button type="submit" class="px-10 py-2 bg-gray-800 text-white rounded-sm text-sm font-medium uppercase dark:text-white dark:bg-blue-500">
                Save
            </button>
            <button class="px-10 py-2 bg-gray-500 text-white"><a href="{{ route('assets.list') }}">Back</a></button>
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


    /* document.addEventListener('DOMContentLoaded', function() {
         const locationSelect = document.getElementById('location');
         const assetNumberInput = document.getElementById('asset_number');
         const locationCodeInput = document.getElementById('location_code'); // ← get the hidden input

         if (!locationSelect || !assetNumberInput || !locationCodeInput) return;

         /* locationSelect.addEventListener('change', async function() {
              const selectedOption = this.options[this.selectedIndex];
              //const locationName = selectedOption.value;
              const locationCode = selectedOption.getAttribute('data-code') || 'XX';
              // ✅ Set the value of the hidden input
              locationCodeInput.value = locationCode;

              try {
                  // Fetch the latest asset number for this location
                  const response = await fetch(`/api/get-next-asset-number/${locationCode}`);
                  const data = await response.json();

                  // Update the asset number input with the new value
                  assetNumberInput.value = data.nextAssetNumber;
              } catch (error) {
                  console.error('Error fetching next asset number:', error);
                  // Fallback to simple pattern if API call fails
                  assetNumberInput.value = `AV-FA-${locationCode}-001`;
              }
          }); });*/

</script>

@endsection
