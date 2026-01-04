<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 4 menu terlaris (dummy, bisa diganti dengan logic sales sebenarnya)
        $bestSellers = Menu::where('tersedia', true)
                          ->whereIn('kategori', ['kopi', 'non-kopi'])
                          ->limit(4)
                          ->get();
        
        // Ambil semua kategori untuk navbar
        $categories = Menu::select('kategori')
                         ->where('tersedia', true)
                         ->distinct()
                         ->pluck('kategori');
        
        return view('home', compact('bestSellers', 'categories'));
    }
}