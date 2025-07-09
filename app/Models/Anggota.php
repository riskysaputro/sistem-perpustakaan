<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    /** @use HasFactory<\Database\Factories\AnggotaFactory> */
    use HasFactory;
    protected $fillable= ['nama','alamat','no_hp','email','tgl_lahir','tgl_daftar'];

    public function peminjaman(){
        return $this->hasMany(Peminjaman::class,'id_anggota');
    }
}
