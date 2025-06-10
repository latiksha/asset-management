<?php
namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetAttribute;
use App\Models\Location;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetController extends Controller
{
    public function index(Request $request)
    {

        $items = $request->input('items', 5);

        $query    = Asset::query();
        $location = Asset::select('location')->distinct()->pluck('location');
        $types    = Asset::select('type')->distinct()->pluck('type');
        $names    = Asset::select('assigned_to')->distinct()->pluck('assigned_to');

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('assigned_to')) {
            $query->where('assigned_to', 'like', '%' . $request->assigned_to . '%');
        }
        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        // if ($request->filled('date_range')) {
        //     [$from, $to] = explode(' - ', $request->date_range);

        //     $query->where(function ($query) use ($from, $to) {
        //         $query->whereBetween('issue_date', [$from, $to])
        //             ->orWhereBetween('resubmit_date', [$from, $to]);
        //     });
        // }
        if ($request->filled('date_range') && strpos($request->date_range, ' - ') !== false) {
            [$from, $to] = explode(' - ', $request->date_range);

            if (! empty($from) && ! empty($to)) {
                $from = trim($from) . ' 00:00:00';
                $to   = trim($to) . ' 23:59:59';

                $query->where(function ($q) use ($from, $to) {
                    $q->whereBetween('issue_date', [$from, $to])
                        ->orWhereBetween('resubmit_date', [$from, $to]);
                });
            }
        }

        if ($request->filled('issued_by')) {
            $query->where('issued_by', 'like', '%' . $request->issued_by . '%');
        }
        if ($request->filled('approved_by')) {
            $query->where('approved_by', 'like', '%' . $request->approved_by . '%');
        }
        $assets = $query->paginate(10)->withQueryString();
        return view('assets.list', compact('assets', 'items', 'location', 'types', 'names'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function show()
    {$location = Location::all();
        $defaultLocation                     = $location->first();
        $locationCode                        = $defaultLocation ? strtoupper($defaultLocation->location_code) : 'XX';

        // $count              = Asset::count() + 1;
        // $serial             = str_pad($count, 3, '0', STR_PAD_LEFT);
        // $previewAssetNumber = "AV-FA-XX-{$serial}";

        $lastAsset = Asset::where('asset_number', 'LIKE', "AV-FA-{$locationCode}-%")
            ->orderByDesc('id')
            ->first();

        if ($lastAsset && preg_match("/AV-FA-{$locationCode}-(\d+)/", $lastAsset->asset_number, $matches)) {
            $serial = (int) $matches[1] + 1;
        } else {
            $serial = 1;
        }

        $serialFormatted    = str_pad($serial, 3, '0', STR_PAD_LEFT);
        $previewAssetNumber = "AV-FA-{$locationCode}-{$serialFormatted}";

        return view('assets.create', compact('location', 'previewAssetNumber'));}

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
            'type'            => 'required|string|max:50|unique:assets,type',
            'assigned_to'     => 'required|string|max:100',
            'location'        => 'required|string|max:50',
            'issue_date'      => 'required|date',
            'resubmit_date'   => 'date|nullable',
            'issued_by'       => 'required|string|max:100',
            'approved_by'     => 'required|string|max:100',
            'attribute_key'   => 'nullable|array',
            'attribute_value' => 'nullable|array',
        ]);

        DB::transaction(function () use ($record, $request) {
// Fetch location code based on selected location name
            $location     = Location::where('location', $record['location'])->first();
            $locationCode = $location ? strtoupper($location->location_code) : 'XX';

// Generate asset number
//             $count       = Asset::count() + 1;
//             $serial      = str_pad($count, 3, '0', STR_PAD_LEFT);
//             $assetNumber = "AV-FA-{$locationCode}-{$serial}";

            //new asset added
            $lastAsset = Asset::where('asset_number', 'LIKE', "AV-FA-{$locationCode}-%")
                ->orderByDesc('id')
                ->first();

            if ($lastAsset && preg_match("/AV-FA-{$locationCode}-(\d+)/", $lastAsset->asset_number, $matches)) {
                $serial = (int) $matches[1] + 1;
            } else {
                $serial = 1;
            }

            $serialFormatted        = str_pad($serial, 3, '0', STR_PAD_LEFT);
            $assetNumber            = "AV-FA-{$locationCode}-{$serialFormatted}";
            $record['asset_number'] = $assetNumber;

            // Storing  Asset
            $asset = Asset::create($record);

            // Storing attributes
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
        $asset    = Asset::with('attributes')->findOrFail($id);
        $asset    = Asset::findOrFail($id);
        $location = Location::all();

        return view('assets.edit', compact('asset', 'location'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $asset = Asset::findOrFail($id);
        //retrieve old values
        $oldAssignedTo = $asset->assigned_to;
        $oldIssueDate  = $asset->issue_date;

        $validated = $request->validate([
            'type'          => 'required|string|max:50',
            'assigned_to'   => 'required|string|max:100',
            'location'      => 'required|string|max:50',
            'issue_date'    => 'required|date|after_or_equal:' . $oldIssueDate,
            'resubmit_date' => 'nullable|date',
            'issued_by'     => 'required|string|max:100',
            'approved_by'   => 'required|string|max:100',
        ]);

        // comparing values and updating log table
        if ($oldAssignedTo !== $validated['assigned_to'] || $oldIssueDate !== $validated['issue_date']) {
            Log::create([
                'asset_id'        => $asset->id,
                'old_user'        => $oldAssignedTo,
                'new_user'        => $validated['assigned_to'],
                'old_assign_date' => $oldIssueDate,
                'new_assign_date' => $validated['issue_date'],
            ]);
        }

        $asset->update($validated);
        if ($request->has('attribute_key') && $request->has('attribute_value')) {
            $asset->attributes()->delete();
            foreach ($request->attribute_key as $index => $key) {
                $asset->attributes()->create([
                    'attribute_key'   => $key,
                    'attribute_value' => $request->attribute_value[$index],
                ]);
            }
        }

        return redirect(route('assets.list'))->with('success', 'Details updated successfully!');
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

    // public function search(Request $request)
    // {
    //     $user = $request->input('user');

    //     $asset = Asset::when($user, function ($query, $user) {
    //         return $query->where('assigned_to', 'like', '%' . $user . '%');
    //     })->get();

    //     return view('assets.list', compact('asset'));

    // }

    // public function search(Request $request)
    // {
    //     $query = Asset::query();

    //     if ($request->has('search')) {
    //         $query->where('assigned_to', 'like', '%' . $request->search . '%');
    //     }

    //     return view('assets.list', [
    //         'assets' => $query->paginate(10)->withQueryString(),
    //     ]);
    // }

    // public function search(Request $request)
    // {
    //     $query = Asset::query();
    //     $items = $request->input('items', 5);

    //     if ($request->filled('search')) {
    //         $query->where('assigned_to', 'like', '%' . $request->search . '%');
    //     }

    //     return view('assets.list', [
    //         'assets' => $query->paginate(10)->withQueryString(),
    //         'items'  => $items,
    //     ]);
    // }

}
