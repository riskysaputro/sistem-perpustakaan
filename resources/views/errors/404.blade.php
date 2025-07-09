@extends('layouts.app')

@section('title', '404 Not Found')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-white dark:bg-gray-900 text-center px-4">
    <div class="animate-bounce">
        <svg class="w-32 h-32 text-blue-600 dark:text-blue-400 mb-6" fill="none" stroke="currentColor" stroke-width="1.5"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9.75 9.75L14.25 14.25M14.25 9.75L9.75 14.25M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
    </div>
    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 dark:text-white mb-4">404 - Halaman Tidak Ditemukan</h1>
    <p class="text-gray-600 dark:text-gray-300 mb-6 max-w-xl mx-auto">Maaf, halaman yang Anda cari tidak tersedia. Mungkin telah dihapus atau Anda salah ketik alamatnya.</p>
    <a href="{{ route('home') }}"
        class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-200">
        Kembali ke Beranda
    </a>
</div>
@endsection
