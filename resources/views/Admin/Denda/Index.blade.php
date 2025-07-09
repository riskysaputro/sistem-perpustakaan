@extends('layouts.adminLayout')

@section('content')
<div x-data="{ showAdd: false, showEdit: false, showDelete: false, selected: {} }" class="container mx-auto mt-10">
    <h1 class="text-2xl font-semibold mb-6">Daftar Denda</h1>

    <button @click="showAdd = true"
        class="mb-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Denda</button>

    @include('partials.notifikasi')

    <div class="overflow-x-auto bg-white rounded shadow p-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-white text-left text-sm font-semibold text-gray-700">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nominal</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                @forelse ($dendas as $denda)
                    <tr class="border-t">
                        <td class="px-6 py-2">{{ $loop->iteration }}</td>
                        <td class="px-6 py-2">{{ 'Rp' . number_format($denda->nominal, 0, ',', '.') }}</td>
                        <td class="px-6 py-2 flex gap-2">
                            <button @click='selected = {{ $denda->toJson() }}; showEdit = true'
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Edit</button>
                            <button @click='selected = {{ $denda->toJson() }}; showDelete = true'
                                class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-gray-500 py-4">Tidak ada data denda.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal Tambah Denda --}}
    <div x-show="showAdd" x-transition class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow w-full max-w-lg">
            <h2 class="text-xl mb-4 font-semibold">Tambah Denda</h2>
            <form method="POST" action="{{ route('denda.store') }}">
                @csrf
                <div class="mb-4">
                    <input type="number" name="nominal" placeholder="Nominal Denda" class="border p-2 rounded w-full"
                        required>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="showAdd = false" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Edit Denda --}}
    <div x-show="showEdit" x-transition class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Edit Denda</h2>
            <form :action="`/denda/${selected.id}`" method="POST">
                @csrf
                @method('PATCH')
                <input type="number" name="nominal" x-model="selected.nominal" class="w-full border p-2 rounded mb-4"
                    required>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="showEdit = false" class="bg-gray-300 px-4 py-2 rounded">Batal</button>
                    <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Update</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Hapus Denda --}}
    <div x-show="showDelete" x-transition class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded shadow w-full max-w-md text-center">
            <p class="mb-4 text-lg">
                Yakin ingin menghapus denda <strong>Rp <span x-text="Number(selected.nominal).toLocaleString('id-ID')"></span></strong>?
            </p>
            <form :action="`/denda/${selected.id}`" method="POST" class="flex justify-center gap-4">
                @csrf
                @method('DELETE')
                <button type="button" @click="showDelete = false" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Hapus</button>
            </form>
        </div>
    </div>
</div>
@endsection
