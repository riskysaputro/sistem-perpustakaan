@extends('Layouts.adminLayout')
@section('title', 'Peminjaman Buku')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-xl font-semibold">Daftar Peminjaman Buku</h1>
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('peminjaman.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah Peminjaman</a>
            <a href="{{ route('peminjaman.export.pdf') }}" target="_blank"
                class="bg-red-600 text-white px-4 py-2 rounded">Export
                PDF</a>
        </div>



        <div class="bg-white shadow rounded p-4">
            <table class="w-full table-auto">
                <thead class="bg-gray-100 text-xs text-gray-600 uppercase">
                    <tr>
                        <th class="p-2 text-left">#</th>
                        <th class="p-2 text-left">Nama Anggota</th>
                        <th class="p-2 text-left">Tanggal Pinjam</th>
                        <th class="p-2 text-left">Lama Pinjam</th>
                        <th class="p-2 text-left">Denda</th>
                        <th class="p-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $index => $p)
                        <tr class="border-b">
                            <td class="p-2">{{ $index + 1 }}</td>
                            <td class="p-2">{{ $p->anggota->nama ?? '-' }}</td>
                            <td class="p-2">{{ $p->tgl_pinjam }}</td>
                            <td class="p-2">{{ $p->lama_pinjam }} hari</td>
                            <td class="p-2">{{ $p->denda->nominal ?? '-' }}</td>
                            <td class="p-2">
                                <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
