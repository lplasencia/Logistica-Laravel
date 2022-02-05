@extends('layouts.app')

@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">REPORTES</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('ventaDiaria.index') }}">Reportes</a></li>
            <li class="breadcrumb-item active">Ventas Diarias</li>
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
                    <h2 style="float: left">Ventas Diarias</h2>
                    <a href="{{route('reporteventaDiaria.index',$date)}}" type="button" class="btn btn-success" style="float: right">PDF</a>
                </div>
                <div>
                    <div class="col-md-8" style="margin-top: 50px">
                        <label for="">FECHA :</label>
                        <input style="margin-left: 10px" type="text" value="{{$date}}" readonly>
                    </div>
                    @php
                        use Carbon\Carbon;

                        $fechafin = Carbon::now()->format('H:i:s.v');
                    @endphp
                    <form method="POST" action="{{route('medicionventa.index')}}">
                        @csrf
                        <div style="border: solid; width: 60%">
                            <label for="">Inicio :</label>
                            <input type="text" name="fechaini" value="{{$fechaini}}">
                            <label for="">Fin:</label>
                            <input type="text" name="fechafin" value="{{$fechafin}}">
                            <button type="submit" class="btn btn-info btn"> <i class="fa fa-check"></i> Guardar</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover " id="myTable">
                        <thead style="background: #1976D2; color:white; opacity: 0.9">
                            <tr>
                                <th style="text-align:center">N° Producto</th>
                                <th style="text-align:center">Producto</th>
                                <th style="text-align:center">Precio Venta</th>
                                <th style="text-align:center">Cantidad</th>
                                <th style="text-align:center">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($valor as $item)
                            <tr>
                                <th scope="row" style="color: black; text-align: center">{{ $item->id }}</th>
                                <td style="text-align:center">{{ $item->nombre }}</td>
                                <td style="text-align:center">{{ $item->precio_venta }}</td>
                                <td style="text-align:center">{{ $item->cantidad }}</td>
                                <td style="text-align:center">{{ $item->subtotal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row" style="text-align:center">
                    <div>
                        @if(empty($total))
                            <h3>TOTAL : 0</h3>
                        @else
                            <h3>TOTAL : {{$total[0]->total}}</h3>
                        @endif
                    </div>
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
