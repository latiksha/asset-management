<?php
namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data  = User::all();
        $items = $request->input("items", 5);
        $query = User::query();
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }
        $data = $query->paginate($items)->withQueryString();

        return view("user.list", compact("data", "items"));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name"     => "required|string|max:20",
            "email"    => "required|email|unique:users,email",
            'phone'    => 'required|digits:10',
            'password' => 'required|string|min:8',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if (User::create($validated)) {
            return redirect(route('user.list'))->with('success', 'User added successfully!');
        }

        return back()->withErrors(['error' => 'Failed to add user. Please try again.']);
    }

    // public function edit($id)
    // {
    //     $user = User::find($id);
    //     return view("user.edit", compact("user"));
    // }

    // public function update(Request $request, $id)
    // {
    //     $user      = User::find($id);
    //     $validated = $request->validate([
    //         "name"     => "required|string|max:20",
    //         "email"    => "required|string",
    //         'phone'    => 'required|digits:10',
    //         'password' => 'required|string|min:8',

    //     ]);
    //     if ($user->update($validated)) {
    //         return redirect(route('user.list'))->with('success', 'user added successfully!!!');
    //     }

    //     return back()->withErrors(['error' => 'Failed to add user. Please try again.']);

    // }
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);

        if ($data->delete()) {
            return redirect(route('user.list'))->with('success', 'user List deleted successfully!!!');
        }

        return back()->withErrors(['error' => 'Failed to delete location. Please try again.']);

    }
}
