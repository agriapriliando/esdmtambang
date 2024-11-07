<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ $title ?? 'Bid. Tambang ESDM' }}</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index.html" class="logo">
                        <img src="assets/logo_top_esdm_kalteng.png" alt="navbar brand" class="navbar-brand" height="60" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item">
                            <a href="{{ url('/') }}">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                                <span class="badge badge-secondary d-none">1</span>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Menu</h4>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('berkas') }}">
                                <i class="fas fa-file"></i>
                                <p>Daftar File Berkas</p>
                                <span class="badge badge-secondary d-none">1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('perusahaan') }}">
                                <i class="fas fa-file"></i>
                                <p>Daftar Perusahaan</p>
                                <span class="badge badge-secondary d-none">1</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="assets/logo_top_esdm_kalteng.png" alt="navbar brand" class="navbar-brand" height="60" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex" x-data="{ searchform: false }" style="width: 100% !important;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input x-on:click="searchform = !searchform" type="text" placeholder="Cari Berkas..." class="form-control" />
                            </div>
                            <div x-cloak x-show="searchform" x-transition x-on:click.outside="searchform = false" class="position-absolute card card-rounded" style="top: 50px;">
                                <div class="card-body">
                                    <div class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action">
                                            A second link item A second link item A second link item
                                            <span class="badge badge-primary ms-2">PT ABC Sejahtera</span>
                                            <span class="badge badge-primary ms-2"><i class="fa fa-download"></i></span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            A third link item
                                            <span class="badge badge-primary ms-2">PT ABC Sejahtera</span>
                                            <span class="badge badge-primary ms-2"><i class="fa fa-download"></i></span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            A fourth link item
                                            <span class="badge badge-primary ms-2">PT ABC Sejahtera</span>
                                            <span class="badge badge-primary ms-2"><i class="fa fa-download"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </nav>

                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Cari Berkas..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>
                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <div class="avatar-sm d-none">
                                        <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle" />
                                    </div>
                                    <i class="fa fa-user"></i>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span>
                                        <span class="fw-bold">Agri Apriliando</span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg d-none">
                                                    <img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>Agri Apriliando</h4>
                                                    <p class="text-muted">hello@example.com</p>
                                                    <a href="#" class="btn btn-xs btn-secondary btn-sm">Profile</a>
                                                    <a href="#" class="btn btn-xs btn-warning btn-sm">Logout</a>
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            @yield('content')

            <div class="text-center">
                <img src="assets/logo_kotak.png" alt="navbar brand" class="navbar-brand" height="40" />
                2024, made with <i class="fa fa-heart heart text-danger"></i> by
                <a href="#">Ditaria</a>
            </div>
        </div>

    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.3/dist/cdn.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#perusahaan').select2();
        });
    </script>
</body>

</html>
