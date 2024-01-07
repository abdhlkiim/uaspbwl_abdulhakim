@extends('layouts.app')

@section('content')
<div class="mt-3 container">
    <h1 class="display-4">DETAIL DATA PRODUK</h1>
    <hr>

    <table class="table table-bordered table-hover mt-3 shadow-sm">
        <tbody>
            <tr class="table-danger">
                <th class="bg-danger text-white">NO. PRODUK</th>
                <td>{{ $produk->pro_no }}</td>
            </tr>
            <tr class="table-danger">
                <th class="bg-danger text-white">NAMA</th>
                <td>{{ $produk->pro_nama }}</td>
            </tr>
            <tr class="table-danger">
                <th class="bg-danger text-white">KATEGORI</th>
                <td>{{ $produk->kategori->kat_nama }}</td>
            </tr>
            <tr class="table-danger">
                <th class="bg-danger text-white">DESKRIPSI</th>
                <td>{{ $produk->pro_dekripsi }}</td>
            </tr>
            <tr class="table-danger">
                <th class="bg-danger text-white">STOCK</th>
                <td>{{ $produk->pro_stock }}</td>
            </tr>
            <tr class="table-danger">
                <th class="bg-danger text-white">KODE PRODUKSI</th>
                <td>{{ $produk->pro_kodeproduksi }}</td>
            </tr>
            <tr class="table-danger">
                <th class="bg-danger text-white">NO. SERI</th>
                <td>{{ $produk->pro_seri }}</td>
            </tr>
            <tr class="table-danger">
                <th class="bg-danger text-white">BERAT (gram)</th>
                <td>{{ $produk->pro_berat }}</td>
            </tr>
            <tr class="table-danger">
                <th class="bg-danger text-white">STATUS</th>
                <td>
                    @if ($produk->pro_tersedia === 'Y')
                        <span class="badge bg-success">TERSEDIA</span>
                    @else
                        <span class="badge bg-danger">HABIS</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">
        <i class="fas fa-arrow-left"></i> KEMBALI
    </a>
</div>
@endsection
