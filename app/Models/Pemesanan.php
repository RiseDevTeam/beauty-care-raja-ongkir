<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $primaryKey = 'id_pemesanan';

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function persediaan()
    {
        return $this->hasOne('App\Models\Persediaan', 'id_persediaan', 'id_persediaan');
    }

    public function barang()
    {
        return $this->hasOne('App\Models\Barang', 'kode_barang', 'kode_barang');
    }
}
