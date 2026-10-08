<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        @yield('title', 'SISFO Akademik')
    </title>


    {{-- Font Awesome --}}
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}"
          rel="stylesheet">


    {{-- SB Admin 2 --}}
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}"
          rel="stylesheet">


    @stack('styles')


    <style>

        /* =====================================
           MOBILE
           ===================================== */

        @media (max-width: 767.98px) {

            /*
             * Sidebar disembunyikan ke kiri
             */

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


            /*
             * Ketika hamburger ditekan
             */

            #accordionSidebar.mobile-open {

                left: 0;

            }


            /*
             * Content memenuhi layar
             */

            #content-wrapper {

                width: 100% !important;

                margin-left: 0 !important;

            }


            /*
             * Navbar berada di atas
             */

            .topbar {

                position: relative;

                z-index: 1040;

            }


            /*
             * Lapisan gelap ketika sidebar terbuka
             */

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
        <div id="content-wrapper"
             class="d-flex flex-column">


            <div id="content">

                {{-- Navbar --}}
                @include('partials.navbar')


                {{-- Isi halaman --}}
                <div class="container-fluid">

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
    <a class="scroll-to-top rounded"
       href="#page-top">

        <i class="fas fa-angle-up"></i>

    </a>


    {{-- Logout Modal --}}
    <div class="modal fade"
         id="logoutModal"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">

        <div class="modal-dialog"
             role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Siap untuk keluar?
                    </h5>

                    <button class="close"
                            type="button"
                            data-dismiss="modal">

                        <span aria-hidden="true">
                            ×
                        </span>

                    </button>

                </div>


                <div class="modal-body">

                    Pilih "Logout" jika kamu ingin keluar dari sistem.

                </div>


                <div class="modal-footer">

                    <button class="btn btn-secondary"
                            type="button"
                            data-dismiss="modal">

                        Batal

                    </button>


                    <a class="btn btn-primary"
                       href="#">

                        Logout

                    </a>

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

            const button =
                document.getElementById('mobileSidebarToggle');

            const sidebar =
                document.getElementById('accordionSidebar');

            const overlay =
                document.getElementById('sidebarOverlay');


            if (!button || !sidebar) {
                return;
            }


            /*
             * Klik hamburger
             */

            button.addEventListener('click', function () {

                sidebar.classList.toggle('mobile-open');

                if (overlay) {

                    overlay.classList.toggle('show');

                }

            });


            /*
             * Klik area luar sidebar
             * untuk menutup sidebar
             */

            if (overlay) {

                overlay.addEventListener('click', function () {

                    sidebar.classList.remove('mobile-open');

                    overlay.classList.remove('show');

                });

            }


            /*
             * Kalau klik menu,
             * sidebar otomatis ditutup di HP.
             */

            sidebar.addEventListener('click', function (event) {

                const link =
                    event.target.closest('a.nav-link');

                if (link && window.innerWidth < 768) {

                    sidebar.classList.remove('mobile-open');

                    if (overlay) {

                        overlay.classList.remove('show');

                    }

                }

            });


            /*
             * Kalau layar berubah menjadi desktop,
             * bersihkan mode mobile.
             */

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