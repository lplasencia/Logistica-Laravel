@extends('layouts.app')

@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">USUARIO</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('usuario.index') }}">Usuario</a></li>
            <li class="breadcrumb-item active">Nuevo Usuario</li>
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
                                    <div class="col-md-3">
                                        <div class="row">
                                            <label for="">Empresa : </label>
                                            <input type="text" value="Vidrieria Alva" id="empresa" name="empresa" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <label for="">Trabajador : </label>
                                            <select style="width: 100%" class="form-select" aria-label="Default select example">
                                                <option selected>--Seleccione el Trabajador--</option>
                                            </select>
                                        </div>  
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <label for="">Tipo de Usuario : </label>
                                            <select style="width: 100%" class="form-select" aria-label="Default select example">
                                                <option selected>-- Seleccione Tipo --</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Empleado</option>
                                            </select>
                                        </div>    
                                    </div>
                                </div>
                                <div class="row" style="height: 50px"></div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="">Permisos : </label>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                                <label for="">Almacen</label>    
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                                <label for="">Compras</label>    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                                <label for="">Ventas</label>    
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                                <label for="">Mantenimiento</label>    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                                <label for="">Administrador</label>    
                                            </div>
                                            <div class="col-md-3">
                                                <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
                                                <label for="">Reportes</label>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="offset-sm-5">
                            <a type="button" href="{{ route('cancelarUsuario') }}" class="btn btn-danger btn">Cancelar</a>
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



