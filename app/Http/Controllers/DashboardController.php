<?php

namespace App\Http\Controllers;

use App\Models\Visa;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display dashboard.
     */
    public function index()
    {
        $totalVisas = Visa::count();
        $activeVisas = Visa::where('visa_status', 'Active')->count();
        $pendingVisas = Visa::where('visa_status', 'Pending')->count();
        $expiredVisas = Visa::where('visa_status', 'Expired')->count();
        $totalUsers = User::count();

        $recentVisas = Visa::latest()->limit(5)->get();
        $recentUsers = User::latest()->limit(5)->get();

        return view('dashboard', compact(
            'totalVisas',
            'activeVisas',
            'pendingVisas',
            'expiredVisas',
            'totalUsers',
            'recentVisas',
            'recentUsers'
        ));
    }
}
