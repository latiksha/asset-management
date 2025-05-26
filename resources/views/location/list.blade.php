@extends('layouts.app')
@section('content')




<div class="max-w-7xl bg-white rounded-lg shadow-sm overflow-hidden dark:bg-gray-700 dark:text-white">


    <div class="p-6 ">

        <span class="text-2xl font-bold text-gray-800 dark:text-white ">Location list</span>
        <div class="float-right inline-block">
            <button type="button" id="create" class=" px-2 shadow-md  rounded-md bg-blue-400 hover:bg-blue-600 text-white border-2 border-blue-400"><a href="{{ route('location.create') }}"> <i class="ri-add-line"></i>Create </a></button>

            {{-- <button class="border-2 border-blue-400 px-5 rounded-md"><a href=""></a><i class="ri-expand-left-line" style="font-size: 18px;"></i></button> --}}
        </div>
        {{-- filter and clear form --}}

        <form method="GET" action="{{ route('location.list') }}" id="filter" class="grid grid-cols-3 gap-4 mt-2">

            <div class="flex flex-col">
                <label for="location" class="text-sm font-medium text-gray-900 dark:text-white mb-1">location</label>
                <select name="location" id="location" class="p-1 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">select</option>
                    @foreach ($locate as $lo)
                    <option value="{{ $lo }}" {{ request('location') == $lo ? 'selected' : '' }}>
                        {{ $lo }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="flex flex-col">
                <label for="contact_person" class="text-sm font-medium text-gray-900 dark:text-white mb-1">POC</label>
                <select name="contact_person" id="contact_person" class="p-1 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">select</option>
                    @foreach ($poc as $p)
                    <option value="{{ $p }}" {{ request('contact_person') == $p ? 'selected' : '' }}>
                        {{ $p }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="flex flex-col">
                <label for="address" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Address</label>
                <input type="text" name="address" id="address" value="{{ request('address') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="search address..." />
            </div>

            <div class="flex flex-col">
                <label for="contact_person_mobile" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Contact number</label>

                <input type="text" name="contact_person_mobile" id="contact_person_mobile" value="{{ request('contact_person_mobile') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="search number..." />

            </div>


            {{-- <div class="flex flex-col">
                <label for="date_range" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Select Date</label>
                <input type="text" name="date_range" id="date_range" value="{{ request('date_range') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="select date..." />



    </div> --}}


    {{-- <div class="flex flex-col">
                <label for="issued_by" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Issued By</label>
                <input type="text" name="issued_by" id="issued_by" value="{{ request('issued_by') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="issued by..." />
</div>


<div class="flex flex-col">
    <label for="approved_by" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Approved By</label>
    <input type="text" name="approved_by" id="approved_by" value="{{ request('approved_by') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="approved by..." />
</div> --}}
<div class="float-right mt-5 ml-2 gap-2">

    <button type="submit" class="border-2 bg-green-500 px-4 py-0.5 text-white rounded-md">filter</button>

    <button type="button" onclick="window.location.href='{{ route('location.list') }}'" class="border-2 bg-blue-500 px-4 py-0.5 text-white rounded-md">

        Clear
    </button>



    {{-- <button type="submit" id="button" class="border-2 bg-blue-500 px-4 py-0.5 text-white rounded-md"><a href="{{ route('assets.list') }}">clear</a></button> --}}

</div>

</form>





<div class=" overflow-x-auto mt-5">


    <table class="w-full">


        <thead>
            <tr class="bg-gray-100 shadow-md">


                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Location</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Point Of Contact (POC)</th>

                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">POC number</th>

                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Address</th>

                <th class="py-1 px-4 text-left text-sm font-semibold text-gray-600">Latitude</th>

                <th class="py-1 px-4 text-left text-sm font-semibold text-gray-600">Longitude</th>

                <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Action</th>



            </tr>
        </thead>
        <tbody>
            @if(isset($location) && count($location) > 0)
            @foreach($location as $loc)
            <tr class="border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $loc->location }}</td>

                <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $loc->contact_person}}</td>

                <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $loc->contact_person_mobile }}</td>

                <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $loc->address }}</td>

                <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $loc->lat }}</td>

                <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $loc->long }}</td>

                <td class="py-2 px-4 flex flex-cols-2">
                    <div class="flex flex-cols-2 mt-1">

                        <a href="{{ route('location.edit', $loc->id) }}">
                            <i class="ri-edit-line mr-5"></i>
                        </a>


                        <form action="{{ route('location.delete', $loc->id) }}" method="POST" onsubmit="return confirm(' Are you sure you want to delete?')">

                            @csrf
                            @method('DELETE')
                            <button type="submit">
                                <i class="ri-delete-bin-line"></i>
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
        {{ $location->appends(['items' => request('items')])->links() }}
        <form>
            <select id="pagination" class="border-2 w-14 dark:bg-gray-600 dark:text-white">

                <option value="5" @if($items==5) selected @endif>5</option>
                <option value="10" @if($items==10) selected @endif>10</option>
                <option value="25" @if($items==25) selected @endif>25</option>
            </select>
        </form>

    </div>


</div>
</div>
</div>
<script>
    document.getElementById('pagination').onchange = function() {
        window.location = "{{ request()->url() }}?items=" + this.value;
    };

    /*document.getElementById('create').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = "{{ route('location.create') }}"

    });*/

</script>
@endsection
