<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();

        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('siswa.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:siswa,nis',
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
            'no_hp' => 'nullable|numeric',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas_id,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show(Siswa $siswa)
    {
        $siswa->load('kelas');

        return view('siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('siswa.edit', compact('siswa', 'kelas'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:siswa,nis,' . $siswa->id,
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
            'no_hp' => 'nullable|numeric',
        ]);

        $siswa->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas_id,
            'no_hp' => $request->no_hp,
        ]);

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}