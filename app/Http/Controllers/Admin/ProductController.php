<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    $request->validate([
        'name' => 'required|string|max:255',
        'sku' => 'required|string|max:100|unique:products,sku',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category_id' => 'nullable|exists:categories,id',
        'description' => 'nullable|string', // Validasi deskripsi
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto
    ]);

    $photo = null;
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo')->store('products', 'public'); // Simpan di storage
    }

    Product::create([
        'name' => $request->name,
        'sku' => $request->sku,
        'price' => $request->price,
        'stock' => $request->stock,
        'category_id' => $request->category_id,
        'description' => $request->description, // Simpan deskripsi
        'photo' => $photo,
    ]);

    return redirect('/products')->with('success', 'Produk berhasil ditambahkan');
}


    public function edit($id){
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('page.products.edit', [
            "categories" => $categories,
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'sku' => "required|string|max:100|unique:products,sku,$id",
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category_id' => 'nullable|exists:categories,id',
        'description' => 'nullable|string', // Validasi deskripsi
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $photo = $product->photo;
    if ($request->hasFile('photo')) {
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo); // Hapus foto lama jika ada
        }
        $photo = $request->file('photo')->store('products', 'public');
    }

    $product->update([
        'name' => $request->name,
        'sku' => $request->sku,
        'price' => $request->price,
        'stock' => $request->stock,
        'category_id' => $request->category_id,
        'description' => $request->description, // Update deskripsi
        'photo' => $photo,
    ]);

    return redirect('/products')->with('success', 'Produk berhasil diperbarui');
}



    public function delete($id)
    {
        $product = Product::findOrFail($id);
    
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo); // Hapus foto jika ada
        }
    
        $product->delete();
    
        return redirect('/products')->with('success', 'Produk berhasil dihapus');
    }

}

