<?php
namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    public function index()
    {

        $asset = Asset::paginate(5);
        return view('assets.list', compact('asset'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show()
    {
        return view('assets.create');

    }

    public function createAttribute($asset_id)
    {
        return view('assets.attribute', compact('asset_id'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $record = $request->validate([
            'type'            => 'required|string|max:50',
            'assigned_to'     => 'required|string|max:100',
            'location'        => 'required|string|max:50',
            'issue_date'      => 'required|date',
            'resubmit_date'   => 'required|date',
            'issued_by'       => 'required|string|max:100',
            'approved_by'     => 'required|string|max:100',
            'attribute_key'   => 'nullable|array',
            'attribute_value' => 'nullable|array',
        ]);

        DB::transaction(function () use ($record, $request) {
            // Store Asset
            $asset = Asset::create($record);

            // Store Attributes if provided
            if (! empty($request->attribute_key) && ! empty($request->attribute_value)) {
                foreach ($request->attribute_key as $index => $key) {
                    AssetAttribute::create([
                        'asset_id'        => $asset->id,
                        'attribute_key'   => $key,
                        'attribute_value' => $request->attribute_value[$index],
                    ]);
                }
            }
        });

        return redirect()->route('assets.list')->with('success', 'Asset and attributes added successfully!!!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $asset = Asset::findOrFail($id);
        return view('assets.edit', compact('asset'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $asset     = Asset::findOrFail($id);
        $validated = $request->validate([
            'type'          => 'required|string|max:50',
            'assigned_to'   => 'required|string|max:100',
            'location'      => 'required|string|max:50',
            'issue_date'    => 'required|date',
            'resubmit_date' => 'required|date',
            'issued_by'     => 'required|string|max:100',
            'approved_by'   => 'required|string|max:100',
        ]);
        if ($asset->update($validated)) {
            return redirect(route('assets.list'))->with('success', 'Details updated successfully!!!');
        }

        return back()->withErrors(['error' => 'Failed to update details. Please try again']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asset = Asset::findOrFail($id);
        if ($asset->delete()) {
            return redirect(route('assets.list'))->with('success', 'Asset deleted successfully!!!');
        }

        return back()->withErrors(['error' => 'Failed to delete Asset. Please try again.']);
    }

}
