@extends('layouts.app')

@section('title', 'Tambah Mata Pelajaran - SISFO Akademik')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Tambah Mata Pelajaran
    </h1>

    <a href="{{ route('mapel.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i>
        Kembali
    </a>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">
            Form Tambah Mata Pelajaran
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

        <form action="{{ route('mapel.store') }}" method="POST">

            @csrf

            <div class="form-group">

                <label for="kode_mapel">
                    Kode Mata Pelajaran
                </label>

                <input type="text"
                       name="kode_mapel"
                       id="kode_mapel"
                       class="form-control"
                       value="{{ old('kode_mapel') }}"
                       placeholder="Contoh: PWP"
                       required>

            </div>

            <div class="form-group">

                <label for="nama_mapel">
                    Nama Mata Pelajaran
                </label>

                <input type="text"
                       name="nama_mapel"
                       id="nama_mapel"
                       class="form-control"
                       value="{{ old('nama_mapel') }}"
                       placeholder="Contoh: Pemrograman Web"
                       required>

            </div>

            <div class="form-group">

                <label for="kkm">
                    KKM Minimum
                </label>

                <input type="number"
                       name="kkm"
                       id="kkm"
                       class="form-control"
                       value="{{ old('kkm') }}"
                       placeholder="Contoh: 75"
                       min="0"
                       max="100"
                       required>

            </div>

            <button type="submit" class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan

            </button>

            <a href="{{ route('mapel.index') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </form>

    </div>

</div>

@endsection