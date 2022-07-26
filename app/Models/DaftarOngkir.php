<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarOngkir extends Model
{
    use HasFactory;

    protected $table = 'daftar_ongkir';

    protected $primaryKey = 'id_daftar_ongkir';
}
