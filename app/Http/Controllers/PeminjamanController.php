<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Denda;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['anggota', 'user', 'denda'])->get();
        return view('Admin.Peminjaman.Index', compact('peminjaman'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::all();
        $denda = Denda::all();
        return view('Admin.Peminjaman.Create', compact('anggota', 'buku', 'denda'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required',
            'id_user' => 'required',
            'tgl_pinjam' => 'required|date',
            'lama_pinjam' => 'required|integer',
            'id_denda' => 'nullable',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Peminjaman::destroy($id);
        return redirect()->back()->with('success', 'Data peminjaman dihapus');
    }


    public function exportPdf()
{
    $peminjaman = Peminjaman::with(['anggota', 'user', 'denda'])->get();

    $pdf = Pdf::loadView('Admin/Peminjaman.Laporan', compact('peminjaman'));
    return $pdf->download('laporan_peminjaman.pdf');
}

}
