<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Anggota::create([
            'nama' => 'Andi Saputra',
            'alamat' => 'Jalan Merdeka No. 10, Tangerang',
            'no_hp' => '081234567890',
            'email' => 'andi@example.com',
            'tgl_lahir' => '2000-05-15',
            'tgl_daftar' => now(),
        ]);

        Anggota::create([
            'nama' => 'Rina Marlina',
            'alamat' => 'Jl. Sudirman No. 5, Jakarta',
            'no_hp' => '085612345678',
            'email' => 'rina@example.com',
            'tgl_lahir' => '2002-11-25',
            'tgl_daftar' => now(),
        ]);
    }
}