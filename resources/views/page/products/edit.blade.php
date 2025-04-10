@extends('layouts.main')



@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Edit Poroduk</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/products">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
        </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Produk</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="description"class="form-label">Deskripsi</label>
                                <textarea  name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sku"class="form-label">Kode Produk</label>
                                <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror"value="{{ old('sku', $product->sku ) }}"></input>
                                @error('sku')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price"class="form-label">Harga</label>
                                <input type="" inputmode="numeric" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}"></input>
                                @error('price')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stock"class="form-label">Stok</label>
                                <input type="number" inputmode="numeric" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}" ></input>
                                @error('stock')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id"class="form-label">Tipe</label>
                                <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}" >
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id === $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="photo" class="form-label">Foto Produk</label>
                                @if ($product->photo)
                                    <img src="{{ asset('storage/' . $product->photo) }}" width="100" class="mb-2">
                                @endif
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                                @error('photo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a href="/products" class="btn btn-sm btn-outline-danger mr-2">Batal</a>
                                <button type="submit"  class="btn btn-sm btn-outline-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div> 
            </form>
    </div>
@endsection