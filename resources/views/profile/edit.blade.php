
@extends('layouts.app')

@section('title', 'Pengaturan Akun - SISFO Akademik')

@section('content')

<div class="container-fluid">

    {{-- Page Heading --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Pengaturan Akun</h1>
            <p class="mb-0 text-muted">
                Kelola informasi profil dan keamanan akun kamu.
            </p>
        </div>
    </div>

    {{-- Informasi Profil --}}
    <div class="row">

        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4 border-left-primary">

                <div class="card-body text-center py-5">

                    <div class="mb-3">
                        <div class="rounded-circle bg-primary d-inline-flex
                                    align-items-center justify-content-center"
                             style="width: 90px; height: 90px;">
                            <i class="fas fa-user fa-3x text-white"></i>
                        </div>
                    </div>

                    <h5 class="font-weight-bold text-gray-800 mb-1">
                        {{ $user->name }}
                    </h5>

                    <p class="text-muted mb-3">
                        {{ $user->email }}
                    </p>

                    <span class="badge badge-primary px-3 py-2">
                        <i class="fas fa-shield-alt mr-1"></i>
                        Pengguna Terdaftar
                    </span>

                    <hr>

                    <div class="text-left">
                        <p class="small text-muted mb-2">
                            <i class="fas fa-info-circle mr-2"></i>
                            Informasi Akun
                        </p>

                        <p class="small mb-2">
                            <strong>ID Pengguna:</strong>
                            {{ $user->id }}
                        </p>

                        <p class="small mb-0">
                            <strong>Terdaftar:</strong>
                            {{ $user->created_at
                                ? $user->created_at->format('d/m/Y')
                                : '-' }}
                        </p>
                    </div>

                </div>
            </div>
        </div>

        {{-- Form Pengaturan --}}
        <div class="col-lg-8 mb-4">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-user-edit mr-2"></i>
                        Informasi Pribadi
                    </h6>
                </div>

                <div class="card-body">

                    <form action="{{ route('profile.update') }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        {{-- Nama --}}
                        <div class="form-group">
                            <label for="name">
                                Nama Lengkap
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', $user->name) }}"
                                   maxlength="255"
                                   autocomplete="name"
                                   placeholder="Masukkan nama lengkap"
                                   required>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label for="email">
                                Alamat Email
                                <span class="text-danger">*</span>
                            </label>

                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', $user->email) }}"
                                   maxlength="255"
                                   autocomplete="email"
                                   placeholder="nama@email.com"
                                   required>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                            <small class="form-text text-muted">
                                Email harus unik dan belum digunakan akun lain.
                            </small>
                        </div>

                        <hr class="my-4">

                        {{-- Judul Keamanan --}}
                        <h6 class="font-weight-bold text-gray-800 mb-3">
                            <i class="fas fa-lock mr-2 text-primary"></i>
                            Keamanan Akun
                        </h6>

                        <div class="alert alert-info small">
                            <i class="fas fa-info-circle mr-1"></i>
                            Kosongkan kedua kolom password jika kamu tidak
                            ingin mengganti password saat ini.
                        </div>

                        {{-- Password Baru --}}
                        <div class="form-group">
                            <label for="password">
                                Password Baru
                            </label>

                            <div class="input-group">
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       minlength="8"
                                       autocomplete="new-password"
                                       placeholder="Minimal 8 karakter">

                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary"
                                            type="button"
                                            data-toggle-password="password"
                                            aria-label="Tampilkan password baru">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <small class="form-text text-muted">
                                Gunakan minimal 8 karakter.
                            </small>
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="form-group">
                            <label for="password_confirmation">
                                Konfirmasi Password Baru
                            </label>

                            <div class="input-group">
                                <input type="password"
                                       class="form-control"
                                       id="password_confirmation"
                                       name="password_confirmation"
                                       minlength="8"
                                       autocomplete="new-password"
                                       placeholder="Ulangi password baru">

                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary"
                                            type="button"
                                            data-toggle-password="password_confirmation"
                                            aria-label="Tampilkan konfirmasi password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        {{-- Tombol --}}
                        <div class="d-flex flex-wrap justify-content-between">

                            <a href="{{ route('dashboard') }}"
                               class="btn btn-secondary mb-2">
                                <i class="fas fa-arrow-left mr-1"></i>
                                Kembali
                            </a>

                            <button type="submit"
                                    class="btn btn-primary mb-2">
                                <i class="fas fa-save mr-1"></i>
                                Simpan Perubahan
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const toggleButtons = document.querySelectorAll(
        '[data-toggle-password]'
    );

    toggleButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            const inputId = button.getAttribute(
                'data-toggle-password'
            );

            const input = document.getElementById(inputId);
            const icon = button.querySelector('i');

            if (!input || !icon) {
                return;
            }

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
                button.setAttribute(
                    'aria-label',
                    'Sembunyikan password'
                );
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
                button.setAttribute(
                    'aria-label',
                    'Tampilkan password'
                );
            }

        });

    });

});
</script>
@endpush
