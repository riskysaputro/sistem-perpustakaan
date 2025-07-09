@extends('Layouts.adminLayout')
@section('title', 'Peminjaman Buku')

@section('content')
    <div x-data="{ showAdd: false, showEdit: false, showDelete: false, selected: {} }" class="container mx-auto mt-10">
        <div class="container mx-auto mt-10">
            <h1 class="text-xl font-semibold">Daftar Peminjaman Buku</h1>
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('peminjaman.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah
                    Peminjaman</a>
                <a href="{{ route('peminjaman.export.pdf') }}" target="_blank"
                    class="bg-red-600 text-white px-4 py-2 rounded">Export
                    PDF</a>
            </div>
            {{-- notifikasi berhasil --}}
            @include('partials.notifikasi')

            <div class="bg-white shadow rounded p-4">
                <table class="w-full table-auto">
                    <thead class="bg-gray-100 text-xs text-gray-600 uppercase">
                        <tr>
                            <th class="p-2 text-left">No</th>
                            <th class="p-2 text-left">Nama Anggota</th>
                            <th class="p-2 text-left">Tanggal Pinjam</th>
                            <th class="p-2 text-left">Lama Pinjam</th>
                            <th class="p-2 text-left">Denda</th>
                            <th class="p-2 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $index => $pinjam)
                            <tr class="border-b">
                                <td class="p-2">{{ $index + 1 }}</td>
                                <td class="p-2">{{ $pinjam->anggota->nama ?? '-' }}</td>
                                <td class="p-2">{{ $pinjam->tgl_pinjam }}</td>
                                <td class="p-2">{{ $pinjam->lama_pinjam }} hari</td>
                                <td class="p-2">
                                    {{ $pinjam->denda ? 'Rp' . number_format($pinjam->denda->nominal, 0, ',', '.') : '-' }}
                                </td>
                                {{-- <pre>{{ dd($pinjam->denda) }}</pre> --}}
                                <td class="p-2">
                                    <button @click="selected = {{ $pinjam }}; showDelete = true"
                                        class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- modal untuk hapus ketika tombol hapus di klik akan muncul --}}
            <div x-show="showDelete" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded shadow w-full max-w-md text-center">
                    <p class="mb-4 text-lg">Yakin ingin menghapus <strong x-text="selected.nama"></strong>?</p>
                    <form :action="`/peminjaman/delete/${selected.id}`" method="POST" class="flex justify-center gap-4">
                        @csrf
                        @method('DELETE')
                        <button type="button" @click="showDelete = false"
                            class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Hapus</button>
                    </form>
                </div>
            </div>

        </div>
    @endsection
