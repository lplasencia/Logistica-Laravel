@extends('layouts.app')

@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">PEDIDO</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Pedido</a></li>
            <li class="breadcrumb-item active">Nuevo Pedido</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->

    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row" style="justify-content: center">
            <div class="col-lg-12 responsive-md-100">
                    <form method="POST" action="{{-- {{ route('customer.store') }} --}}">
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 2%; padding-left: 5%">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-11">
                                        <label for="">Cliente : </label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option selected>-- Seleccione Cliente --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="height: 30px"></div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Impuesto : </label>
                                        <input type="text" id="igv" name="igv" class="form-control" placeholder="Ingrese impuesto">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Tipo Pedido : </label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option selected>-- Seleccione Pedido --</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Numero : </label>
                                        <input type="text" id="numero" name="numero" class="form-control" placeholder="Ingrese numero">
                                    </div>
                                </div>
                                <div class="row" style="height: 30px"></div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="table-responsive">
                                            <table class="table table-hover " id="myTable">
                                                <thead style="background: #1976D2; color:white; opacity: 0.9">
                                                    <tr>
                                                        <th style="text-align:center">Articulo</th>
                                                        <th style="text-align:center">Codigo</th>
                                                        <th style="text-align:center">Serie</th>
                                                        <th style="text-align:center">P. Venta</th>
                                                        <th style="text-align:center">Cantidad</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    {{-- @foreach($employee as $item)
                                                    <tr>
                                                        <th scope="row" style="color: black; text-align: center">{{ $item->id }}</th>
                                                        <td>{{ $item->nombre }}</td>
                                                        <td>{{ $item->dni }}</td>
                                                        <td>{{ $item->direccion }}</td>
                                                        <td>{{ $item->telefono }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->fecha_nac }}</td>
                                                        <td style="text-align:center">
                                                            <a href=""><i class="fas fa-edit" style="color:#3084D7; font-size: 20px;"></i></a>
                                                            <a href="#" data-toggle="modal" data-target="#Eliminar" data-id="{{$item['empresa_id']}}"><i class="fas fa-trash-alt fa-fw" style="color:#3084D7; font-size: 20px;"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 30px">
                                    <div class="row">
                                        <div style="margin-left: 90px" class="col-md-1">
                                            <label for="">Sub Total: </label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="serie" name="serie" class="form-control" >
                                        </div>
                                        <div class="col-md-1">
                                            <label for="">S/. IGV: </label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="serie" name="serie" class="form-control" >
                                        </div>
                                        <div class="col-md-1">
                                            <label for="">S/. Total: </label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="serie" name="serie" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="offset-sm-5">
                            <a type="button" href="{{ route('cancelarEntrada') }}" class="btn btn-danger btn">Cancelar</a>
                            <button type="submit" class="btn btn-info btn"> <i class="fa fa-check"></i> Guardar</button>
                        </div>


                    </form>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->

<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->

@endsection


@section('script')
<script src="js/lib/sweetalert/sweetalert.init.js"></script>
@endsection



