@extends('layouts.app')
@section( 'content')
<div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-2xl shadow p-4 text-center">
            <div class="text-gray-500">Number of Assets</div>
            <div class="text-2xl font-bold">66</div>
        </div>
        <div class="bg-white rounded-2xl shadow p-4 text-center">
            <div class="text-gray-500">Value of Assets</div>
            <div class="text-2xl font-bold">$108,658</div>
        </div>
        <div class="bg-white rounded-2xl shadow p-4 text-center">
            <div class="text-gray-500">Net Assets Value</div>
            <div class="text-2xl font-bold">$78,259</div>
        </div>
        <div class="bg-white rounded-2xl shadow p-4 text-center">
            <div class="text-gray-500">Purchases This Fiscal Year</div>
            <div class="text-2xl font-bold">$8,658</div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-2xl shadow p-4">
            <h2 class="text-lg font-semibold mb-2">Alerts</h2>
            <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
                <li>Warranty Expiring on A014</li>
                <li>Asset A023 is past due</li>
                <li>Maintenance due for A031</li>
            </ul>
        </div>

        <div class="bg-white rounded-2xl shadow p-4">
            <h2 class="text-lg font-semibold mb-2">Asset Summary</h2>
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs uppercase text-gray-400">
                    <tr>
                        <th class="px-4 py-2">Asset Tag</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-2">A014</td>
                        <td class="px-4 py-2">Table Computer</td>
                        <td class="px-4 py-2">No Due Date</td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">A015</td>
                        <td class="px-4 py-2">Laptop</td>
                        <td class="px-4 py-2">2025-04-20</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
