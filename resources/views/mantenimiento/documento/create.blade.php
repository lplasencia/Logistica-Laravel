@extends('layouts.app')

@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">DOCUMENTO</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('usuario.index') }}">Documento</a></li>
            <li class="breadcrumb-item active">Nuevo Documento</li>
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
                                    <div class="col-md-6">
                                        <label for="">Nombre del Documento : </label>
                                        <input type="text" id="empresa" name="empresa" class="form-control">
                                    </div>
                                </div>
                                <div class="row" style="height: 30px"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Operación : </label>
                                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option selected>-- Seleccione Operacion --</option>
                                            <option value="1">Persona</option>
                                            <option value="2">Comprobante</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="offset-sm-5">
                            <a type="button" href="{{ route('cancelarDocumento') }}" class="btn btn-danger btn">Cancelar</a>
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



