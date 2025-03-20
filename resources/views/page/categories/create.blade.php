@extends('layouts.main')



@section('header')
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Tambah Kategori</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/products">Home</a></li>
            <li class="breadcrumb-item active">Kategori</li>
        </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <form action="/categories/store" method="POST">
                @csrf
                @method('POST')
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama Kategori</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                    @error('name')
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