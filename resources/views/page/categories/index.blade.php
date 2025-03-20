@extends('layouts.main')



@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Kategori</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
        </ol>
        </div>
    </div>
@endsection

@section('content')
    @if (session('success') )
    <script>
        Swal.fire({
          title: "Success!",
          text: "{{ session('success') }}",
          icon: "success"
        });
    </script>
    @endif
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <form action="{{ route('categories.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Cari kategori..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-secondary">Cari</button>
                    </form>
                    <a href="/categories/create" class="btn btn-sm btn-primary ml-auto">Tambah Kategori</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ ($categories->currentPage()-1) * $categories->perPage() + $loop->index + 1 }}</td>
                                <td>{{ $category ->name }}</td>
                                <td>{{ $category ->slug ?? '-' }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/categories/edit/{{ $category->id }}" class="btn btn-sm btn-warning mr-2">
                                            Edit
                                        </a>
                                        {{-- <form action="{{ url('/categories/' . $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                HAPUS
                                            </button>
                                        </form> --}}

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $category->id }}">
                                            Hapus
                                        </button>
                                    </div>
                                                                       
                                </td>
                            </tr>
                            @include('page.categories.delete-confirn')
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $categories->Links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
@endsection