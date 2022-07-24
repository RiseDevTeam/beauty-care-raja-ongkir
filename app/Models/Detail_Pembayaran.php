<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'detail_pembayaran';

    protected $primaryKey = 'id_detail_pembayaran';
}
