<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Bid. Tambang ESDM</title>
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!-- <link rel="stylesheet" href="assets/css/demo.css" /> -->
    <style>
        .gradient-bg {
            background: linear-gradient(224deg, #007db7, #9600b7, #d71840);
            background-size: 600% 600%;

            -webkit-animation: animatebg 8s ease infinite;
            -moz-animation: animatebg 8s ease infinite;
            animation: animatebg 8s ease infinite;
        }

        @-webkit-keyframes animatebg {
            0% {
                background-position: 0% 52%
            }

            50% {
                background-position: 100% 49%
            }

            100% {
                background-position: 0% 52%
            }
        }

        @-moz-keyframes animatebg {
            0% {
                background-position: 0% 52%
            }

            50% {
                background-position: 100% 49%
            }

            100% {
                background-position: 0% 52%
            }
        }

        @keyframes animatebg {
            0% {
                background-position: 0% 52%
            }

            50% {
                background-position: 100% 49%
            }

            100% {
                background-position: 0% 52%
            }
        }

        .button-gradient-bg {
            background: linear-gradient(224deg, #007db7, #9600b7, #d71840);
            background-size: 600% 600%;

            -webkit-animation: animatebg 3s ease infinite;
            -moz-animation: animatebg 3s ease infinite;
            animation: animatebg 3s ease infinite;
        }

        @-webkit-keyframes animatebg {
            0% {
                background-position: 0% 52%
            }

            50% {
                background-position: 100% 49%
            }

            100% {
                background-position: 0% 52%
            }
        }

        @-moz-keyframes animatebg {
            0% {
                background-position: 0% 52%
            }

            50% {
                background-position: 100% 49%
            }

            100% {
                background-position: 0% 52%
            }
        }

        @keyframes animatebg {
            0% {
                background-position: 0% 52%
            }

            50% {
                background-position: 100% 49%
            }

            100% {
                background-position: 0% 52%
            }
        }

        .hover {
            cursor: pointer !important;
        }
    </style>
</head>

<body class="gradient-bg">
    <div class="container">
        <div class="page-inner">
            <div class="row mt-3">
                <div class="col-md-6 col-12" style="margin: auto;">
                    <div class="card align-middle">
                        <div class="card-body px-5 pt-5 pb-4">
                            <img src="assets/logo_kotak.png" alt="navbar brand" class="navbar-brand float-end" height="40" />
                            <h5 class="card-title">Login</h5>
                            <h6 class="card-subtitle mb-4 text-body-secondary">Bidang Pertambangan ESDM Kalteng</h6>
                            <hr>
                            @session('user')
                                <div class="alert rounded bg-success alert-dismissible fade show" role="alert">
                                    <strong>Terima Kasih {{ session('user')['name'] }}, </strong> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endsession
                            @session('success')
                                <div class="alert rounded text-bg-success alert-dismissible fade show" role="alert">
                                    <strong>Terima Kasih, </strong> {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endsession
                            @session('error')
                                <div class="alert rounded text-bg-danger alert-dismissible fade show" role="alert">
                                    <strong>Perhatian!</strong> {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endsession
                            <div>
                                <form action="{{ route('auth.login') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autocomplete="off">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group mb-3" x-data="{ pass: false }">
                                            <input name="password" :type="pass ? 'password' : 'text'" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password"
                                                autocomplete="off">
                                            <span class="input-group-text hover"><i x-on:click="pass = !pass" :class="pass ? 'fa fa-eye-slash' : 'fa fa-eye'"></i></span>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn button-gradient-bg text-white">
                                            L o g i n</button>
                                    </div>
                                </form>
                            </div>
                            <div class="text-center mt-4">
                                Aplikasi Pendataan ESDM Kalteng<br>2024, made with <i class="fa fa-heart heart text-danger"></i> by
                                <a target="_blank" href="https://www.ditaria.com/">Ditaria Berkat Harati</a>.
                            </div>
                        </div>
                    </div>
                </div>
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
