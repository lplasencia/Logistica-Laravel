<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Vidrieria Alva</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/Plantilla/images/favicon.png">
    <!-- Custom CSS -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('style')

    @yield('estilos')

    <link href="/Plantilla/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="/path/to/cdn/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/css/bootstrap-multiselect.min.css" integrity="sha512-wHTuOcR1pyFeyXVkwg3fhfK46QulKXkLq1kxcEEpjnAPv63B/R49bBqkJHLvoGFq6lvAEKlln2rE1JfIPeQ+iw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://kit.fontawesome.com/7c9d371d92.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>

<body class="header-fix fix-sidebar">

    @php
        use Illuminate\Support\Facades\Auth;

        $user = Auth::user();
    @endphp

<style>
    .select-css {
 display: block;
 font-size: 16px;
 font-family: 'Arial', sans-serif;
 font-weight: 400;
 color: #444;
 line-height: 1.3;
 padding: .4em 1.4em .3em .8em;
 width: 400px;
 max-width: 100%; 
 box-sizing: border-box;
 margin: 0;
 border: 1px solid #aaa;
 box-shadow: 0 1px 0 1px rgba(0,0,0,.03);
 border-radius: .3em;
 -moz-appearance: none;
 -webkit-appearance: none;
 appearance: none;
 background-color: #fff;
 background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
   linear-gradient(to bottom, #ffffff 0%,#f7f7f7 100%);
 background-repeat: no-repeat, repeat;
 background-position: right .7em top 50%, 0 0;
 background-size: .65em auto, 100%;
}
.select-css::-ms-expand {
 display: none;
}
.select-css:hover {
 border-color: #888;
}
.select-css:focus {
 border-color: #aaa;
 box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
 box-shadow: 0 0 0 3px -moz-mac-focusring;
 color: #222; 
 outline: none;
}
.select-css option {
 font-weight:normal;
}
</style>
    
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}" style="padding:8px">
                        <!-- Logo text -->
                        <span><img src="/Plantilla/images/unt.png" alt="homepage" class="dark-logo" style="height: 45px" /></span>
                        
                    </a>
                </div>
                <!-- End Logo -->

                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link toggle-nav hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10">
                            <a class="nav-link sidebartoggle hidden-sm-down text-muted  " href="javascript:void(0)">
                                <i class="ti-menu"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$user->name}}
                                <i class="fa fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right animated slideInRight">
                                <ul class="dropdown-user">
                                    <li role="separator" class="divider"></li>
                                    <li><a href=""> Perfil</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> Cerrar Sesión</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul class="list-unstyled components">
                        {{-- <li class="nav-devider"></li>
                        <li class="active">
                            <a href="#homeSubmenu" aria-expanded="false" ><i class="fas fa-house-user"></i><span class="hide-menu">INDIVIDUAL</span></a>
                        </li> --}}
                        {{-- MANTENIMIENTO --}}
                        <li class="nav-devider"></li>
                        <li>
                            <a href="#mantenimiento" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-house-user"></i><span class="hide-menu">MANTENIMIENTO</span></a>
                            <ul class="collapse list-unstyled" id="mantenimiento">
                                <li>
                                    <a href="{{route('empleado.index')}}">EMPLEADO</a>
                                </li>
                                <li>
                                    <a href="#">USUARIO</a>
                                </li>
                                <li>
                                    <a href="#">DOCUMENTO</a>
                                </li>
                            </ul>
                        </li>

                        {{-- CLIENTES --}}
                        <li class="nav-devider"></li>
                        <li>
                            <a href="#cliente" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-house-user"></i><span class="hide-menu">CLIENTES</span></a>
                            <ul class="collapse list-unstyled" id="cliente">
                                <li>
                                    <a href="{{route('customer.index')}}">LISTA CLIENTES</a>
                                </li>
                                <li>
                                    <a href="{{route('customer.create')}}">NUEVO CLIENTE</a>
                                </li>
                                <li>
                                    <a href="{{route('customer.list')}}">EDITAR CLIENTE</a>
                                </li>
                            </ul>
                        </li>

                        {{-- PROVEEDORES --}}
                        <li class="nav-devider"></li>
                        <li>
                            <a href="#proveedor" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-house-user"></i><span class="hide-menu">PROVEEDORES</span></a>
                            <ul class="collapse list-unstyled" id="proveedor">
                                <li>
                                    <a href="{{route('supplier.index')}}">LISTA PROVEEDORES</a>
                                </li>
                                <li>
                                    <a href="{{route('supplier.create')}}">NUEVO PROVEEDOR</a>
                                </li>
                                <li>
                                    <a href="{{route('supplier.list')}}">EDITAR PROVEEDOR</a>
                                </li>
                            </ul>
                        </li>

                        {{-- PRODUCTOS --}}
                        <li class="nav-devider"></li>
                        <li>
                            <a href="#producto" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-house-user"></i><span class="hide-menu">PRODUCTOS</span></a>
                            <ul class="collapse list-unstyled" id="producto">
                                <li>
                                    <a href="{{route('product.index')}}">LISTA PRODUCTOS</a>
                                </li>
                                <li>
                                    <a href="{{route('product.create')}}">NUEVO PRODUCTO</a>
                                </li>
                                <li>
                                    <a href="{{route('product.list')}}">EDITAR PRODUCTO</a>
                                </li>
                            </ul>
                        </li>
                        
                        {{-- INVENTARIO --}}
                        <li class="nav-devider"></li>
                        <li>
                            <a href="#inventario" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-house-user"></i><span class="hide-menu">INVENTARIO</span></a>
                            <ul class="collapse list-unstyled" id="inventario">
                                <li>
                                    <a href="#">VER PRODUCTO</a>
                                </li>
                                <li>
                                    <a href="{{route('entrada.index')}}">REGISTRAR ENTRADA</a>
                                </li>
                                <li>
                                    <a href="{{route('salida.index')}}">REGISTRAR SALIDA</a>
                                </li>
                            </ul>
                        </li>

                        {{-- COMPRAS --}}
                        <li class="nav-devider"></li>
                        <li>
                            <a href="#compras" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-house-user"></i><span class="hide-menu">COMPRAS</span></a>
                            <ul class="collapse list-unstyled" id="compras">
                                <li>
                                    <a href="#">REGISTRAR COMPRA</a>
                                </li>
                                <li>
                                    <a href="#">EDITAR COMPRA</a>
                                </li>
                            </ul>
                        </li>

                        {{-- VENTAS --}}
                        <li class="nav-devider"></li>
                        <li>
                            <a href="#ventas" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-house-user"></i><span class="hide-menu">VENTAS</span></a>
                            <ul class="collapse list-unstyled" id="ventas">
                                <li>
                                    <a href="#">REGISTRAR VENTA</a>
                                </li>
                                <li>
                                    <a href="#">EDITAR VENTA</a>
                                </li>
                            </ul>
                        </li>

                        {{-- REPORTES --}}
                        <li class="nav-devider"></li>
                        <li>
                            <a href="#reportes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-house-user"></i><span class="hide-menu">REPORTES</span></a>
                            <ul class="collapse list-unstyled" id="reportes">
                                <li>
                                    <a href="#">MOVIMIENTOS DE INVENTARIO</a>
                                </li>
                                <li>
                                    <a href="#">COMPRAS</a>
                                </li>
                                <li>
                                    <a href="#">VENTAS</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
        

                </nav>

                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">

            @yield('section')

            <!-- footer -->
            <footer class="footer"> © 2021 Todos los Derechos Reservados.</footer>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
    <script src="/Plantilla/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/Plantilla/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="/Plantilla/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="Plantilla/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="/Plantilla/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/Plantilla/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="/path/to/cdn/jquery.min.js"></script>
    <script src="/path/to/cdn/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/js/bootstrap-multiselect.min.js" integrity="sha512-ljeReA8Eplz6P7m1hwWa+XdPmhawNmo9I0/qyZANCCFvZ845anQE+35TuZl9+velym0TKanM2DXVLxSJLLpQWw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
    @yield('gojs')

    @yield('scriptselect')

    @yield('number')

    @yield('diagrama')

    @yield('script')

    <!--Custom JavaScript -->
    <script src="/Plantilla/js/custom.min.js"></script>

    @yield('script1')

    @yield('script2')

</body>

</html>

