@extends('Layouts.adminLayout')

@section('title', 'Daftar Buku')

@section('content')
    <div x-data="{ showAdd: false, showEdit: false, showDelete: false, selected: {} }" class="container mx-auto mt-10">
        <h1 class="text-2xl font-semibold mb-6">Daftar Buku</h1>

        <button @click="showAdd = true" class="mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah
            Buku</button>

        <div class="overflow-x-auto bg-white rounded shadow p-4">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">Judul</th>
                        <th class="px-6 py-3">Pengarang</th>
                        <th class="px-6 py-3">Penerbit</th>
                        <th class="px-6 py-3">Tahun</th>
                        <th class="px-6 py-3">Isbn</th>
                        <th class="px-6 py-3">Tanggal Input</th>
                        <th class="px-6 py-3">Jumlah Halaman</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bukus as $buku)
                        <tr>
                            <td class="px-6 py-2">{{ $loop->iteration }}</td>
                            <td class="px-6 py-2">{{ $buku->judul }}</td>
                            <td class="px-6 py-2">{{ $buku->pengarang }}</td>
                            <td class="px-6 py-2">{{ $buku->penerbit }}</td>
                            <td class="px-6 py-2">{{ $buku->tahun }}</td>
                            <td class="px-6 py-2">{{ $buku->isbn }}</td>
                            <td class="px-6 py-2">{{ $buku->tgl_input }}</td>
                            <td class="px-6 py-2">{{ $buku->jmlh_halaman }}</td>
                            <td class="px-6 py-2">{{ $buku->id_kategori }}</td>
                            <td class="px-6 py-2 flex gap-2">
                                <button @click="selected = {{ $buku }}; showEdit = true"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">
                                    Edit
                                </button>
                                <button @click="selected = {{ $buku }}; showDelete = true"
                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-gray-500 py-4">Tidak ada data buku.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Modal Tambah Buku --}}
        <div x-show="showAdd" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow w-full max-w-lg">
                <h2 class="text-xl mb-4 font-semibold">Tambah Buku</h2>
                <form method="POST" action="{{ route('buku.store') }}">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="judul" placeholder="Judul Buku" class="border p-2 rounded w-full"
                            required>
                        <input type="text" name="pengarang" placeholder="Pengarang" class="border p-2 rounded w-full"
                            required>
                        <input type="text" name="penerbit" placeholder="Penerbit" class="border p-2 rounded w-full"
                            required>
                        <input type="number" name="tahun" placeholder="Tahun Terbit" class="border p-2 rounded w-full"
                            required>
                        <input type="text" name="isbn" placeholder="ISBN" class="border p-2 rounded w-full" required>
                        <input type="number" name="jmlh_halaman" placeholder="Jumlah Halaman"
                            class="border p-2 rounded w-full" required>

                        <select name="id_kategori" class="border p-2 rounded w-full col-span-2" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4 flex justify-end gap-2">
                        <button type="button" @click="showAdd = false" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>


        {{-- Modal Tambah Buku --}}
        <div x-show="showAdd" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow w-full max-w-lg">
                <h2 class="text-xl mb-4 font-semibold">Tambah Buku</h2>
                <form method="POST" action="{{ route('buku.store') }}">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="judul" placeholder="Judul Buku" class="border p-2 rounded w-full"
                            required>
                        <input type="text" name="pengarang" placeholder="Pengarang" class="border p-2 rounded w-full"
                            required>
                        <input type="text" name="penerbit" placeholder="Penerbit" class="border p-2 rounded w-full"
                            required>
                        <input type="number" name="tahun" placeholder="Tahun Terbit" class="border p-2 rounded w-full"
                            required>
                        <input type="text" name="isbn" placeholder="ISBN" class="border p-2 rounded w-full"
                            required>
                        <input type="number" name="jmlh_halaman" placeholder="Jumlah Halaman"
                            class="border p-2 rounded w-full" required>

                        <select name="id_kategori" class="border p-2 rounded w-full col-span-2" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                            @endforeach
                        </select>
                        {{-- <label for="tgl_input">Tanggal Input</label> --}}
                        <input type="date" name="tgl_input" class="border p-2 rounded w-full" required>
                    </div>
                    <div class="mt-4 flex justify-end gap-2">
                        <button type="button" @click="showAdd = false"
                            class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>


        {{-- modal untuk hapus ketika tombol hapus di klik akan muncul --}}
        <div x-show="showDelete" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow w-full max-w-md text-center">
                <p class="mb-4 text-lg">Yakin ingin menghapus <strong x-text="selected.judul"></strong>?</p>
                <form :action="`/buku/${selected.id}`" method="POST" class="flex justify-center gap-4">
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
