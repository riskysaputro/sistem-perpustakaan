<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Denda extends Model
    {
        /** @use HasFactory<\Database\Factories\DendaFactory> */
        use HasFactory;

        protected $fillable= ['nominal'];

        public function peminjaman(){
            return $this->hasMany(Peminjaman::class,'id_denda');
        }
    }
