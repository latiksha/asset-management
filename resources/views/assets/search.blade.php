@extends('layouts.app')
@section('content')

<form method="GET" action="{{ route('assets.search') }}">
    <input type="text" name="search" placeholder="Search by user name" value="{{ request('search') }}" class="border rounded p-2" />
    <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">Search</button>
</form>

<table class="w-full mt-4 border">
    <thead>
        <tr>
            <th class="p-2 border">Asset Type</th>
            <th class="p-2 border">Assigned To</th>
            <th class="p-2 border">Location</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($assets as $asset)
        <tr>
            <td class="p-2 border">{{ $asset->type }}</td>
            <td class="p-2 border">{{ $asset->assigned_to }}</td>
            <td class="p-2 border">{{ $asset->location }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center p-4">No assets found.</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $assets->links() }}
@endsection
