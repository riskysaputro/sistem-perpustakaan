<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $anggotas = Anggota::all();
        return view('Admin/Anggota/Index',compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email',
            'tgl_lahir' => 'required|date',
            'tgl_daftar' => 'required|date',
        ]);
         Anggota::create($request->all());
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $anggota)
    {
        return response()->json($anggota);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email',
            'tgl_lahir' => 'required|date',
            'tgl_daftar' => 'required|date',
        ]);
        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->only( 'nama', 'alamat', 'no_hp', 'email', 'tgl_lahir', 'tgl_daftar'));
        return redirect()->back()->with('success', 'Data anggota diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota dihapus');
    }
}