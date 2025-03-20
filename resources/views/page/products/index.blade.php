@extends('layouts.main')



@section('header')
@if (session('success') )
    <script>
        Swal.fire({
          title: "Success!",
          text: "{{ session('success') }}",
          icon: "success"
        });
    </script>
    @endif
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Product</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Product</li>
        </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">
                    <form action="{{ url('/products') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-secondary ml-2">Cari</button>
                    </form>
                    <a href="/products/create" class="btn btn-sm btn-primary ml-auto">Tambah Produk</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Kode Barang</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ ($products->currentPage()-1) * $products->perPage() + $loop->index + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description ?? '-' }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->category->name ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/products/edit/{{ $product->id }}" class="btn btn-sm btn-warning mr-2">
                                                Edit
                                            </a>
                                            {{-- <form action="{{ url('/products/' . $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    HAPUS
                                                </button>
                                            </form> --}}
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $product->id }}">
                                                Hapus
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @include('page.products.delete-confirn')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $products->Links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection