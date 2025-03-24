<?php
namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $location = Location::paginate(5);
        return view('location.list', compact('location'));
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
            'location'              => 'required|string|max:100',
            'address'               => 'required|string',
            'contact_person'        => 'required|string|max:50',
            'contact_person_mobile' => 'required|digits:10',
            'lat'                   => 'required',
            'long'                  => 'required',
        ]);

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
        //return view('edit', ['location'=>$location]);//just for now
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
