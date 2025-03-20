@extends('layouts.main')



@section('header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Dashboard</h1>

        {{-- @dd(auth()->check()) --}}

    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $productCount }}</h3>
                <p>Produk</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="/products" class="small-box-footer">Detaik Produk <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $categoryCount }}<sup style="font-size: 20px"></sup></h3>
                <p>Kategori</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/categories" class="small-box-footer">Detail Kategori <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection