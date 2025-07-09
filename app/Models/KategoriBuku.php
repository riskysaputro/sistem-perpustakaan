<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    /** @use HasFactory<\Database\Factories\KategoriBukuFactory> */
    use HasFactory;
    protected $fillable= ['kategori'];

    public function buku(){
        return $this->hasMany(Buku::class,'id_kategori');
    }
}
