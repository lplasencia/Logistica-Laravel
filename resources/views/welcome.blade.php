<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>TAIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/Landing/images/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/Landing/css/bootstrap.min.css" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="/Landing/css/materialdesignicons.min.css" />

    <!--pe-7 Icon -->
    <link rel="stylesheet" type="text/css" href="/Landing/css/pe-icon-7-stroke.css" />

    <!-- Magnific-popup -->
    <link rel="stylesheet" type="text/css" href="/Landing/css/magnific-popup.css">

    <!-- Custom  sCss -->
    <link rel="stylesheet" type="text/css" href="/Landing/css/style.css" />

</head>

<body>

    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark">
        <div class="container-fluid">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="index.html">
                <img src="/Plantilla/images/unt.png" alt="" class="logo-light" height="80px" />
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">

                    @guest

                    @if(Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">{{ __('INICIAR SESIÓN') }}</a>
                    </li>
                    @endif

                    @else
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">{{ __('MENÚ PRINCIPAL')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('CERRAR SESIÓN')}}</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- home start -->
    <section class="bg-home bg-gradient" id="home">
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="home-title text-white">
                                <h2 class="mb-4">VIDRIERIA ALVA</h2>
                                <p class="text-white-50 home-desc font-16 mb-5">Gestión Logistica</p>
                                <div class="watch-video mt-5">
                                    @guest
                                    @if(Route::has('register'))
                                        <a href="{{ route('login') }}" class="btn btn-custom mr-4">Iniciar Sesión <i class="mdi mdi-chevron-right ml-1"></i></a>
                                    @endif
                                    @else
                                        <a href="{{ route('home') }}" class="btn btn-custom mr-4">Menú Principal<i class="mdi mdi-chevron-right ml-1"></i></a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1 col-sm-6">
                            <div class="home-img mo-mt-20">
                                <img src="/Landing/images/home-img.png" alt="" class="img-fluid mx-auto d-block">
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
                <!-- end container-fluid -->
            </div>
        </div>
    </section>
    <!-- home end -->

    <!-- footer start -->
    <footer class="footer bg-dark">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center">
                        <p class="text-white-50 mb-4">2021 © Todos los derechos recervados.</p>

                    </div>
                </div>

            </div>

        </div>
    </footer>
    <!-- footer end -->

    <!-- Back to top -->
    <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a>


    <!-- javascript -->
    <script src="/Landing/js/jquery.min.js"></script>
    <script src="/Landing/js/bootstrap.bundle.min.js"></script>
    <script src="/Landing/js/jquery.easing.min.js"></script>
    <script src="/Landing/js/scrollspy.min.js"></script>

    <!-- Magnific Popup -->
    <script src="/Landing/js/jquery.magnific-popup.min.js"></script>

    <!-- counter js -->
    <script src="/Landing/js/counter.int.js"></script>

    <!-- custom js -->
    <script src="/Landing/js/app.js"></script>
</body>

</html>
