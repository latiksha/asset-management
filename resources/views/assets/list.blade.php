@extends('layouts.app')
@section( 'content')


<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-sm overflow-hidden dark:bg-gray-700">
    <div class="p-6">
        <span class="text-2xl font-bold text-gray-800 dark:text-white">Asset List</span>


        <div class="float-right inline-block">
            <button type="button" id="create" class=" px-2 shadow-md  rounded-md bg-blue-400 hover:bg-blue-600 text-white border-2 border-blue-400"><a href="{{ route('assets.create') }}"> <i class="ri-add-line"></i>Create </a></button>

            {{-- <button class="border-2 border-blue-400 px-5 rounded-md"><a href=""></a><i class="ri-expand-left-line" style="font-size: 18px;"></i></button> --}}


        </div>
        {{-- filter and clear form --}}

        <form method="GET" action="{{ route('assets.list') }}" id="filter" class="grid grid-cols-3 gap-4 mt-2">

            <div class="flex flex-col">
                <label for="type" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Type</label>
                <select name="type" id="type" class="p-1 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">All types</option>
                    @foreach ($types as $type)
                    <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                        {{ $type }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="flex flex-col">
                <label for="assigned_to" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Holder Name</label>
                <select name="assigned_to" id="assigned_to" class="p-1 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">All Names</option>
                    @foreach ($names as $name)
                    <option value="{{ $name }}" {{ request('assigned_to') == $name ? 'selected' : '' }}>

                        {{ $name }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="flex flex-col">
                <label for="location" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Location</label>
                <select name="location" id="location" class="p-1 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">All Locations</option>
                    @foreach ($location as $loc)
                    <option value="{{ $loc }}" {{ request('location') == $loc ? 'selected' : '' }}>
                        {{ $loc }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col">
                <label for="date_range" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Select Date</label>
                <input type="text" name="date_range" id="date_range" value="{{ request('date_range') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="select date..." />

            </div>



            <div class="float-right mt-5 ml-2 gap-2">

                <button type="submit" class="border-2 bg-green-500 px-4 py-0.5 text-white rounded-md">filter</button>

                <button type="button" onclick="window.location.href='{{ route('assets.list') }}'" class="border-2 bg-blue-500 px-4 py-0.5 text-white rounded-md">

                    Clear
                </button>





            </div>

        </form>


        <div class="overflow-x-auto mt-5">

            <table class="w-full">
                <thead>
                    <tr class="bg-gray-100 shadow-md">
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Type</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Holder name</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Location</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Issue date</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Resubmit date</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Issued by</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Approved by</th>
                        <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @if(isset($assets) && count($assets) > 0)
                    @foreach($assets as $set)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $set->type }}</td>
                        <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $set->assigned_to }}</td>

                        <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $set->location}}</td>

                        <td class="py-4 px-6 text-sm text-gray-600 dark:text-white" style="width: 8rem;">{{ $set->issue_date }}</td>

                        <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $set->resubmit_date }}</td>

                        <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $set->issued_by }}</td>

                        <td class="py-4 px-6 text-sm text-gray-600 dark:text-white">{{ $set->approved_by }}</td>

                        <td class="py-2 px-4 flex flex-cols-2">
                            <div class="flex flex-cols-2 mt-1">

                                <a href="{{ route('assets.edit', $set->id) }}">
                                    <i class="ri-edit-line mr-5"></i>
                                </a>

                                <form action="{{ route('assets.delete', $set->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">

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
                {{ $assets->appends(['items' => request('items')])->links() }}


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

</script>


<script>
    $(function() {
        $('#date_range').daterangepicker({
            autoUpdateInput: false
            , locale: {
                format: 'YYYY-MM-DD'
                , cancelLabel: 'Clear'
            }
        });
        $('#date_range').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });
        $('#date_range').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    function clearAllFilters() {
        document.getElementById('filter').reset();
        $('#date_range').val(''); // explicitly clear daterange input
        document.getElementById('filter').submit();
    }

</script>




@endsection
