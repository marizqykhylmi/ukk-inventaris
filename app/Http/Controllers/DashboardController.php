<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Category;
use App\Models\Lending;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // ======================
        // DATA GLOBAL DASHBOARD
        // ======================
        $totalItems = Item::count();
        $totalCategories = Category::count();

        $totalLending = Lending::whereNull('returned_at')->count();
        $totalReturned = Lending::whereNotNull('returned_at')->count();

        $totalLost = Lending::sum('lost_qty') ?? 0;
        $totalDamaged = Lending::sum('damaged_qty') ?? 0;

        $latestLending = Lending::with('item')
            ->latest()
            ->take(5)
            ->get();

        // ======================
        // ADMIN
        // ======================
        if ($user->role === 'admin') {
            return view('admin.dashboard', compact(
                'totalItems',
                'totalCategories',
                'totalLending',
                'totalReturned',
                'totalLost',
                'totalDamaged',
                'latestLending'
            ));
        }

        // ======================
        // OPERATOR DASHBOARD
        // ======================

        $activeLending = Lending::whereNull('returned_at')->count();
        $returnedLending = Lending::whereNotNull('returned_at')->count();

        return view('operator.dashboard', compact(
            'totalItems',
            'activeLending',
            'returnedLending',
            'latestLending'
        ));
    }
}