{{-- @php
    dd(get_defined_vars());
@endphp --}}


@extends('Layouts.adminLayout')
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded shadow p-4 text-center">
            <h2 class="text-xl font-semibold text-gray-700">Jumlah Anggota</h2>
            <p class="text-3xl font-bold text-blue-500">{{ $jumlahAnggota }}</p>
        </div>
        <div class="bg-white rounded shadow p-4 text-center">
            <h2 class="text-xl font-semibold text-gray-700">Jumlah Buku</h2>
            <p class="text-3xl font-bold text-green-500">{{ $jumlahBuku }}</p>
        </div>
        <div class="bg-white rounded shadow p-4 text-center">
            <h2 class="text-xl font-semibold text-gray-700">Jumlah Kategori</h2>
            <p class="text-3xl font-bold text-purple-500">{{ $jumlahKategori }}</p>
        </div>
        <div class="bg-white rounded shadow p-4 text-center">
            <h2 class="text-xl font-semibold text-gray-700">Jumlah Pinjaman</h2>
            <p class="text-3xl font-bold text-blue-500">{{ $jumlahPinjaman }}</p>
        </div>
    </div>
@endsection
