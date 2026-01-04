<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categories = Menu::select('kategori')
                     ->where('tersedia', true)
                     ->distinct()
                     ->pluck('kategori');
    
        $query = Menu::where('tersedia', true);
    
        // Filter by category if provided
        if ($request->has('category') && $request->category != '') {
            $query->where('kategori', $request->category);
        }
    
        $menus = $query->orderBy('kategori')
                       ->orderBy('nama_menu')
                       ->get();
    
        return view('menu.index', compact('menus', 'categories'));
    }
    
    // Method untuk detail produk
    public function show($id)
    {
        $menu = Menu::findOrFail($id);
        
        // Ambil menu terkait (dari kategori yang sama)
        $relatedMenus = Menu::where('kategori', $menu->kategori)
                           ->where('id', '!=', $menu->id)
                           ->where('tersedia', true)
                           ->limit(4)
                           ->get();
        
        return view('menu.show', compact('menu', 'relatedMenus'));
    }
}