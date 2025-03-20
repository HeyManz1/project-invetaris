<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()){
            return redirect('/login')->with('error-unauthorized', 'Silahkan Login terlebih dahulu');
        }

        $productCount = Product::count();
        $categoryCount = Category::count();

        return view('page.dashboard.admin', compact('productCount', 'categoryCount'));
    }
}

