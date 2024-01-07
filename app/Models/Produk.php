<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = ['pro_no', 'pro_id_kat', 'pro_nama', 'pro_dekripsi', 'pro_stock', 'pro_kodeproduksi', 'pro_seri', 'pro_berat', 'pro_tersedia', 'pro_id_user'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'pro_id_kat', 'id');
    }

    public static function generateKodePro()
    {
        $pdk     = Produk::latest()->first();
        $kodePdk = 'PRO';

        if ($pdk == null) {
            $noUrut = '001';
        } else {
            $explode = explode('-', $pdk->pro_no);
            $noUrut  = $explode[1] + 1;
            $noUrut  = str_pad($noUrut, 3, "0", STR_PAD_LEFT);
        }

        $pdkKode = $kodePdk . '-' . $noUrut;

        return $pdkKode;
    }
}
