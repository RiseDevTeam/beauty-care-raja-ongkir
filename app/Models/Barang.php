<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $primaryKey = 'id_barang';

    public function persediaan()
    {
        return $this->belongsTo('App\Models\Persediaan', 'kode_barang', 'kode_barang');
    }

    public function histori_persediaan()
    {
        return $this->belongsTo('App\Models\Histori_Persediaan', 'kode_barang', 'kode_barang');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id_user', 'id');
    }

    public function pemesanan()
    {
        return $this->belongsTo('App\Models\Pemesanan', 'kode_barang', 'kode_barang');
    }
}
