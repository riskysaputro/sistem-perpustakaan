@extends('Layouts.adminLayout')
@section('title', 'Tambah Peminjaman')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Form Tambah Peminjaman</h2>
    <form method="POST" action="{{ route('peminjaman.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Anggota</label>
            <select name="id_anggota" class="w-full border p-2 rounded" required>
                @foreach ($anggota as $a)
                    <option value="{{ $a->id }}">{{ $a->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">User</label>
            <input type="number" name="id_user" value="{{ auth()->id() }}" readonly class="w-full border p-2 rounded bg-gray-100">
        </div>
        

        <div class="mb-4">
            <label class="block mb-1">Tanggal Pinjam</label>
            <input type="date" name="tgl_pinjam" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Lama Pinjam (hari)</label>
            <input type="number" name="lama_pinjam" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Denda (Opsional)</label>
            <select name="id_denda" class="w-full border p-2 rounded">
                <option value="">-</option>
                @foreach ($denda as $d)
                    <option value="{{ $d->id }}">{{ number_format($d->nominal, 0) }}</option>
                @endforeach
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </div>
    </form>
</div>
@endsection
