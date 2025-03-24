<?php
namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view("user.list", compact("data"));
    }

    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        if ($data->delete()) {
            return redirect(route('user.list'))->with('success', 'user List deleted successfully!!!');
        }

        return back()->withErrors(['error' => 'Failed to delete location. Please try again.']);

    }
}
