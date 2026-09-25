<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Rental;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCategories = Category::count();
        $totalItems = Item::count();
        $totalRentals = Rental::count();

        return view('dashboard', compact(
            'totalCategories',
            'totalItems',
            'totalRentals'
        ));
    }
}