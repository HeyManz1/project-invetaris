<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all(); // Ambil semua kategori
        $query = Product::query();
    
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }
    
        $products = $query->paginate(12);
    
        return view('landingpage.index', compact('categories', 'products'));
    }
    

    public function contact()
    {
        return view('landingpage.contact');
    }
}
