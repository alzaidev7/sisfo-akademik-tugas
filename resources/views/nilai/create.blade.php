@extends('layouts.app')

@section('title', 'Tambah Nilai - SISFO Akademik')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Tambah Nilai Siswa
    </h1>

    <a href="{{ route('nilai.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i>
        Kembali
    </a>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Tambah Nilai
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

        <form action="{{ route('nilai.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="siswa_id">Siswa</label>

                <select name="siswa_id"
                        id="siswa_id"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Siswa --
                    </option>

                    @foreach ($siswa as $item)

                        <option value="{{ $item->id }}"
                            {{ old('siswa_id') == $item->id ? 'selected' : '' }}>

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

                    <option value="">
                        -- Pilih Mata Pelajaran --
                    </option>

                    @foreach ($mapel as $item)

                        <option value="{{ $item->id }}"
                            {{ old('mapel_id') == $item->id ? 'selected' : '' }}>

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

                    <option value="">
                        -- Pilih Guru --
                    </option>

                    @foreach ($guru as $item)

                        <option value="{{ $item->id }}"
                            {{ old('guru_id') == $item->id ? 'selected' : '' }}>

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
                       value="{{ old('tugas') }}"
                       min="0"
                       max="100"
                       step="0.01"
                       placeholder="0 - 100"
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
                       value="{{ old('uts') }}"
                       min="0"
                       max="100"
                       step="0.01"
                       placeholder="0 - 100"
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
                       value="{{ old('uas') }}"
                       min="0"
                       max="100"
                       step="0.01"
                       placeholder="0 - 100"
                       required>
            </div>

            <div class="alert alert-info">

                <strong>Rumus Nilai Akhir:</strong>

                <br>

                (Tugas × 30%) +
                (UTS × 30%) +
                (UAS × 40%)

                <br><br>

                <strong>Nilai Akhir dihitung otomatis oleh sistem.</strong>

            </div>

            <button type="submit" class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan Nilai

            </button>

            <a href="{{ route('nilai.index') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </form>

    </div>

</div>

@endsection