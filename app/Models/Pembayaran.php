<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $primaryKey = 'id_pembayaran';

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_user');
    }

    public function stok()
    {
        return $this->hasOne('App\Models\Stok', 'id_stok', 'id_stok');
    }

    public function kurir()
    {
        return $this->hasOne('App\Models\Kurir', 'id_kurir', 'id_kurir');
    }

    public function barang()
    {
        return $this->hasOne('App\Models\Barang', 'kode_barang', 'kode_barang');
    }

    public function persediaan()
    {
        return $this->hasOne('App\Models\Persediaan', 'id_persediaan', 'id_persediaan');
    }

    public function detail()
    {
        return $this->hasOne('App\Models\Detail_Pembayaran', 'id_pembayaran', 'id_pembayaran');
    }
}
