@extends("layouts.app")


@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">PRODUCTOS</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('product.index',$fechaini) }}">Producto</a></li>
            <li class="breadcrumb-item active">Ver Producto</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    @php
    use Carbon\Carbon;

    $fechafin = Carbon::now()->format('H:i:s.v');
    @endphp

    <form method="POST" action="{{route('medicionproducto.index')}}">
        @csrf
        <div style="border: solid; width: 50%">
            <label for="">Inicio :</label>
            <input type="text" name="fechaini" value="{{$fechaini}}">
            <label for="">Fin:</label>
            <input type="text" name="fechafin" value="{{$fechafin}}">
            <button type="submit" class="btn btn-info btn"> <i class="fa fa-check"></i> Guardar</button>
        </div>
    </form>
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row" style="justify-content: center">
            <div class="col-lg-12 responsive-md-100">
                <div class="card card-outline-info">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">I. DATOS GENERALES</h4>
                        </div>
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 2%; padding-left: 5%">
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="nombre">Nombre:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="nombre" name="nombre" value="Vidrio estirado de 2mm" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="descripcion">Descripcion:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="descripcion" name="descripcion" value="Vidrio" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="descripcion">Stock:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="descripcion" name="descripcion" value="94" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="descripcion">Unidad de Medida:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="descripcion" name="descripcion" value="Pie cuadrado" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="descripcion">Categoria:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="descripcion" name="descripcion" value="Vidrio" class="form-control input-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container fluid  -->

<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->

@endsection