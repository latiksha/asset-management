<?php
namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    public function index()
    {
        $issue = Issue::paginate(5);

        return view("issues.list", compact("issue"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $issue = $request->validate([
            'issue'       => 'required|string|max:50',
            'description' => 'required|string|max:100',
            'type'        => 'required|string|max:50',
            'priority'    => 'required|string|max:20',
            'department'  => 'required|string|max:50',
            'status'      => 'required|string|max:20',
            'date'        => 'required|date',
        ]);

        $issue = Issue::create($issue);
        if ($issue) {
            return redirect(route('issues.list'))->with('success', 'issue added successfully!!!');
        }
        return back()->withErrors(['error' => 'failed. Please try again.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('issues.create');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $issue = Issue::findOrFail($id);
        return view('issues.edit', compact('issue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $issue     = Issue::findOrFail($id);
        $validated = $request->validate([
            'issue'       => 'required|string|max:50',
            'description' => 'required|string|max:100',
            'type'        => 'required|string|max:50',
            'priority'    => 'required|string|max:20',
            'department'  => 'required|string|max:50',
            'status'      => 'required|string|max:20',
            'date'        => 'required|date',
        ]);
        if ($issue->update($validated)) {
            return redirect()->route('issues.update')->with('success', 'Details updated successfully!!!');
        }

        return back()->withErrors(['error' => 'Failed to update details. Please try again.']);
    }

    public function destroy(string $id)
    {
        $issue = Issue::findOrFail($id);
        if ($issue->delete()) {
            return redirect(route('issues.list'))->with('success', ' List deleted successfully!!!');
        }

        return back()->withErrors(['error' => 'Failed to delete location. Please try again.']);

    }
}
