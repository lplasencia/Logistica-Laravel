@extends('layouts.app')

@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">EMPLEADO</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('empleado.index') }}">Empleado</a></li>
            <li class="breadcrumb-item active">Nuevo Empleado</li>
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
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="nombre">Nombre:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="nombre" name="nombre" class="form-control input-sm @error('nombre') is-invalid @enderror">
                                                @error('nombre')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="dni">DNI:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="dni" name="dni" class="form-control input-sm @error('dni') is-invalid @enderror">
                                                @error('dni')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="direccion">Direccion:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="direccion" name="direccion" class="form-control input-sm @error('direccion') is-invalid @enderror">
                                                @error('direccion')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="telefono">Telefono:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="telefono" name="telefono" class="form-control input-sm @error('telefono') is-invalid @enderror">
                                                @error('telefono')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="email">Email:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="email" name="email" class="form-control input-sm @error('email') is-invalid @enderror">
                                                @error('email')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="fecha_nac">Fecha Nacimiento:</label>
                                            <div class="col-md-7">
                                                <input type="date" id="fecha_nac" name="fecha_nac" class="form-control input-sm @error('fecha_nac') is-invalid @enderror">
                                                @error('fecha_nac')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="offset-sm-5">
                            <a type="button" href="{{ route('cancelarEmpleado') }}" class="btn btn-danger btn">Cancelar</a>
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

