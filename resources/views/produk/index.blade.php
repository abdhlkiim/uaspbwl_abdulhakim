@extends('layouts.app')

@section('content')
<div class="mt-3 container">
    <h1 class="display-4 text-black fw-bold">DATA PRODUK</h1>
    <hr>
    <a href="{{ url('produk/create') }}" data-bs-toggle="modal"
        data-bs-target="#exampleModal" class="btn btn-success"><i class="fas fa-plus"></i>TAMBAH</a>
    <div class="table-responsive mt-3">
        <table class="table my-3 table-bordered table-hover bg-success shadow" id="dtb">
            <thead>
                <tr>
                    <th class="text-center bg-primary text-white">NO</th>
                    <th class="bg-primary text-white">NO. PRODUK</th>
                    <th class="bg-primary text-white">NAMA PRODUK</th>
                    <th class="bg-primary text-white">DESKRIPSI</th>
                    <th class="bg-primary text-white">STOCK</th>
                    <th class="bg-primary text-white">KATEGORI</th>
                    <th class="bg-primary text-white">BERAT (gram)</th>
                    <th class="bg-primary text-white">STATUS</th>
                    <th class="text-center bg-primary text-white">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rows as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->pro_no }}</td>
                    <td>{{ $row->pro_nama }}</td>
                    <td>{{ $row->pro_dekripsi }}</td>
                    <td>{{ $row->pro_stock }}</td>
                    <td>{{ $row->kategori->kat_nama }}</td>
                    <td>{{ $row->pro_berat }}</td>
                    <td>
                        @if ($row->pro_tersedia === 'Y')
                        <span class="badge bg-success">TERSEDIA</span>
                        @else
                        <span class="badge bg-danger">HABIS</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produk.show', $row->id) }}" class="text-white btn btn-info fw-bold">
                            <i class="fas fa-info-circle"></i> DETAIL
                        </a> |
                        <a href="#edit{{ $row->id }}" data-bs-toggle="modal" class="btn btn-warning">
                            <i class="fas fa-edit"></i> EDIT
                        </a> |
                        <a href="{{ url('produk/delete/' . $row->id) }}" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">
                            <i class="fas fa-trash-alt"></i> HAPUS
                        </a>                    
                        @include('produk.edit')
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data produk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Start Modal -->
    <form action="{{ url('produk/store') }}" method="post">
        <input type="hidden" value="{{ Auth::user()->id }}" name="pro_id_user">
        {{ csrf_field() }}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h1 class="modal-title fs-5">TAMBAH DATA PRODUK</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="no" class="form-label">NOMOR PRODUK</label>
                            <input type="text" class="form-control" id="nama" name="pro_no" value="{{ $kodePro }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">KATEGORI</label>
                            <select name="pro_id_kat" id="kat" class="form-select">
                                @foreach ($kategori as $row)
                                    <option value="{{ $row->id }}">{{ $row->kat_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">NAMA PRODUK</label>
                            <input type="text" class="form-control" id="pro_nama" name="pro_nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="dekripsi" class="form-label">DESKRIPSI</label>
                            <input type="text" class="form-control" id="pro_dekripsi" name="pro_dekripsi" required>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">STOCK</label>
                            <input type="text" class="form-control" id="pro_stock" name="pro_stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="kodeproduksi" class="form-label">KODE PRODUKSI</label>
                            <input type="text" class="form-control" id="pro_kodeproduksi" name="pro_kodeproduksi" required>
                        </div>
                        <div class="mb-3">
                            <label for="seri" class="form-label">NO. SERI</label>
                            <input type="text" class="form-control" id="pro_seri" name="pro_seri" required>
                        </div>
                        <div class="mb-3">
                            <label for="berat" class="form-label">BERAT (gram)</label>
                            <input type="text" class="form-control" id="pro_berat" name="pro_berat" required>
                        </div>
                        <div class="mb-3">
                            <label for="tersedia" class="form-label">STATUS</label>
                            <select name="pro_tersedia" id="tersedia" class="form-select">
                                <option value="Y">TERSEDIA</option>
                                <option value="N">HABIS</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times"></i> BATAL
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> SIMPAN
                        </button>                    
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Bootstrap 5.3 Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#dtb').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "searching": true
        });
    });
</script>

@endsection
