@extends('layouts.app')
@section('title', 'Edit Siswa - SISFO Akademik')
@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Edit Siswa
    </h1>

    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i>
        Kembali
    </a>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Siswa
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

        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">

            @csrf
            @method('PUT')

            {{-- NIS --}}
            <div class="form-group">

                <label for="nis">
                    NIS
                </label>

                <input type="text"
                       name="nis"
                       id="nis"
                       class="form-control"
                       value="{{ old('nis', $siswa->nis) }}"
                       placeholder="Masukkan NIS"
                       inputmode="numeric"
                       pattern="[0-9]+"
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                       required>

            </div>

            {{-- Nama Siswa --}}
            <div class="form-group">

                <label for="nama_siswa">
                    Nama Siswa
                </label>

                <input type="text"
                       name="nama_siswa"
                       id="nama_siswa"
                       class="form-control"
                       value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                       required>

            </div>

            {{-- Jenis Kelamin --}}
            <div class="form-group">

                <label for="jenis_kelamin">
                    Jenis Kelamin
                </label>

                <select name="jenis_kelamin"
                        id="jenis_kelamin"
                        class="form-control"
                        required>

                    <option value="Laki-Laki"
                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                        Laki-Laki
                    </option>

                    <option value="Perempuan"
                        {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>

                </select>

            </div>

            {{-- Kelas --}}
            <div class="form-group">

                <label for="kelas_id">
                    Kelas
                </label>

                <select name="kelas_id"
                        id="kelas_id"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Kelas --
                    </option>

                    @foreach($kelas as $item)

                        <option value="{{ $item->id }}"
                            {{ old('kelas_id', $siswa->kelas_id) == $item->id ? 'selected' : '' }}>

                            {{ $item->nama_kelas }}

                        </option>

                    @endforeach

                </select>

            </div>

            {{-- No HP --}}
            <div class="form-group">

                <label for="no_hp">
                    No HP
                </label>

                <input type="text"
                       name="no_hp"
                       id="no_hp"
                       class="form-control"
                       value="{{ old('no_hp', $siswa->no_hp) }}"
                       placeholder="Contoh: 081234567890"
                       inputmode="numeric"
                       pattern="[0-9]+"
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')">

            </div>

            <button type="submit" class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan Perubahan

            </button>

            <a href="{{ route('siswa.index') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </form>

    </div>

</div>

@endsection