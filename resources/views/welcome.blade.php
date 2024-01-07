@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold text-dark">Selamat Datang di Aplikasi Stok Barang!</h1>
                <p class="lead text-dark">Kelola stok produk Anda dengan mudah dan efisien.</p>
                <a href="{{ url('http://localhost/uaspbwl-barang/public/login') }}" class="btn btn-success btn-lg">Login</a> |
                <a href="{{ url('http://localhost/uaspbwl-barang/public/register') }}" class="btn btn-primary btn-lg">Register</a>
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
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center text-white mt-5" style="background-color: hsl(0, 0%, 0%);">
        <div class="container p-4">
            <marquee behavior="scroll" direction="left" scrollamount="8">
                Grosir Lestari Jaya | Jl. Batang Kuis - Pantai Labu, Sidodadi, Kec. Percut Sei Tuan, Kabupaten Deli Serdang, Sumatera Utara 20553
            </marquee>
        </div>
    </footer>

    <footer class="text-center text-white mt-5" style="background-color: hsl(0, 0%, 100%);">
        <div class="container p-4">
        </div>
    </footer>

    <a href="https://www.instagram.com/abdhlkiim/" class="text-center d-block p-3" style="background-color: hsl(0, 0%, 100%); color: white;">
        <div class="logo-container">
            <img src="{{ asset('img/logoig.png') }}" alt="Instagram Logo" class="logo" width="150" height="150">
        </div>
        <div class="text-black">
            &copy; 2024 Aplikasi Stok Barang &#10084;Abdul Hakim
        </div>
    </a>
@endsection
