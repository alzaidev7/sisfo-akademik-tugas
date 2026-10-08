<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = Mapel::all();

        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'required|unique:mapel,kode_mapel',
            'nama_mapel' => 'required',
            'kkm' => 'required|integer|min:0|max:100',
        ]);

        Mapel::create([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'kkm' => $request->kkm,
        ]);

        return redirect()->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }

    public function show(Mapel $mapel)
    {
        return view('mapel.show', compact('mapel'));
    }

    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        $request->validate([
            'kode_mapel' => 'required|unique:mapel,kode_mapel,' . $mapel->id,
            'nama_mapel' => 'required',
            'kkm' => 'required|integer|min:0|max:100',
        ]);

        $mapel->update([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'kkm' => $request->kkm,
        ]);

        return redirect()->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil diperbarui.');
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();

        return redirect()->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil dihapus.');
    }
}