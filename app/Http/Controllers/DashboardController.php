<?php
namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Issue;
use App\Models\Location;

class DashboardController extends Controller
{
    public function index()
    {
        $locationCount = Location::distinct('location')->count();
        $assetCount    = Asset::distinct('type')->count();
        $issueCount    = Issue::where('status', 'open')
            ->orWhere('status', 'out for service')
            ->count();
        // You can pass data here later if needed
        return view('dashboard', [
            'locationCount' => $locationCount,
            'assetCount'    => $assetCount,
            'issueCount'    => $issueCount]);
    }
}
