<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPinjamFactory> */
    use HasFactory;
    protected $fillable= ['id_buku','tgl_kembali'];

    public function buku(){
        return $this->belongsTo(Buku::class,'id_buku');
    }

    public function peminjaman(){
        return $this->belongsTo(Peminjaman::class,'id_peminjaman');
    }
}