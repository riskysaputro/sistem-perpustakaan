<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    /** @use HasFactory<\Database\Factories\BukuFactory> */
    use HasFactory;
    protected $fillable= ['judul','pengarang','penerbit','tahun','isbn','tgl_input','jmlh_halaman','id_kategori'];

    public function kategoriBuku(){
        return $this->belongsTo(KategoriBuku::class,'id_kategori');
    }
}
