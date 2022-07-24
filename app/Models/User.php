<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function histori_persediaan()
    {
        return $this->belongsTo('App\Models\Histori_Stok', 'id_user', 'id');
    }

    public function barang()
    {
        return $this->belongsTo('App\Models\Barang', 'id', 'id_user');
    }

    public function alamat()
    {
        return $this->hasOne('App\Models\Alamat', 'username', 'username');
    }

    public function pemesanan()
    {
        return $this->belongsTo('App\Model\Pemesanan', 'id_user', 'id');
    }
}
