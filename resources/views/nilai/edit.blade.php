@extends('layouts.app')

@section('title', 'Edit Nilai - SISFO Akademik')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Edit Nilai Siswa
    </h1>

    <a href="{{ route('nilai.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i>
        Kembali
    </a>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Nilai
        </h6>
    </div>

    <div class="card-body">

        @if ($errors->any())

            <div class="alert alert-danger">

                <strong>Terjadi kesalahan:</strong>

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('nilai.update', $nilai->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="siswa_id">Siswa</label>

                <select name="siswa_id"
                        id="siswa_id"
                        class="form-control"
                        required>

                    @foreach ($siswa as $item)

                        <option value="{{ $item->id }}"
                            {{ old('siswa_id', $nilai->siswa_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->nis }} - {{ $item->nama_siswa }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">
                <label for="mapel_id">Mata Pelajaran</label>

                <select name="mapel_id"
                        id="mapel_id"
                        class="form-control"
                        required>

                    @foreach ($mapel as $item)

                        <option value="{{ $item->id }}"
                            {{ old('mapel_id', $nilai->mapel_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->kode_mapel }} - {{ $item->nama_mapel }}
                            (KKM: {{ $item->kkm }})

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="form-group">
                <label for="guru_id">Guru</label>

                <select name="guru_id"
                        id="guru_id"
                        class="form-control"
                        required>

                    @foreach ($guru as $item)

                        <option value="{{ $item->id }}"
                            {{ old('guru_id', $nilai->guru_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_guru }}

                        </option>

                    @endforeach

                </select>

            </div>

            <hr>

            <h6 class="font-weight-bold text-primary mb-3">
                Nilai
            </h6>

            <div class="form-group">
                <label for="tugas">
                    Nilai Tugas
                    <small class="text-muted">(30%)</small>
                </label>

                <input type="number"
                       name="tugas"
                       id="tugas"
                       class="form-control"
                       value="{{ old('tugas', $nilai->tugas) }}"
                       min="0"
                       max="100"
                       step="0.01"
                       required>
            </div>

            <div class="form-group">
                <label for="uts">
                    Nilai UTS
                    <small class="text-muted">(30%)</small>
                </label>

                <input type="number"
                       name="uts"
                       id="uts"
                       class="form-control"
                       value="{{ old('uts', $nilai->uts) }}"
                       min="0"
                       max="100"
                       step="0.01"
                       required>
            </div>

            <div class="form-group">
                <label for="uas">
                    Nilai UAS
                    <small class="text-muted">(40%)</small>
                </label>

                <input type="number"
                       name="uas"
                       id="uas"
                       class="form-control"
                       value="{{ old('uas', $nilai->uas) }}"
                       min="0"
                       max="100"
                       step="0.01"
                       required>
            </div>

            <div class="alert alert-info">

                <strong>Nilai Akhir saat ini:</strong>

                {{ number_format($nilai->nilai_akhir, 2) }}

                <br>

                <small>
                    Nilai Akhir akan dihitung ulang otomatis setelah disimpan.
                </small>

            </div>

            <button type="submit" class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan Perubahan

            </button>

            <a href="{{ route('nilai.index') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </form>

    </div>

</div>

@endsection