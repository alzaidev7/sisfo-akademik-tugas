@extends('layouts.app')

@section('title', 'Edit Mata Pelajaran - SISFO Akademik')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Edit Mata Pelajaran
    </h1>

    <a href="{{ route('mapel.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i>
        Kembali
    </a>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Mata Pelajaran
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

        <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="kode_mapel">
                    Kode Mata Pelajaran
                </label>

                <input type="text"
                       name="kode_mapel"
                       id="kode_mapel"
                       class="form-control"
                       value="{{ old('kode_mapel', $mapel->kode_mapel) }}"
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
                       value="{{ old('nama_mapel', $mapel->nama_mapel) }}"
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
                       value="{{ old('kkm', $mapel->kkm) }}"
                       min="0"
                       max="100"
                       required>

            </div>

            <button type="submit" class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan Perubahan

            </button>

            <a href="{{ route('mapel.index') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </form>

    </div>

</div>

@endsection