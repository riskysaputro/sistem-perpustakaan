<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    public function index()
    {
        $kategori = KategoriBuku::all();
        return view('Admin.Kategori.Index', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:100'
        ]);

        KategoriBuku::create($request->only('kategori'));
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan');
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'kategori' => 'required|string|max:100'
    ]);

    $kategoriBuku = KategoriBuku::findOrFail($id);
    $kategoriBuku->update($request->only('kategori'));

    return redirect(route('kategori.index'))->with('success', 'Kategori berhasil diperbarui');
}

public function destroy($id)
{
    $kategoriBuku = KategoriBuku::findOrFail($id);
    $kategoriBuku->delete();

    return redirect(route('kategori.index'))->with('success', 'Kategori berhasil dihapus');
}
}