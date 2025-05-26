@extends('layouts.app')
@section('content')




<div class="max-w-7xl mx-auto bg-white rounded-lg shadow-sm overflow-hidden dark:bg-gray-700">

    <div class="p-6 dark:bg-gray-700">

        <span class="text-2xl font-bold text-gray-800 dark:text-white ">Issue List</span>


        <div class="float-right inline-block">
            <button type="button" id="create" class=" px-2 shadow-md  rounded-md bg-blue-400 hover:bg-blue-600 text-white border-2 border-blue-400"><a href="{{ route('issues.create') }}"> <i class="ri-add-line"></i>Create </a></button>
            {{-- <button class="border-2 border-blue-400 px-5 rounded-md"><a href=""></a><i class="ri-expand-left-line" style="font-size: 18px;"></i></button> --}}

        </div>

        {{-- filter and clear form --}}

        <form method="GET" action="{{ route('issues.list') }}" id="filter" class="grid grid-cols-3 gap-4 mt-3">

            <div class="flex flex-col">
                <label for="select_asset" class="text-sm font-medium text-gray-900 dark:text-white mb-1">select asset</label>
                <select name="select_asset" id="select_asset" class="p-1 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">select assets</option>
                    @foreach ($select as $s)
                    <option value="{{ $s}}" {{ request('select_asset') == $s ? 'selected' : '' }}>
                        {{ $s }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="flex flex-col">
                <label for="department" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Department</label>
                <select name="department" id="department" class="p-1 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">All Names</option>
                    @foreach ($depart as $d)
                    <option value="{{ $d }}" {{ request('department') == $d ? 'selected' : '' }}>
                        {{ $d }}
                    </option>
                    @endforeach
                </select>
            </div>


            <div class="flex flex-col">
                <label for="type" class="text-sm font-medium text-gray-900 dark:text-white mb-1">issue type</label>
                <select name="type" id="type" class="p-1 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">select</option>
                    @foreach ($issues as $is)
                    <option value="{{ $is }}" {{ request('type') == $is ? 'selected' : '' }}>
                        {{ $is }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col">
                <label for="description" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Description</label>
                <input type="text" name="description" id="description" value="{{ request('description') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="description..." />

            </div>
            <div class="flex flex-col">
                <label for="status" class="text-sm font-medium text-gray-900 dark:text-white mb-1">status</label>
                <select name="status" id="status" class="p-1 text-sm border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    <option value="">select</option>
                    @foreach ($status as $stat)
                    <option value="{{ $stat }}" {{ request('status') == $stat ? 'selected' : '' }}>

                        {{ $stat }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col">
                <label for="date" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Select Date</label>
                <input type="date" name="date" id="date" value="{{ request('date') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" placeholder="select date..." />

            </div>


            {{-- <div class="flex flex-col">
                <label for="issued_by" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Issued By</label>
                <input type="text" name="issued_by" id="issued_by" value="{{ request('issued_by') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="issued by..." />
    </div>


    {{-- <div class="flex flex-col">
        <label for="approved_by" class="text-sm font-medium text-gray-900 dark:text-white mb-1">Approved By</label>
        <input type="text" name="approved_by" id="approved_by" value="{{ request('approved_by') }}" class="p-1 ps-2 text-sm text-gray-500 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="approved by..." />
</div> --}}
<div class="float-right mt-2 ml-2 gap-2">

    <button type="submit" class="border-2 bg-green-500 px-4 py-0.5 text-white rounded-md">filter</button>

    <button type="button" onclick="window.location.href='{{ route('issues.list') }}'" class="border-2 bg-blue-500 px-4 py-0.5 text-white rounded-md">

        Clear
    </button>



    {{-- <button type="submit" id="button" class="border-2 bg-blue-500 px-4 py-0.5 text-white rounded-md"><a href="{{ route('assets.list') }}">clear</a></button> --}}

</div>

</form>





<div class="overflow-x-auto mt-5">
    <table class="w-full">
        <thead>
            <tr class="bg-gray-100 shadow-md">

                <th class=" py-3 px-6 text-left text-sm font-semibold text-gray-600">Selected asset</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Department</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Issue type</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Description</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Date</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Status</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Images</th>
                <th class="py-3 px-6 text-left text-sm font-semibold text-gray-600">Action</th>


            </tr>
        </thead>
        <tbody>
            @if(isset($issue) && count($issue) > 0)
            @foreach($issue as $list)
            <tr class="border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="dark:text-white py-4 px-6 text-sm text-gray-600">{{ $list->select_asset}}</td>
                <td class="dark:text-white py-4 px-6 text-sm text-gray-600">{{ $list->department }}</td>
                <td class="dark:text-white py-4 px-6 text-sm text-gray-600">{{ $list->type }}</td>

                <td class="dark:text-white py-4 px-6 text-sm text-gray-600">{{ $list->description}}</td>

                <td class="dark:text-white py-4 px-6 text-sm text-gray-600">{{ $list->date}}</td>

                <td class="dark:text-white py-4 px-6 text-sm text-gray-600">{{ $list->status }}</td>

                <td class="dark:text-white py-4 px-6 text-sm text-gray-600">


                    <div class="flex flex-col gap-2">

                        @foreach ($list->images ?? [] as $img)
                        <img src="{{ asset( $img->image) }}" width="128" height="128" onclick="zoomImage(this)" class="w-32 h-auto rounded shadow cursor-pointer" />

                        @endforeach
                    </div>
                </td>



                <td class="py-2 px-4 flex flex-cols-2">
                    <div class="flex flex-cols-2 mt-1">
                        <a href="{{ route('issues.edit', $list->id)  }} ">
                            <i class="ri-edit-line mr-5"></i>

                        </a>
                        <form action="{{ route('issues.delete', $list->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                            @csrf
                            @method('DELETE')
                            <button type=submit> <i class="ri-delete-bin-line"></i>
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
    {{-- zoom image div --}}

    <div id="image-close" onclick="closeZoom()" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background-color:rgba(0,0,0,0.7); z-index:50; justify-content:center; align-items:center;" class=" fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center">

        <img id="zoomed-img" src="" style="max-width:90%; max-height:90%; transition:transform 0.3s;" class="rounded shadow-lg" />
    </div>


    <div class="mt-4">

        {{ $issue->appends(['items' => request('items')])->links() }}


        <form>
            <div>
                <select id="pagination" class="border-2 w-14 dark:bg-gray-600 dark:text-white">

                    <option value="5" @if($items==5) selected @endif>5</option>
                    <option value="10" @if($items==10) selected @endif>10</option>
                    <option value="25" @if($items==25) selected @endif>25</option>
                </select>
            </div>

        </form>


    </div>

</div>
</div>
</div>


<script>
    function zoomImage(imgElement) {
        const imageclose = document.getElementById('image-close');
        const zoomedImg = document.getElementById('zoomed-img');
        zoomedImg.src = imgElement.src;
        imageclose.style.display = 'flex';
    }

    function closeZoom() {
        const imageclose = document.getElementById('image-close');
        imageclose.style.display = 'none';
    }

    document.getElementById('pagination').onchange = function() {
        window.location = "{{ request()->url() }}?items=" + this.value;
    };


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
