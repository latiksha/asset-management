<?php
namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Issue;
use App\Models\IssueImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

class IssueController extends Controller
{
    public function index(Request $request)
    {
        \Log::info('Filters', $request->all());

        // $images = IssueImage::all();
        $items       = $request->input('items', 5);
        $query       = Issue::query();
        $select      = Issue::select('select_asset')->distinct()->pluck('select_asset');
        $depart      = Issue::select('department')->distinct()->pluck('department');
        $issues      = Issue::select('type')->distinct()->pluck('type');
        $description = Issue::select('description')->distinct()->pluck('description');
        $status      = Issue::select('status')->distinct()->pluck('status');
        $dates       = Issue::select('date')->distinct()->pluck('date');

        if ($request->filled('select_asset')) {
            $query->where('select_asset', $request->select_asset);
        }
        if ($request->filled('department')) {
            $query->where('department', $request->department);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('description')) {
            $query->where('description', 'like', '%' . $request->description . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // if ($request->filled('search')) {
        //     $query->where('select_asset', 'like', '%' . $request->search . '%')
        //         ->orWhere('description', 'like', '%' . $request->search . '%');
        // }

        if ($request->filled('date')) {
            $query->where('date', $request->date);
        }

        $issue = $query->paginate($items)->withQueryString();
        return view("issues.list", compact("issue", "items", "select", "depart", "issues", "status"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'select_asset' => 'required|string|max:200',
            'description'  => 'required|string|max:100',
            'type'         => 'required|string|max:50',
            'image'        => 'required|array',
            'image.*'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'department'   => 'required|string|max:50',
            'status'       => 'required|string|max:20',
            'date'         => 'required|date',
        ]);

        $issue = Issue::create($validated);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $imgFile) {
                $fileName = hexdec(uniqid()) . '.' . $imgFile->extension();
                $path     = public_path('images/' . $fileName);

                $manager        = new ImageManager(new Driver());
                $processedImage = $manager->read($imgFile)->resize(500, 300);
                $processedImage->toJpeg(80)->save($path);

                IssueImage::create([
                    'issue_id' => $issue->id,
                    'image'    => 'images/' . $fileName,
                ]);
            }
        }
        if ($issue) {
            return redirect(route('issues.list'))->with('success', 'issue added successfully!!!');
        }
        return back()->withErrors(['error' => 'failed. Please try again.']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $asset = Asset::all();
        return view('issues.create', compact('asset'));

    }

    public function edit(string $id)
    {
        $asset  = Asset::all();
        $issue  = Issue::findOrFail($id);
        $images = $issue->images;

        return view('issues.edit', compact('issue', 'asset', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $issue     = Issue::findOrFail($id);
        $validated = $request->validate([
            'select_asset' => 'required|string|max:200',
            'description'  => 'required|string|max:100',
            'type'         => 'required|string|max:50',
            'department'   => 'required|string|max:50',
            'status'       => 'required|string|max:20',
            'date'         => 'required|date',
            'image'        => 'nullable|array',
            'image.*'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('issue_images'), $imageName);

                IssueImage::create([
                    'issue_id' => $issue->id,
                    'image'    => 'issue_images/' . $imageName,
                ]);
            }
        }

        if ($issue->update($validated)) {
            return redirect()->route('issues.list')->with('success', 'Details updated successfully!!!');
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

    public function deleteImage($id)
    {
        try {
            $image = IssueImage::findOrFail($id);

            if (File::exists(public_path($image->image))) {
                File::delete(public_path($image->image));
            }

            $image->delete();
            return response()->json(['success' => 'Image deleted successfully.']);
        } catch (\Exception $e) {
            \Log::error('Image deletion error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
