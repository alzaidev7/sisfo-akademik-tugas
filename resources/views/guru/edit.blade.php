@extends('layouts.app')

@section('title', 'Edit Guru - SISFO Akademik')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">

    <h1 class="h3 mb-0 text-gray-800">
        Edit Guru
    </h1>

    <a href="{{ route('guru.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i>
        Kembali
    </a>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Edit Guru
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

        <form action="{{ route('guru.update', $guru->id) }}" method="POST">

            @csrf
            @method('PUT')

            {{-- NIP --}}
            <div class="form-group">

                <label for="nip">
                    NIP
                </label>

                <input type="text"
                       name="nip"
                       id="nip"
                       class="form-control"
                       value="{{ old('nip', $guru->nip) }}"
                       placeholder="Masukkan NIP"
                       inputmode="numeric"
                       pattern="[0-9]+"
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                       required>

            </div>

            {{-- Nama Guru --}}
            <div class="form-group">

                <label for="nama_guru">
                    Nama Guru
                </label>

                <input type="text"
                       name="nama_guru"
                       id="nama_guru"
                       class="form-control"
                       value="{{ old('nama_guru', $guru->nama_guru) }}"
                       placeholder="Masukkan nama guru"
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
                        {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                        Laki-Laki
                    </option>

                    <option value="Perempuan"
                        {{ old('jenis_kelamin', $guru->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>

                </select>

            </div>

            {{-- Email --}}
            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input type="email"
                       name="email"
                       id="email"
                       class="form-control"
                       value="{{ old('email', $guru->email) }}"
                       placeholder="Contoh: guru@sekolah.sch.id">

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
                       value="{{ old('no_hp', $guru->no_hp) }}"
                       placeholder="Contoh: 081234567890"
                       inputmode="numeric"
                       pattern="[0-9]+"
                       oninput="this.value = this.value.replace(/[^0-9]/g, '')">

            </div>

            <button type="submit" class="btn btn-primary">

                <i class="fas fa-save"></i>
                Simpan Perubahan

            </button>

            <a href="{{ route('guru.index') }}"
               class="btn btn-secondary">

                Batal

            </a>

        </form>

    </div>

</div>

@endsection