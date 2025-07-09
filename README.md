<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<h2 align="center">📚 Sistem Informasi Perpustakaan - Laravel 12</h2>

<p align="center">
    Aplikasi web manajemen perpustakaan berbasis Laravel untuk pengelolaan buku, anggota, peminjaman, pengembalian, dan laporan.
</p>

---

## 🚀 Tentang Proyek

Sistem ini dikembangkan menggunakan **Laravel 12** sebagai backend dan **Tailwind CSS** untuk frontend. Proyek ini membantu pengelolaan perpustakaan secara digital, memungkinkan admin untuk memantau aktivitas peminjaman, pengembalian buku, serta mengelola denda keterlambatan.

## 🧩 Fitur Utama

- 🔐 Autentikasi dengan Laravel Breeze
- 👥 Manajemen Anggota
- 📚 Manajemen Buku dan Kategori
- 🔄 Peminjaman dan Pengembalian Buku
- 📅 Validasi tanggal pinjam & kembali
- 💸 Denda Otomatis untuk keterlambatan
- 📄 Laporan PDF Peminjaman & Pengembalian
- 📊 Dashboard Admin (statistik & ringkasan)
- 🌐 Antarmuka modern dengan Tailwind CSS

## 🛠️ Teknologi yang Digunakan

- [Laravel 12](https://laravel.com)
- [Laravel Breeze (Auth)](https://laravel.com/docs/starter-kits#laravel-breeze)
- [Tailwind CSS](https://tailwindcss.com)
- [DOMPDF](https://github.com/dompdf/dompdf) (untuk cetak PDF)
- [MySQL](https://www.mysql.com/) (Database)
- [Font Awesome](https://fontawesome.com) (Ikon)

## 📂 Struktur Database

Tabel penting dalam proyek ini:
- `users` – data login pengguna/admin
- `anggota` – data siswa atau anggota perpustakaan
- `buku`, `kategori_buku` – data buku dan kategorinya
- `peminjaman`, `detail_pinjam` – data peminjaman & detailnya
- `denda` – jumlah dan status denda peminjaman

## ⚙️ Instalasi

```bash
# 1. Clone repositori ini
git clone https://github.com/nama-kamu/sistem-perpustakaan.git

# 2. Masuk ke direktori proyek
cd sistem-perpustakaan

# 3. Install dependency PHP dan JS
composer install
npm install && npm run dev

# 4. Copy dan setup .env
cp .env.example .env
php artisan key:generate

# 5. Setup database di .env dan migrasi
php artisan migrate --seed

# 6. Jalankan server
php artisan serve
