@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <h1 class="display-4 text-black fw-bold">KATEGORI</h1>
    <hr>
    <a href="{{ url('kategori/create') }}" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-success">
        <i class="fas fa-plus"></i> TAMBAH
    </a>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-hover bg-success shadow" id="dtb">
            <thead class="bg-success text-white">
                <tr>
                    <th class="text-center bg-success text-white">NO</th>
                    <th class="bg-success text-white">KODE PRODUK</th>
                    <th class="bg-success text-white">NAMA PRODUK</th>
                    <th class="text-center bg-success text-white">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rows as $row)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $row->kat_kode }}</td>
                    <td>{{ $row->kat_nama }}</td>
                    <td class="text-center">
                        <a href="#edit{{ $row->id }}" data-bs-toggle="modal" class="btn btn-warning">
                            <i class="fas fa-edit"></i> EDIT
                        </a> |
                        <a href="{{ url('kategori/delete/' . $row->id) }}" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">
                            <i class="fas fa-trash-alt"></i> HAPUS
                        </a>                        
                        @include('kategori.edit', ['row' => $row])
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center bg-success text-white">Tidak ada data kategori.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h1 class="modal-title fs-5">TAMBAH KATEGORI</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('kategori/store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">NAMA PRODUK</label>
                        <input type="text" class="form-control" id="nama" name="nama_kat" required>
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
            </form>
        </div>
    </div>
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
