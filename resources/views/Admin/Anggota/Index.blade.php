@extends('Layouts.adminLayout')

@section('title', 'Daftar Anggota')

@section('content')
    <div x-data="{ showAdd: false, showEdit: false, showDelete: false, selected: {} }" class="container mx-auto mt-10">
        <h1 class="text-2xl font-semibold mb-6">Daftar Anggota</h1>

        <button @click="showAdd = true" class="mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah
            Anggota</button>

        <div class="overflow-x-auto bg-white rounded shadow p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Alamat</th>
                        <th class="px-6 py-3">No HP</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Tanggal Lahir</th>
                        <th class="px-6 py-3">Tanggal Daftar</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anggotas as $anggota)
                        <tr>
                            <td class="px-6 py-2">{{ $loop->iteration }}</td>
                            <td class="px-6 py-2">{{ $anggota->nama }}</td>
                            <td class="px-6 py-2">{{ $anggota->alamat }}</td>
                            <td class="px-6 py-2">{{ $anggota->no_hp }}</td>
                            <td class="px-6 py-2">{{ $anggota->email }}</td>
                            <td class="px-6 py-2">{{ $anggota->tgl_lahir }}</td>
                            <td class="px-6 py-2">{{ $anggota->tgl_daftar }}</td>
                            <td class="px-6 py-2 flex gap-2">
                                <button @click="selected = {{ $anggota }}; showEdit = true"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button @click="selected = {{ $anggota }}; showDelete = true"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-gray-500 py-4">Tidak ada data anggota.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Modal Tambah --}}
        <div x-show="showAdd" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow w-full max-w-lg">
                <h2 class="text-xl mb-4 font-semibold">Tambah Anggota</h2>
                <form method="POST" action="{{ route('anggota.store') }}">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="nama" placeholder="Nama" class="border p-2 rounded w-full" required>
                        <input type="text" name="alamat" placeholder="Alamat" class="border p-2 rounded w-full"
                            required>
                        <input type="text" name="no_hp" placeholder="No HP" class="border p-2 rounded w-full" required>
                        <input type="email" name="email" placeholder="Email" class="border p-2 rounded w-full" required>
                        <input type="date" name="tgl_lahir" placeholder="Tanggal Lahir" class="border p-2 rounded w-full"
                            required>
                        <input type="date" name="tgl_daftar" placeholder="Tanggal Daftar"
                            class="border p-2 rounded w-full" required>
                    </div>
                    <div class="mt-4 flex justify-end gap-2">
                        <button type="button" @click="showAdd = false" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Modal Edit --}}
        <div x-show="showEdit" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow w-full max-w-lg">
                <h2 class="text-xl mb-4 font-semibold">Edit Anggota</h2>
                <form method="POST" :action="`/anggota/${selected.id}`">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="nama" x-model="selected.nama" class="border p-2 rounded w-full">
                        <input type="text" name="alamat" x-model="selected.alamat" class="border p-2 rounded w-full">
                        <input type="text" name="no_hp" x-model="selected.no_hp" class="border p-2 rounded w-full">
                        <input type="email" name="email" x-model="selected.email" class="border p-2 rounded w-full">
                        <input type="date" name="tgl_lahir" x-model="selected.tgl_lahir"
                            class="border p-2 rounded w-full">
                        <input type="date" name="tgl_daftar" x-model="selected.tgl_daftar"
                            class="border p-2 rounded w-full">
                    </div>
                    <div class="mt-4 flex justify-end gap-2">
                        <button type="button" @click="showEdit = false"
                            class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- modal untuk hapus ketika tombol hapus di klik akan muncul --}}
        <div x-show="showDelete" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow w-full max-w-md text-center">
                <p class="mb-4 text-lg">Yakin ingin menghapus <strong x-text="selected.nama"></strong>?</p>
                <form :action="`/anggota/${selected.id}`" method="POST" class="flex justify-center gap-4">
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
