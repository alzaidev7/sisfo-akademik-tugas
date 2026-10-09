<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    {{-- Hamburger Mobile --}}
    <button
        id="mobileSidebarToggle"
        class="btn btn-link d-md-none rounded-circle mr-3"
        type="button"
        aria-label="Buka navigasi"
    >
        <i class="fa fa-bars"></i>
    </button>

    {{-- Judul --}}
    <div class="d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0">
        <span class="font-weight-bold text-primary">
            Sistem Informasi Akademik
        </span>
    </div>

    {{-- Navbar kanan --}}
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">

            <a
                class="nav-link dropdown-toggle"
                href="#"
                id="userDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    {{ auth()->user()->name }}
                </span>

                
             <span class="rounded-circle bg-primary d-inline-flex align-items-center justify-content-center"
             style="width: 32px; height: 32px;">
             <i class="fas fa-user text-white"></i>
             </span>

            </a>

            <div
                class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown"
            >
                {{-- Informasi pengguna --}}
                <div class="dropdown-header">
                    <strong>{{ auth()->user()->name }}</strong>
                    <br>
                    <small class="text-muted">
                        {{ auth()->user()->email }}
                    </small>
                </div>

                <div class="dropdown-divider"></div>

                {{-- Pengaturan akun --}}
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                    Pengaturan Akun
                </a>

                <div class="dropdown-divider"></div>

                {{-- Logout --}}
                <a
                    class="dropdown-item"
                    href="#"
                    data-toggle="modal"
                    data-target="#logoutModal"
                >
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>

            </div>
        </li>
    </ul>
</nav>