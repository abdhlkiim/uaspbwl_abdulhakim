<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Kategori::all();
        return view('kategori.index', compact('rows'));
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
        $kat = Kategori::latest()->first();
        $kodeKat = 'PRO';

        if ($kat == null) {
            $noUrut = '001';
        } else {
            $explode = explode('-', $kat->kat_kode);
            $noUrut = $explode[1] + 1;
            $noUrut = str_pad($noUrut, 3, "0", STR_PAD_LEFT);
        }

        $katKode = $kodeKat . '-' . $noUrut;

        $request->validate([
            'nama_kat' => 'required|string',
        ]);

        $kategori = Kategori::create([
            'kat_kode' => $katKode,
            'kat_nama' => $request->nama_kat,
        ]);

        return redirect('kategori')->with('success', 'Data kategori ' . $kategori->kat_nama . ' Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Kategori::find($id);
        return view('kategori.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $row = Kategori::findOrFail($id);

        $row->update([
            'kat_nama' => $request->nama_kat,
        ]);

        return redirect('kategori')->with('success', 'Data kategori <strong>' . $row->kat_nama . '</strong> Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row = Kategori::findOrFail($id);

        $row->delete();

        return redirect('kategori')->with('success', 'Data kategori <strong>' . $row->kat_nama . '</strong> Berhasil dihapus');
    }
}
