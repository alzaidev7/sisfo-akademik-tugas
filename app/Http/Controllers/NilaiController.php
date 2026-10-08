<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Guru;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['siswa', 'mapel', 'guru'])->get();

        return view('nilai.index', compact('nilai'));
    }

    public function create()
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();
        $mapel = Mapel::orderBy('nama_mapel')->get();
        $guru = Guru::orderBy('nama_guru')->get();

        return view('nilai.create', compact('siswa', 'mapel', 'guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => 'required|exists:mapel,id',
            'guru_id' => 'required|exists:guru,id',
            'tugas' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);

        $nilaiAkhir =
            ($request->tugas * 0.30) +
            ($request->uts * 0.30) +
            ($request->uas * 0.40);

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'nilai_akhir' => $nilaiAkhir,
        ]);

        return redirect()
            ->route('nilai.index')
            ->with('success', 'Nilai siswa berhasil ditambahkan.');
    }

    public function show(Nilai $nilai)
    {
        $nilai->load(['siswa', 'mapel', 'guru']);

        return view('nilai.show', compact('nilai'));
    }

    public function edit(Nilai $nilai)
    {
        $siswa = Siswa::orderBy('nama_siswa')->get();
        $mapel = Mapel::orderBy('nama_mapel')->get();
        $guru = Guru::orderBy('nama_guru')->get();

        return view('nilai.edit', compact(
            'nilai',
            'siswa',
            'mapel',
            'guru'
        ));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'mapel_id' => 'required|exists:mapel,id',
            'guru_id' => 'required|exists:guru,id',
            'tugas' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);

        $nilaiAkhir =
            ($request->tugas * 0.30) +
            ($request->uts * 0.30) +
            ($request->uas * 0.40);

        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
            'tugas' => $request->tugas,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'nilai_akhir' => $nilaiAkhir,
        ]);

        return redirect()
            ->route('nilai.index')
            ->with('success', 'Nilai siswa berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()
            ->route('nilai.index')
            ->with('success', 'Nilai siswa berhasil dihapus.');
    }
}