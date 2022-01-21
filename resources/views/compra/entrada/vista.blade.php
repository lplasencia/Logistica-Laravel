@extends('layouts.app')

@section('section')


<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">COMPRA</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('entrada.list') }}">Lista de Compras</a></li>
            <li class="breadcrumb-item active">Ver Compra</li>
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
                    <h2 style="float: left">Detalles de Compra</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover " id="myTable">
                        <thead style="background: #1976D2; color:white; opacity: 0.9">
                            <tr>
                                <th style="text-align: center">N°</th>
                                <th style="text-align: center">Producto</th>
                                <th style="text-align: center">Stock de Ingreso</th>
                                <th style="text-align: center">Precio de Compra</th>
                                <th style="text-align: center">Precio de Venta</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($detalle as $item)
                            <tr>
                                <th scope="row" style="color: black; text-align: center">{{ $item->id }}</th>
                                <td style="text-align: center">{{ $item->product->nombre }}</td>
                                <td style="text-align: center">{{ $item->stock_ingreso }}</td>
                                <td style="text-align: center">{{ $item->precio_compra }}</td>
                                <td style="text-align: center">{{ $item->precio_venta }}</td>
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
