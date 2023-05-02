<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Architect Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="./heroes/heroes.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= base_url(); ?>"><strong>Architect Hub</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">




                <div class="container text-center">
                    <div class="row align-items-center">

                        <div class="col">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url("pekerjaan"); ?>">Projek</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url("kontraktor"); ?>">Penyedia Jasa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url("faq"); ?>"> Cara Penggunaan Aplikasi</a>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled">Disabled</a>
                                </li> -->
                            </ul>

                        </div>

                    </div>
                </div>

                <form class="d-grid gap-2 p-2" role="search">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <button class="btn btn-dangerg" type="submit"><strong>Login</strong></button>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Pengguna Jasa</a></li>
                                        <li><a class="dropdown-item" href="#">Kontraktor</a></li>
                                        
                                    </ul>
                                </li>
                </ul>
                <!-- //   <button class="btn btn-dangerg" type="submit"><strong>Login</strong></button> -->
                 

                </form>
                <form class="d-grid gap-2 p-1" role="search">

                    <button class="btn btn-outline-warning" type="submit"><strong>Posting Pekerjaan</strong></button>

                </form>



            </div>
        </div>
    </nav>


    <?= $this->renderSection('content'); ?>

    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-4">
                <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">

                    <h3>Architect Hub</h3>

                </a>
                <p class="text-muted">Architect Hub berdiri pada tahun 2023 yang diawali dengan kemerdekaan indonesia,
                    mengenai pemindahan kekuasaan dan lain - lain akan dilaksanakan dengan cara seksama dan dalam tempo yang sesingkat singkatnya.

                </p>
            </div>

            <div class="col mb-3">
            </div>
            <div class="col mb-3">
                <h5>Informasi Kontak</h5>
                <strong>Alamat</strong>
                <p> 01, Jl. Halmahera No.KM, Mintaragen, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52121
                </p>
                <strong>Kontak</strong>
                <p> Telp : +62 2833 51082
                    Email : Info@upstegal.ac.id
                </p>
            </div>

            <div class="col mb-3">
                <h5>Sosial Media</h5>

            </div>


        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<script>
    var myModal = document.getElementById('Modal')


    myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
    })
</script>

</html>