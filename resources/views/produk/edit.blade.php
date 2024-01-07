<form action="{{ url('produk/edit/' . $row->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="PATCH">
    <div class="modal fade" id="edit{{ $row->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT DATA PRODUK</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">NAMA PRODUK</label>
                        <input type="text" class="form-control" id="pro_nama" name="pro_nama"
                            value="{{ $row->pro_nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">KATEGORI</label>
                        <select name="pro_id_kat" id="kat" class="form-select">
                            <option value="{{ $row->pro_id_kat }}">{{ $row->kategori->kat_nama }}</option>
                            @foreach ($kategori as $data)
                                <option value="{{ $data->id }}">{{ $data->kat_nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dekripsi" class="form-label">DESKRIPSI</label>
                        <input type="text" class="form-control" id="pro_dekripsi" name="pro_dekripsi"
                            value="{{ $row->pro_dekripsi }}">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">STOCK</label>
                        <input type="text" class="form-control" id="pro_stock" name="pro_stock"
                            value="{{ $row->pro_stock }}">
                    </div>
                    <div class="mb-3">
                        <label for="berat" class="form-label">BERAT (gram)</label>
                        <input type="text" class="form-control" id="pro_berat" name="pro_berat"
                            value="{{ $row->pro_berat }}">
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
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> SIMPAN PERUBAHAN
                    </button>                    
                </div>
            </div>
        </div>
    </div>
</form>
