@extends("layouts.app")


@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">VER INFORMACIÓN CLIENTE</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('reporte.producto')}}">Lista de Reportes</a></li>
            <li class="breadcrumb-item active">Reporte Cliente</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->


<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->

    <div class="col-lg-12">
        <div class="card">

            @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <strong></strong> {{ session('datos') }}
            </div>
            @endif

            <div class="card-body">
                <div>
                    <h2 style="float: left">Productos más comprados por <b>{{$cliente->nombre}}</b></h2>
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
                        @foreach($detalle as $item)
                        <tr>
                            <th scope="row" style="color: black; text-align: center">{{ $cont }}</th>
                            <td style="text-align: center">{{ $item->id }}</td>
                            <td style="text-align: center">{{ $item->nombre }}</td>
                            <td style="text-align: center">{{ $item->descripcion }}</td>
                            <td style="text-align: center">{{ $item->cantidad }}</td>
                            @php
                                $cont = $cont + 1;
                            @endphp
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <a class="btn btn-info" href="{{route('reporte.producto')}}" role="button"><i class="fas fa-reply"></i> Atras</a>
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
