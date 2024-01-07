<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows      = Produk::all();
        $kodePro   = Produk::generateKodePro();
        $kategori  = Kategori::all();
        return view('produk.index', compact('rows', 'kodePro', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk = Produk::create([
            'pro_no' => $request->pro_no,
            'pro_id_kat' => $request->pro_id_kat,
            'pro_nama' => $request->pro_nama,
            'pro_dekripsi' => $request->pro_dekripsi,
            'pro_stock' => $request->pro_stock,
            'pro_kodeproduksi' => $request->pro_kodeproduksi,
            'pro_seri' => $request->pro_seri,
            'pro_berat' => $request->pro_berat,
            'pro_tersedia' => $request->pro_tersedia,
            'pro_id_user' => $request->pro_id_user,
        ]);

        return redirect('produk')->with('success', 'Data produk <strong>' . $produk->pro_nama . '</strong> Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        return view('produk.show', [
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('produk.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Produk::findOrFail($id);

        $row->update([
            'pro_nama' => $request->pro_nama,
            'pro_id_kat' => $request->pro_id_kat,
            'pro_dekripsi' => $request->pro_dekripsi,
            'pro_stock' => $request->pro_stock,
            'pro_berat' => $request->pro_berat,
            'pro_tersedia' => $request->pro_tersedia,
        ]);

        return redirect('produk')->with('success', 'Data produk <strong>' . $row->pro_nama . '</strong> Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Produk::findOrFail($id);

        $row->delete();

        return redirect('produk')->with('success', 'Data produk <strong>' . $row->pro_nama . '</strong> Berhasil dihapus');
    }
}
