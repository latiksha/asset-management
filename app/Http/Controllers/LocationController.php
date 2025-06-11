<?php
namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $items = $request->input('items', 5);

        $query = Location::query(); // Start query builder

        $locate  = Location::select('location')->distinct()->pluck('location');
        $poc     = Location::select('contact_person')->distinct()->pluck('contact_person');
        $address = Location::select('address')->distinct()->pluck('address');
        $mobile  = Location::select('contact_person_mobile')->distinct()->pluck('contact_person_mobile');

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }
        if ($request->filled('contact_person')) {
            $query->where('contact_person', $request->contact_person);
        }
        if ($request->filled('address')) {
            $query->where('address', 'like', '%' . $request->address . '%');
        }
        if ($request->filled('contact_person_mobile')) {
            $query->where('contact_person_mobile', 'like', '%' . $request->contact_person_mobile . '%');
        }

        $location = $query->paginate($items)->withQueryString(); // Apply pagination after filtering

        return view('location.list', compact('location', 'locate', 'items', 'poc', 'address'));
    }

    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $details = $request->validate([
            'location'              => 'required|string|max:100|unique:location,location',
            'location_code'         => 'required|string|max:10',
            'address'               => 'required|string',
            'contact_person'        => 'required|string|max:50',
            'contact_person_mobile' => 'required|digits:10',
            'lat'                   => 'required',
            'long'                  => 'required',
        ]);
        // Auto-map location to code
        $locationMap = [
            'ahmedabad' => 'GJ',
            'ahmd'      => 'GJ',
            'mumbai'    => 'MH',
            'delhi'     => 'DL',
            'baroda'    => 'GJ',
            'ludhiana'  => 'PB',
            'kerala'    => 'KL',
            // Add more as needed
        ];

        $inputLocation            = strtolower(trim($request->location));
        $locationCode             = $locationMap[$inputLocation] ?? 'XX';
        $details['location_code'] = $locationCode;

        // fetch last number of location(new-added)
        $last = Location::where('location_code', $locationCode)
            ->where('asset_number', 'LIKE', "AV-FA-$locationCode-%")
            ->orderByDesc('id')
            ->first();

        if ($last && preg_match('/AV-FA-' . $locationCode . '-(\d+)/', $last->asset_number, $matches)) {
            $serial = (int) $matches[1] + 1;
        } else {
            $serial = 1;
        }
// formatted serial like
        $serialFormatted         = str_pad($serial, 3, '0', STR_PAD_LEFT);
        $details['asset_number'] = "AV-FA-$locationCode-$serialFormatted";

        $location = Location::create($details);
        if ($location) {
            return redirect(route('location.list'))->with('success', 'location added successfully!!!');
        } else {
            return back()->withErrors(['error' => 'failed. Please try again.']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $location = Location::findOrFail($id);
        return view('location.edit', compact('location'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $location  = Location::findOrFail($id);
        $validated = $request->validate([
            'location'              => 'required|string|max:100',
            'address'               => 'required|string',
            'contact_person'        => 'required|string|max:50',
            'contact_person_mobile' => 'required|digits:10',
            'lat'                   => 'required',
            'long'                  => 'required',
        ]);
        if ($location->update($validated)) {
            return redirect(route('location.list'))->with('success', 'Details updated successfully!!!');
        }

        return back()->withErrors(['error' => 'Failed to update details. Please try again.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);

        if ($location->delete()) {
            return redirect(route('location.list'))->with('success', 'Location deleted successfully!!!');
        }

        return back()->withErrors(['error' => 'Failed to delete location. Please try again.']);
    }

}
