<?php
namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        // You can pass data here later if needed
        return view('dashboard');
    }
}
