<!-- resources/views/home.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 text-center" style="background-color: #f0f0f0; padding: 20px; border-radius: 10px;">
            <h1 class="display-4 fw-bold text-dark">Selamat Datang di Website Kami!</h1>
            <p class="lead text-dark">Temukan dan tambah stok produk Anda dengan cepat dan mudah.</p>
            <a href="{{ url('kategori') }}" class="btn btn-success btn-lg">Kategori</a> |
            <a href="{{ url('produk') }}" class="btn btn-primary btn-lg">Lihat Produk</a>
        </div>
        <div class="col-md-6">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/home-banner1.jpg') }}" class="d-block w-100" alt="Home Banner 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/home-banner2.jpg') }}" class="d-block w-100" alt="Home Banner 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/home-banner3.jpg') }}" class="d-block w-100" alt="Home Banner 3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
