@extends("layouts.app")


@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">LISTA DE CANTIDADES MENSUALES</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active">Lista de reportes</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->


<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <h2 style="float: left">Productos más Vendidos</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover " id="myTable">
                        <thead style="background: #1976D2; color:white; opacity: 0.9">
                            <tr>
                                <th style="text-align: center">N°</th>
                                <th style="text-align: center">ID producto</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Descripción</th>
                                <th style="text-align: center">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php
                                    $cont = 0;
                                    $cont = $cont + 1;
                                @endphp
                            @foreach($productos as $item)
                            <tr>
                                <th scope="row" style="color: black; text-align: center">{{ $cont }}</th>
                                <td style="text-align: center">{{ $item->id }}</td>
                                <td style="text-align: center">{{ $item->nombre }}</td>
                                <td style="text-align: center">{{ $item->descripcion }}</td>
                                <td style="text-align: center">{{ $item->cantidad }}</td>
                                {{-- <td style="text-align:center">
                                    <a href="{{route('product.ver')}}"><i class="fas fa-eye" style="color:#3084D7; font-size: 20px;"></i></a>
                                </td> --}}
                                @php
                                    $cont = $cont + 1;
                                @endphp
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>

    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    <h2 style="float: left">Clientes con más Compras</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover " id="myTable2">
                        <thead style="background: #1976D2; color:white; opacity: 0.9">
                            <tr>
                                <th style="text-align: center">N°</th>
                                <th style="text-align: center">ID cliente</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Email</th>
                                <th style="text-align: center">Celular</th>
                                <th style="text-align: center">Cantidad</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php
                                    $cont = 0;
                                    $cont = $cont + 1;
                                @endphp
                            @foreach($clientes as $item)
                            <tr>
                                <th scope="row" style="color: black; text-align: center">{{ $cont }}</th>
                                <td style="text-align: center">{{ $item->id }}</td>
                                <td style="text-align: center">{{ $item->nombre }}</td>
                                <td style="text-align: center">{{ $item->email }}</td>
                                <td style="text-align: center">{{ $item->telefono }}</td>
                                <td style="text-align: center">{{ $item->cantidad }}</td>
                                <td style="text-align:center">
                                    <a href="{{route('reporte.ver',$item->id)}}"><i class="fas fa-eye"
                                            style="color:#343a40; font-size: 20px;"></i></a>
                                </td>
                                @php
                                    $cont = $cont + 1;
                                @endphp
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    
    <!-- End PAge Content -->
</div>
<!-- End Container fluid  -->

@endsection


@section('script1')

<script src="/Plantilla/js/lib/datatables/datatables.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="/Plantilla/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="/Plantilla/js/lib/datatables/datatables-init.js"></script>
@endsection
