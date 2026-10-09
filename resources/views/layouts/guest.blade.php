<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SISFO Akademik')</title>

    <link
        href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}"
        rel="stylesheet"
    >
    <link
        href="{{ asset('assets/css/sb-admin-2.min.css') }}"
        rel="stylesheet"
    >
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8">

                <div class="text-center mt-5 mb-4">
                    <h1 class="h3 text-white font-weight-bold">
                        SISFO Akademik
                    </h1>
                    <p class="text-white-50">
                        Sistem Informasi Akademik Sekolah
                    </p>
                </div>

                @yield('content')

                <div class="text-center text-white-50 small mt-4 mb-4">
                    &copy; {{ date('Y') }} SISFO Akademik
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>
</html>