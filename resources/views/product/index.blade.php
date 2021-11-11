@extends("layouts.app")


@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">PRODUCTO</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Productos</a></li>
            <li class="breadcrumb-item active">Lista de Productos</li>
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
                    <h2 style="float: left">Productos</h2>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover " id="myTable">
                        <thead style="background: #1976D2; color:white; opacity: 0.9">
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio Compra</th>
                                <th>Precio Venta</th>
                                <th>Unidad Medida</th>
                                <th>Categoria</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $item)
                            <tr>
                                <th scope="row" style="color: black; text-align: center">{{ $item->id }}</th>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>{{ $item->precio_compra }}</td>
                                <td>{{ $item->precio_venta }}</td>
                                <td>{{ $item->unit->descripcion }}</td>
                                <td>{{ $item->category->descripcion }}</td>
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
