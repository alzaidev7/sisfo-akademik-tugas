
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'SISFO Akademik')</title>

    {{-- Font Awesome --}}
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}"
          rel="stylesheet">

    {{-- SB Admin 2 --}}
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}"
          rel="stylesheet">

    @stack('styles')

    <style>
        /* =====================================
           MOBILE SIDEBAR
           ===================================== */
        @media (max-width: 767.98px) {
            #accordionSidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: -280px;
                width: 14rem !important;
                height: 100vh;
                z-index: 1050;
                overflow-y: auto;
                transition: left 0.25s ease;
            }

            #accordionSidebar.mobile-open {
                left: 0;
            }

            #content-wrapper {
                width: 100% !important;
                margin-left: 0 !important;
            }

            .topbar {
                position: relative;
                z-index: 1040;
            }

            #sidebarOverlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.35);
                z-index: 1045;
            }

            #sidebarOverlay.show {
                display: block;
            }
        }

        /* =====================================
           DESKTOP
           ===================================== */
        @media (min-width: 768px) {
            #sidebarOverlay {
                display: none !important;
            }
        }
    </style>
</head>

<body id="page-top">

    {{-- Wrapper --}}
    <div id="wrapper">

        {{-- Sidebar --}}
        @include('partials.sidebar')

        {{-- Overlay Mobile --}}
        <div id="sidebarOverlay"></div>

        {{-- Content Wrapper --}}
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                {{-- Navbar --}}
                @include('partials.navbar')

                {{-- Isi Halaman --}}
                <div class="container-fluid">

                    {{-- Notifikasi sukses global --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show"
                             role="alert">
                            <i class="fas fa-check-circle mr-2"></i>
                            {{ session('success') }}

                            <button type="button"
                                    class="close"
                                    data-dismiss="alert"
                                    aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    {{-- Notifikasi error global --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show"
                             role="alert">
                            <strong>
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                Ada data yang perlu diperbaiki.
                            </strong>

                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                            <button type="button"
                                    class="close"
                                    data-dismiss="alert"
                                    aria-label="Tutup">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>

            {{-- Footer --}}
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>
                            SISFO Akademik &copy; {{ date('Y') }}
                        </span>
                    </div>
                </div>
            </footer>

        </div>
    </div>

    {{-- Scroll To Top --}}
    <a class="scroll-to-top rounded" href="#page-top"
       aria-label="Kembali ke atas">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- Logout Modal --}}
    <div class="modal fade"
         id="logoutModal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="logoutModalLabel"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered"
             role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">
                        <i class="fas fa-sign-out-alt text-danger mr-2"></i>
                        Konfirmasi Logout
                    </h5>

                    <button class="close"
                            type="button"
                            data-dismiss="modal"
                            aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    Apakah kamu yakin ingin keluar dari SISFO Akademik?
                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal">
                        Batal
                    </button>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button class="btn btn-danger" type="submit">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Logout
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- jQuery --}}
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

    {{-- Bootstrap --}}
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- jQuery Easing --}}
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    {{-- SB Admin 2 --}}
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

    @stack('scripts')

    {{-- Mobile Sidebar --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const button = document.getElementById('mobileSidebarToggle');
            const sidebar = document.getElementById('accordionSidebar');
            const overlay = document.getElementById('sidebarOverlay');

            if (!button || !sidebar) {
                return;
            }

            // Buka atau tutup sidebar melalui tombol hamburger.
            button.addEventListener('click', function () {
                sidebar.classList.toggle('mobile-open');

                if (overlay) {
                    overlay.classList.toggle('show');
                }
            });

            // Tutup sidebar saat area luar diklik.
            if (overlay) {
                overlay.addEventListener('click', function () {
                    sidebar.classList.remove('mobile-open');
                    overlay.classList.remove('show');
                });
            }

            // Tutup sidebar setelah menu dipilih di HP.
            sidebar.addEventListener('click', function (event) {
                const link = event.target.closest('a.nav-link');

                if (link && window.innerWidth < 768) {
                    sidebar.classList.remove('mobile-open');

                    if (overlay) {
                        overlay.classList.remove('show');
                    }
                }
            });

            // Bersihkan mode mobile saat layar menjadi desktop.
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('mobile-open');

                    if (overlay) {
                        overlay.classList.remove('show');
                    }
                }
            });
        });
    </script>

</body>
</html>
