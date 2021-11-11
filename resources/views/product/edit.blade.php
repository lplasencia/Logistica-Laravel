
@extends("layouts.app")


@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">PRODUCTOS</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Producto</a></li>
            <li class="breadcrumb-item active">Nuevo Producto</li>
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
                    <form method="POST" action="{{route('product.update',$product->id)}}">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">I. DATOS GENERALES</h4>
                        </div>
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 2%; padding-left: 5%">
                            @csrf @method('put')
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="nombre">Nombre:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="nombre" name="nombre" value="{{$product->nombre}}" class="form-control input-sm @error('nombre') is-invalid @enderror">
                                                @error('nombre')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="descripcion">Descripcion:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="descripcion" name="descripcion" value="{{$product->descripcion}}" class="form-control input-sm @error('descripcion') is-invalid @enderror">
                                                @error('descripcion')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="precio_compra">Precio de Compra:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="precio_compra" name="precio_compra" value="{{$product->precio_compra}}" class="form-control input-sm @error('precio_compra') is-invalid @enderror">
                                                @error('precio_compra')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="precio_venta">Precio de Venta:</label>
                                            <div class="col-md-7">
                                                <input type="text" id="precio_venta" name="precio_venta" value="{{$product->precio_venta}}" class="form-control input-sm @error('precio_venta') is-invalid @enderror">
                                                @error('precio_venta')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    @php $aux = 1; @endphp

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="unidad">Unidad de medida :</label>
                                            <div class="col-md-7">
                                                <select  id="unidad" name="unidad" class="select-css">
                                                    @foreach($unidad as $item)
                                                        @if ($product->unit_id == $aux)
                                                            <option selected="true" value="{{$item->id}}">{{$item->descripcion}}</option>
                                                        @else
                                                            <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                                        @endif
                                                        @php $aux = $aux + 1; @endphp
                                                    @endforeach
                                                </select>
                                                @error('unidad')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    @php $aux = 1; @endphp

                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3" for="categoria">Categoria :</label>
                                            <div class="col-md-7">
                                                <select  id="categoria" name="categoria" class="select-css">
                                                    @foreach($categoria as $item)
                                                        @if ($product->category_id == $aux)
                                                            <option selected="true" value="{{$item->id}}">{{$item->descripcion}}</option>
                                                        @else
                                                            <option value="{{$item->id}}">{{$item->descripcion}}</option>
                                                        @endif
                                                        @php $aux = $aux + 1; @endphp
                                                    @endforeach
                                                </select>
                                                @error('categoria')
                                                <div class="form-control-feedback" style="color:red">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="offset-sm-5">
                            <a type="button" href="{{route('cancelarProduct')}}" class="btn btn-info btn">Cancelar</a>
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

