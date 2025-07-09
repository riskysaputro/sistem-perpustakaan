<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dendas = Denda::all();
        return view('Admin.Denda.Index',compact('dendas'));
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
        $request->validate(['nominal'=>'numeric']);
        Denda::create($request->all());
        return redirect()->back()->with('success','Denda baru berhasil dibuat');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $request->validate(['nominal'=>'numeric']);
         $denda = Denda::findOrFail($id);
        //  dd($request);
        $denda->update($request->only('nominal'));
        return redirect()->back()->with('success','Denda berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $denda = Denda::findOrFail($id);
         $denda->delete();
        return redirect()->route('denda.index')->with('success', 'Denda dihapus');
    }
}
