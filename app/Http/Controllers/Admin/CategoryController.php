<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $categories = Category::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->paginate(10);

        return view('page.categories.index', compact('categories'));
    }


    public function create()
    {
        return view('page.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData =$request->validate([
            "name" => "required|unique:categories,name", 
        ], [
            "name.required" => "Anda Perlu Mengisi Inputan Ini!!",
            "nama.unique" => "Nama Kategori Sudah Ada!!"
        ]);

        $category = new Category();
        $category-> name = $request->input('name');
        $category-> slug = Str::slug ($request->input('name'));
        $category-> save();

        return redirect('/categories')->with('success', 'Berhasil Menambahkan Kategori');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('page.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        "name" => "required|unique:categories,name," . $id, 
    ], [
        "name.required" => "Anda Perlu Mengisi Inputan Ini!!",
        "name.unique" => "Nama Kategori Sudah Ada!!"
    ]);

    $category = Category::findOrFail($id); 
    $category->name = $request->input('name');
    $category->slug = Str::slug($request->input('name'));
    $category->save();

    return redirect('/categories')->with('success', 'Berhasil Memperbaharui Kategori');
}


    public function delete($id)
    {
        Category::where('id', $id)->delete();

        return redirect('/categories')->with('success', 'Berhasil Menghapus Kategori');
    }
}
