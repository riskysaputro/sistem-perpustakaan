<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\{User, Anggota, KategoriBuku, Buku, Denda, Peminjaman, DetailPinjam};

class MasterSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder User
        $user = User::create([
            'name_user' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        // Seeder Anggota
        $anggota = Anggota::create([
            'nama' => 'Siti Aminah',
            'alamat' => 'Jl. Melati No. 3',
            'no_hp' => '081234567890',
            'email' => 'siti@mail.com',
            'tgl_lahir' => '2001-01-01',
            'tgl_daftar' => now(),
        ]);

        // Seeder Kategori Buku
        $kategori = KategoriBuku::create([
            'kategori' => 'Teknologi Informasi',
        ]);

        // Seeder Buku
        $buku = Buku::create([
            'judul' => 'Laravel untuk Pemula',
            'pengarang' => 'Ahmad Programmer',
            'penerbit' => 'Gramedia',
            'tahun' => '2024',
            'isbn' => '9786021234567',
            'jmlh_halaman' => 300,
            'id_kategori' => $kategori->id,
        ]);

        // Seeder Denda
        $denda = Denda::create([
            'nominal' => 5000,
        ]);

        // Seeder Peminjaman
        $peminjaman = Peminjaman::create([
            'tgl_pinjam' => now(),
            'lama_pinjam' => 7,
            'nominal_denda' => 0,
            'id_anggota' => $anggota->id,
            'id_denda' => $denda->id,
            'id_user' => $user->id,
        ]);

        // Seeder DetailPinjam
        DetailPinjam::create([
            'id_buku' => $buku->id,
            'id_peminjaman' => $peminjaman->id,
            'tgl_kembali' => now()->addDays(7),
        ]);
    }
}