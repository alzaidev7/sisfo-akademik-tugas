
@extends('layouts.guest')

@section('title', 'Login - SISFO Akademik')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
    :root {
        --sa-ink: #0f1b3d;
        --sa-ink-soft: #1b2b5c;
        --sa-paper: #f6f7fb;
        --sa-pencil: #f5b700;
        --sa-margin: #ff6b6b;
        --sa-text: #1c2540;
        --sa-muted: #6b7694;
        --sa-line: #dfe3ee;
        --sa-blue: #3a5bd9;
        --sa-grid: 40px;
    }

    * {
        box-sizing: border-box;
    }

    .sa-login {
        position: fixed;
        inset: 0;
        z-index: 1050;
        display: grid;
        grid-template-columns: 1.05fr 1fr;
        overflow-y: auto;
        background: var(--sa-paper);
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, 'Segoe UI', sans-serif;
        color: var(--sa-text);
        -webkit-overflow-scrolling: touch;
    }

    /* =====================================
       PANEL KIRI - BUKU TULIS
       ===================================== */

    .sa-side {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        min-width: 0;
        padding: 40px 56px 40px 104px;
        overflow: hidden;
        color: #fff;
        background-color: var(--sa-ink);
        background-image:
            linear-gradient(
                to right,
                transparent 63px,
                rgba(255, 107, 107, .55) 63px,
                rgba(255, 107, 107, .55) 65px,
                transparent 65px
            ),
            repeating-linear-gradient(
                to bottom,
                transparent 0,
                transparent calc(var(--sa-grid) - 1px),
                rgba(255, 255, 255, .07) calc(var(--sa-grid) - 1px),
                rgba(255, 255, 255, .07) var(--sa-grid)
            );
    }

    .sa-side::after {
        content: '';
        position: absolute;
        width: 230px;
        height: 230px;
        right: -105px;
        top: 20%;
        border: 1px solid rgba(245, 183, 0, .14);
        border-radius: 50%;
        box-shadow:
            0 0 0 22px rgba(245, 183, 0, .025),
            0 0 0 44px rgba(245, 183, 0, .025);
        pointer-events: none;
    }

    .sa-brand {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 12px;
        min-height: 40px;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-weight: 700;
        font-size: 1.1rem;
        letter-spacing: -.3px;
    }

    .sa-brand-mark {
        display: inline-flex;
        flex: 0 0 40px;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: var(--sa-pencil);
        color: var(--sa-ink);
        font-size: 1.05rem;
        transform: rotate(-5deg);
        box-shadow: 0 5px 14px rgba(0, 0, 0, .14);
    }

    .sa-brand-name {
        line-height: 1.2;
    }

    .sa-hero {
        position: relative;
        z-index: 1;
        margin: 35px 0;
    }

    .sa-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 18px;
        color: var(--sa-pencil);
        font-size: .75rem;
        font-weight: 700;
        letter-spacing: 1.8px;
        text-transform: uppercase;
    }

    .sa-eyebrow::before {
        content: '';
        width: 22px;
        height: 2px;
        background: var(--sa-pencil);
    }

    .sa-hero-title {
        margin: 0;
        font-family: 'Bricolage Grotesque', sans-serif;
        font-weight: 800;
        font-size: clamp(2rem, 3.2vw, 3rem);
        line-height: 1.3;
        letter-spacing: -1.4px;
    }

    .sa-hero-title span {
        display: block;
    }

    .sa-hero-title .sa-highlight {
        color: var(--sa-pencil);
    }

    .sa-hero-description {
        max-width: 360px;
        margin: 20px 0 0;
        color: rgba(255, 255, 255, .68);
        font-size: .92rem;
        line-height: 1.8;
    }

    .sa-points {
        display: grid;
        gap: 14px;
        list-style: none;
        margin: 30px 0 0;
        padding: 0;
    }

    .sa-points li {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: .88rem;
        color: rgba(255, 255, 255, .82);
    }

    .sa-point-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 32px;
        width: 32px;
        height: 32px;
        border: 1px solid rgba(245, 183, 0, .25);
        border-radius: 9px;
        color: var(--sa-pencil);
        background: rgba(245, 183, 0, .07);
    }

    .sa-side-foot {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: .78rem;
        color: rgba(255, 255, 255, .48);
    }

    .sa-foot-dot {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: var(--sa-pencil);
    }

    /* =====================================
       PANEL FORM LOGIN
       ===================================== */

    .sa-main {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 0;
        padding: 40px 28px;
    }

    .sa-form-wrap {
        width: 100%;
        max-width: 410px;
        animation: saEnter .5s ease both;
    }

    .sa-mobile-brand {
        display: none;
    }

    .sa-title {
        margin: 0 0 6px;
        color: var(--sa-ink);
        font-family: 'Bricolage Grotesque', sans-serif;
        font-size: 2.15rem;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .sa-sub {
        margin: 0 0 28px;
        color: var(--sa-muted);
        font-size: .95rem;
        line-height: 1.7;
    }

    .sa-alert {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 20px;
        padding: 13px 14px;
        border-radius: 12px;
        font-size: .88rem;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .sa-alert i {
        margin-top: 3px;
    }

    .sa-alert-error {
        border: 1px solid #ffd3cf;
        background: #fff1f0;
        color: #b42318;
    }

    .sa-alert-success {
        border: 1px solid #c3efd6;
        background: #ecfdf3;
        color: #067647;
    }

    .sa-field {
        margin-bottom: 20px;
    }

    .sa-label {
        display: block;
        margin-bottom: 9px;
        color: var(--sa-text);
        font-size: .88rem;
        font-weight: 600;
    }

    .sa-control {
        position: relative;
    }

    .sa-control > .sa-icon {
        position: absolute;
        top: 50%;
        left: 16px;
        z-index: 1;
        transform: translateY(-50%);
        color: #98a1bb;
        font-size: .95rem;
        pointer-events: none;
        transition: color .2s;
    }

    .sa-input {
        display: block;
        width: 100%;
        height: 56px;
        padding: 0 16px 0 46px;
        border: 1.5px solid var(--sa-line);
        border-radius: 14px;
        background: #fff;
        color: var(--sa-text);
        font-family: inherit;
        font-size: .95rem;
        transition: border-color .2s, box-shadow .2s;
    }

    .sa-input::placeholder {
        color: #a7afc5;
    }

    .sa-input:focus {
        outline: none;
        border-color: var(--sa-blue);
        box-shadow: 0 0 0 4px rgba(58, 91, 217, .14);
    }

    .sa-control:focus-within > .sa-icon {
        color: var(--sa-blue);
    }

    .sa-input.has-toggle {
        padding-right: 52px;
    }

    .sa-toggle {
        position: absolute;
        top: 50%;
        right: 6px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transform: translateY(-50%);
        width: 42px;
        height: 42px;
        border: 0;
        border-radius: 10px;
        background: transparent;
        color: #7c86a3;
        cursor: pointer;
    }

    .sa-toggle:hover {
        background: #eef1f8;
    }

    .sa-toggle:focus-visible {
        outline: 2px solid var(--sa-blue);
        outline-offset: 1px;
    }

    .sa-caps {
        display: none;
        margin-top: 8px;
        color: #b54708;
        font-size: .8rem;
    }

    .sa-caps.show {
        display: block;
    }

    .sa-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin: 4px 0 24px;
    }

    .sa-check {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin: 0;
        color: var(--sa-muted);
        font-size: .88rem;
        cursor: pointer;
        user-select: none;
    }

    .sa-check input {
        width: 18px;
        height: 18px;
        margin: 0;
        accent-color: var(--sa-blue);
        cursor: pointer;
    }

    .sa-secure {
        color: var(--sa-muted);
        font-size: .8rem;
        white-space: nowrap;
    }

    .sa-button {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        min-height: 56px;
        padding: 12px 18px;
        border: 0;
        border-radius: 14px;
        background: var(--sa-ink);
        color: #fff;
        font-family: inherit;
        font-size: .98rem;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 10px 24px rgba(15, 27, 61, .18);
        transition: transform .2s, box-shadow .2s, background .2s;
    }

    .sa-button:hover {
        background: var(--sa-ink-soft);
        transform: translateY(-1px);
        box-shadow: 0 14px 28px rgba(15, 27, 61, .24);
    }

    .sa-button:focus-visible {
        outline: 3px solid rgba(58, 91, 217, .4);
        outline-offset: 2px;
    }

    .sa-button:disabled {
        opacity: .8;
        cursor: wait;
        transform: none;
    }

    .sa-foot {
        margin: 28px 0 0;
        padding-top: 20px;
        border-top: 1px solid var(--sa-line);
        color: var(--sa-muted);
        text-align: center;
        font-size: .8rem;
        line-height: 1.7;
    }

    @keyframes saEnter {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* =====================================
       TABLET
       ===================================== */

    @media (max-width: 991px) {
        .sa-login {
            grid-template-columns: 1fr;
            grid-template-rows: auto 1fr;
        }

        .sa-side {
            gap: 0;
            padding: 22px 24px 24px 56px;
            background-image:
                linear-gradient(
                    to right,
                    transparent 31px,
                    rgba(255, 107, 107, .55) 31px,
                    rgba(255, 107, 107, .55) 33px,
                    transparent 33px
                ),
                repeating-linear-gradient(
                    to bottom,
                    transparent 0,
                    transparent calc(34px - 1px),
                    rgba(255, 255, 255, .07) calc(34px - 1px),
                    rgba(255, 255, 255, .07) 34px
                );
        }

        .sa-side::after {
            width: 150px;
            height: 150px;
            top: 0;
            right: -75px;
        }

        .sa-brand {
            gap: 11px;
            min-height: 38px;
            font-size: 1.02rem;
        }

        .sa-brand-mark {
            flex-basis: 38px;
            width: 38px;
            height: 38px;
            border-radius: 11px;
        }

        .sa-hero {
            margin: 20px 0 0;
        }

        .sa-eyebrow {
            margin-bottom: 8px;
            font-size: .65rem;
            letter-spacing: 1.4px;
        }

        .sa-hero-title {
            max-width: 500px;
            font-size: 1.75rem;
            line-height: 1.3;
            letter-spacing: -.7px;
        }

        .sa-hero-title span {
            display: inline;
        }

        .sa-hero-title span + span::before {
            content: ' ';
        }

        .sa-hero-title .sa-highlight {
            color: var(--sa-pencil);
        }

        .sa-hero-description,
        .sa-points,
        .sa-side-foot {
            display: none;
        }

        .sa-main {
            align-items: flex-start;
            padding: 30px 22px 36px;
        }

        .sa-form-wrap {
            max-width: 500px;
            margin: 0 auto;
        }

        .sa-title {
            font-size: 2rem;
        }

        .sa-sub {
            margin-bottom: 24px;
        }
    }

    /* =====================================
       HP KECIL
       ===================================== */

    @media (max-width: 480px) {
        .sa-side {
            padding: 18px 18px 20px 43px;
            background-image:
                linear-gradient(
                    to right,
                    transparent 24px,
                    rgba(255, 107, 107, .55) 24px,
                    rgba(255, 107, 107, .55) 26px,
                    transparent 26px
                ),
                repeating-linear-gradient(
                    to bottom,
                    transparent 0,
                    transparent calc(32px - 1px),
                    rgba(255, 255, 255, .07) calc(32px - 1px),
                    rgba(255, 255, 255, .07) 32px
                );
        }

        .sa-side::after {
            width: 100px;
            height: 100px;
            right: -55px;
            top: 10px;
            box-shadow:
                0 0 0 14px rgba(245, 183, 0, .025),
                0 0 0 28px rgba(245, 183, 0, .025);
        }

        .sa-brand {
            gap: 10px;
            font-size: .98rem;
        }

        .sa-brand-mark {
            flex-basis: 36px;
            width: 36px;
            height: 36px;
            font-size: .95rem;
        }

        .sa-hero {
            margin-top: 17px;
        }

        .sa-eyebrow {
            margin-bottom: 6px;
            font-size: .61rem;
            letter-spacing: 1.2px;
        }

        .sa-hero-title {
            max-width: 340px;
            font-size: clamp(1.35rem, 5.5vw, 1.65rem);
            line-height: 1.35;
            letter-spacing: -.55px;
        }

        .sa-main {
            padding: 25px 20px 30px;
        }

        .sa-title {
            font-size: 1.85rem;
        }

        .sa-sub {
            margin-bottom: 22px;
            font-size: .88rem;
        }

        .sa-field {
            margin-bottom: 18px;
        }

        .sa-input {
            height: 54px;
            font-size: .92rem;
        }

        .sa-row {
            margin-bottom: 22px;
        }

        .sa-check {
            gap: 8px;
            font-size: .82rem;
        }

        .sa-secure {
            font-size: .73rem;
        }

        .sa-button {
            min-height: 54px;
            font-size: .92rem;
        }

        .sa-foot {
            margin-top: 24px;
            padding-top: 17px;
            font-size: .76rem;
        }
    }

    @media (max-width: 350px) {
        .sa-side {
            padding-left: 36px;
            padding-right: 14px;
        }

        .sa-hero-title {
            font-size: 1.25rem;
        }

        .sa-main {
            padding-right: 16px;
            padding-left: 16px;
        }

        .sa-secure {
            font-size: .68rem;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .sa-form-wrap {
            animation: none;
        }

        .sa-input,
        .sa-button,
        .sa-control > .sa-icon {
            transition: none;
        }
    }
</style>

<div class="sa-login">

    {{-- HEADER / HERO --}}
    <aside class="sa-side">

        <div class="sa-brand">
            <span class="sa-brand-mark">
                <i class="fas fa-graduation-cap"></i>
            </span>

            <span class="sa-brand-name">
                SISFO Akademik
            </span>
        </div>

        <div class="sa-hero">

            <div class="sa-eyebrow">
                Sistem Informasi Akademik
            </div>

            <h2 class="sa-hero-title">
                <span>Kelola data siswa, guru, kelas, mata pelajaran, dan</span>
                <span class="sa-highlight">nilai dalam satu sistem.</span>
            </h2>

            <p class="sa-hero-description">
                Satu tempat untuk mendukung pengelolaan informasi akademik
                dengan lebih mudah dan terorganisir.
            </p>

            <ul class="sa-points">
                <li>
                    <span class="sa-point-icon">
                        <i class="fas fa-pen"></i>
                    </span>
                    Input dan lihat nilai
                </li>

                <li>
                    <span class="sa-point-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </span>
                    Informasi jadwal pelajaran
                </li>

                <li>
                    <span class="sa-point-icon">
                        <i class="fas fa-user-check"></i>
                    </span>
                    Pengelolaan data akademik
                </li>
            </ul>
        </div>

        <div class="sa-side-foot">
            <span class="sa-foot-dot"></span>
            &copy; {{ date('Y') }} SISFO Akademik
        </div>

    </aside>

    {{-- FORM LOGIN --}}
    <main class="sa-main">

        <div class="sa-form-wrap">

            <h1 class="sa-title">Masuk</h1>

            <p class="sa-sub">
                Pakai akun sekolah kamu untuk melanjutkan.
            </p>

            {{-- Notifikasi sukses --}}
            @if (session('success'))
                <div class="sa-alert sa-alert-success" role="status">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            {{-- Notifikasi error --}}
            @if ($errors->any())
                <div class="sa-alert sa-alert-error" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            @endif

            <form id="loginForm"
                  action="{{ route('login.store') }}"
                  method="POST">

                @csrf

                {{-- EMAIL --}}
                <div class="sa-field">

                    <label class="sa-label" for="email">
                        Email
                    </label>

                    <div class="sa-control">

                        <i class="fas fa-envelope sa-icon"></i>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="sa-input"
                            value="{{ old('email') }}"
                            placeholder="nama@sekolah.sch.id"
                            autocomplete="username"
                            maxlength="255"
                            required
                            autofocus
                        >

                    </div>
                </div>

                {{-- PASSWORD --}}
                <div class="sa-field">

                    <label class="sa-label" for="password">
                        Password
                    </label>

                    <div class="sa-control">

                        <i class="fas fa-lock sa-icon"></i>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="sa-input has-toggle"
                            placeholder="Masukkan password"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="sa-toggle"
                            id="togglePassword"
                            aria-label="Tampilkan password"
                            aria-pressed="false"
                        >
                            <i class="fas fa-eye" id="passwordIcon"></i>
                        </button>

                    </div>

                    <div class="sa-caps" id="capsHint" role="status">
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        Caps Lock sedang aktif.
                    </div>

                </div>

                {{-- OPSI LOGIN --}}
                <div class="sa-row">

                    <label class="sa-check" for="remember">

                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            value="1"
                        >

                        Ingat saya

                    </label>

                    <span class="sa-secure">
                        <i class="fas fa-shield-alt mr-1"></i>
                        Koneksi aman
                    </span>

                </div>

                {{-- TOMBOL LOGIN --}}
                <button
                    type="submit"
                    class="sa-button"
                    id="loginButton"
                >
                    <span id="loginButtonContent">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk ke dashboard
                    </span>
                </button>

            </form>

            <p class="sa-foot">
                Akses hanya untuk pengguna terdaftar.
                Lupa password? Hubungi admin sekolah.
            </p>

        </div>

    </main>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('loginForm');
    const button = document.getElementById('loginButton');
    const buttonContent = document.getElementById('loginButtonContent');

    const passwordInput = document.getElementById('password');
    const toggleButton = document.getElementById('togglePassword');
    const passwordIcon = document.getElementById('passwordIcon');
    const capsHint = document.getElementById('capsHint');

    // Tampilkan atau sembunyikan password.
    toggleButton.addEventListener('click', function () {

        const show = passwordInput.type === 'password';

        passwordInput.type = show ? 'text' : 'password';

        passwordIcon.className = show
            ? 'fas fa-eye-slash'
            : 'fas fa-eye';

        toggleButton.setAttribute('aria-pressed', String(show));

        toggleButton.setAttribute(
            'aria-label',
            show ? 'Sembunyikan password' : 'Tampilkan password'
        );

        passwordInput.focus();
    });

    // Peringatan Caps Lock.
    function checkCaps(event) {

        if (typeof event.getModifierState !== 'function') {
            return;
        }

        capsHint.classList.toggle(
            'show',
            event.getModifierState('CapsLock')
        );
    }

    passwordInput.addEventListener('keydown', checkCaps);
    passwordInput.addEventListener('keyup', checkCaps);

    passwordInput.addEventListener('blur', function () {
        capsHint.classList.remove('show');
    });

    // Validasi form dan cegah klik ganda.
    form.addEventListener('submit', function (event) {

        if (!form.checkValidity()) {
            event.preventDefault();
            form.reportValidity();
            return;
        }

        button.disabled = true;

        buttonContent.innerHTML =
            '<i class="fas fa-spinner fa-spin mr-2"></i>' +
            'Memproses login...';
    });

});
</script>

@endsection
