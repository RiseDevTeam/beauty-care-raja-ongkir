<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    use HasFactory;

    protected $table = 'persediaan';

    protected $primaryKey = 'id_persediaan';

    protected $fillable = ['persediaan', 'persediaan_awal'];

    public function barang()
    {
        return $this->hasOne('App\Models\Barang', 'kode_barang', 'kode_barang');
    }

    public function pemesanan()
    {
        return $this->belongsTo('App\Models\Pemesanan', 'id_stok', 'id_stok');
    }

    public function histori_persediaan()
    {
        return $this->hasOne('App\Models\Histori_Persediaan', 'kode_barang', 'kode_barang');
    }

    public function pembayaran()
    {
        return $this->belongsTo('App\Models\Pembayaran', 'id_persediaan', 'id_persediaan');
    }
}
