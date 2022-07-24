<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori_Persediaan extends Model
{
    use HasFactory;

    protected $table = 'histori_persediaan';

    protected $primaryKey = 'id_histori_persediaan';

    protected $fillable = ['id_user', 'kode_barang', 'tanggal', 'persediaan_awal', 'harga', 'keterangan'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function barang()
    {
        return $this->hasOne('App\Models\Barang', 'kode_barang', 'kode_barang');
    }

    public function persediaan()
    {
        return $this->belongsTo('App\Models\Persediaan', 'kode_barang', 'kode_barang');
    }
}
