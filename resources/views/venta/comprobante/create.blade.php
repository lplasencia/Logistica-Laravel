@extends('layouts.app')

@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">COMPROBANTE</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('comprobante.index') }}">Comprobante</a></li>
            <li class="breadcrumb-item active">Nuevo Comprobante</li>
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
                <div class="card card-outline-info">
                    <form method="POST" action="{{-- {{ route('customer.store') }} --}}">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">I. DATOS GENERALES</h4>
                        </div>
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 2%; padding-left: 5%">
                            @csrf
                            <div class="form-body">

                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Nombre del Documento : </label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option selected>-- Seleccione Tipo Documento --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="height: 30px"></div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Serie : </label>
                                        <input type="text" id="serie" name="serie" class="form-control">
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <label for="">Número : </label>
                                        <input type="text" id="numero" name="numero" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="offset-sm-5">
                            <a type="button" href="{{ route('cancelarComprobante') }}" class="btn btn-danger btn">Cancelar</a>
                            <button type="submit" class="btn btn-info btn"> <i class="fa fa-check"></i> Guardar</button>
                        </div>

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



