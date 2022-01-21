@extends('layouts.app')

@section('section')


<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">COMPRA</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('entrada.list') }}">Compras</a></li>
            <li class="breadcrumb-item active">Lista de Compras</li>
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
                    <h2 style="float: left">Compras</h2>
                    <a href="{{ route('entrada.index') }}" type="button" class="btn btn-info m-b-10 m-l-5" style="float: right">Nueva Compra</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover " id="myTable">
                        <thead style="background: #1976D2; color:white; opacity: 0.9">
                            <tr>
                                <th>N°</th>
                                <th>Proveedor</th>
                                <th>T. Comprobante</th>
                                <th>Serie</th>
                                <th>Número</th>
                                <th>Fecha</th>
                                <th>Impuesto</th>
                                <th>total</th>
                                <th style="text-align:center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($entrada as $item)
                            <tr>
                                <th scope="row" style="color: black; text-align: center">{{ $item->id }}</th>
                                <td style="text-align: center">{{ $item->supplier->nombre }}</td>
                                <td style="text-align: center">{{ $item->tipo_comprobante }}</td>
                                <td style="text-align: center">{{ $item->serie_comprobante }}</td>
                                <td style="text-align: center">{{ $item->num_comprobante }}</td>
                                <td style="text-align: center"> {{ $item->fecha }}</td>
                                <td style="text-align: center">{{ $item->impuesto }}</td>
                                <td style="text-align: center">{{ $item->total }}</td>
                                <td style="text-align:center">
                                  <a href="{{route('entrada.ver',$item->id)}}"><i class="far fa-eye" style="color:#3084D7; font-size: 20px;"></i></a>
                                </td>
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
