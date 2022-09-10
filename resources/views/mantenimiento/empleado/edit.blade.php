@extends('layouts.app')


@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Empleados</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('empleado.index') }}">Empleados</a></li>
            <li class="breadcrumb-item active">Editar Empleado</li>
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
                    <form method="POST" action="{{ route('empleado.update',$empleado->id) }}">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">I. DATOS GENERALES</h4>
                        </div>
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 2%; padding-left: 5%">
                            @method('put') @csrf
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-11">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-2" for="nombre">Nombre:</label>
                                            <div class="col-md-5">
                                                <input type="text" id="nombre" name="nombre" value="" class="form-control input-sm @error('nombre') is-invalid @enderror">
                                                @error('nombre')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-1"></div>
                                            <label class="control-label text-left col-md-1" for="nombre">DNI:</label>
                                            <div class="col-md-3">
                                                <input type="text" id="nombre" name="nombre" value="" class="form-control input-sm @error('nombre') is-invalid @enderror">
                                                @error('nombre')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-11" style="margin-top: 20px">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-2" for="nombre">Dirección:</label>
                                            <div class="col-md-4">
                                                <input type="text" id="nombre" name="nombre" value="" class="form-control input-sm @error('nombre') is-invalid @enderror">
                                                @error('nombre')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-1"></div>
                                            <label class="control-label text-left col-md-2" for="nombre">Telefono:</label>
                                            <div class="col-md-3">
                                                <input type="text" id="nombre" name="nombre" value="" class="form-control input-sm @error('nombre') is-invalid @enderror">
                                                @error('nombre')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-11" style="margin-top: 20px">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-2" for="nombre">Email:</label>
                                            <div class="col-md-10">
                                                <input type="text" id="nombre" name="nombre" value="" class="form-control input-sm @error('nombre') is-invalid @enderror">
                                                @error('nombre')
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
