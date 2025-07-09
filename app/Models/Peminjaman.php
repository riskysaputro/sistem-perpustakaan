<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    /** @use HasFactory<\Database\Factories\PeminjamanFactory> */
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable= ['tgl_pinjam','lama_pinjam','nominal_denda','id_anggota','id_denda','id_user'];

    public function anggota(){
        return $this->belongsTo(Anggota::class,'id_anggota');
    }
    public function denda(){
        return $this->belongsTo(Denda::class,'id_denda');
    }
        public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
    public function detailPinjam(){
    return $this->hasMany(DetailPinjam::class, 'id_peminjaman');
}
}
