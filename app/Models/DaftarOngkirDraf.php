<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarOngkirDraf extends Model
{
    use HasFactory;

    protected $table = 'daftar_ongkir_draf';

    protected $primaryKey = 'id_daftar_ongkir';
    protected $guarded = [];
}
