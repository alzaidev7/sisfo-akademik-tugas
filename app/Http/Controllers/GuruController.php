<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();

        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|numeric|unique:guru,nip',
            'nama_guru' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'nullable|numeric',
            'email' => 'nullable|email',
        ]);

        Guru::create([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip' => 'required|numeric|unique:guru,nip,' . $guru->id,
            'nama_guru' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'nullable|numeric',
            'email' => 'nullable|email',
        ]);

        $guru->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()->route('guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}