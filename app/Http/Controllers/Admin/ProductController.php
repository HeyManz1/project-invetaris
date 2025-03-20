<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(Request $request) {
        $query = Product::with('category');
    
        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%$search%")
                  ->orWhere('sku', 'like', "%$search%");
        }
    
        $products = $query->latest()->paginate(10);
    
        return view('page.products.index', [
            "products" => $products
        ]);
    }
    

    public function create(){
        $categories = Category::all();

        return view('page.products.create', [
            "categories" => $categories,
        ]);
    }

    public function store(Request $request)
    {

        $validated= $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stock" => "required",
            "sku" => "required",
            "category_id" => "required",
        ]);

        Product::create($validated);

        return redirect('/products')->with('success', 'Berhasil Menambahkan Produk');
    }

    public function edit($id){
        $categories = Category::all();
        $product = Product::find($id);

        return view('page.products.edit', [
            "categories" => $categories,
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id)
    {

        $validated= $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stock" => "required",
            "sku" => "required",
            "category_id" => "required",
        ]);

        Product::where('id', $id)->update($validated);

        return redirect('/products')->with('success', 'Berhasil Memperbaharui Produk');
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id); 
        $product->delete();

        return redirect('/products')->with('success', 'Berhasil Menghapus Produk');
    }

}

