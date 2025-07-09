@extends('Layouts.adminLayout')
@section('title', 'Kelola Kategori Buku')

@section('content')
    <div x-data="{ showAdd: false, showEdit: false, selected: {} }" class="container mx-auto mt-10">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold">Kategori Buku</h1>
            <button @click="showAdd = true" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Kategori</button>
        </div>

        @include('partials.notifikasi')
        <div class="bg-white shadow rounded p-4">
            <table class="w-full divide-y divide-gray-200">
                <thead class="bg-gray-100 text-left text-xs font-semibold text-gray-500 uppercase">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Kategori</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $index => $k)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $k->kategori }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <button @click="selected = {{ $k }}; showEdit = true"
                                    class="text-yellow-600 hover:underline">Edit</button>
                                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin hapus kategori ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Modal Tambah --}}
        <div x-show="showAdd" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Tambah Kategori</h2>
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <input type="text" name="kategori" placeholder="Nama Kategori" class="w-full border p-2 rounded mb-4"
                        required>
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="showAdd = false" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Modal Edit --}}
        <div x-show="showEdit" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Edit Kategori</h2>
                <form :action="`/kategori/${selected.id}`" method="POST">
                    @csrf @method('PATCH')
                    <input type="text" name="kategori" x-model="selected.kategori" class="w-full border p-2 rounded mb-4"
                        required>
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="showEdit = false"
                            class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
