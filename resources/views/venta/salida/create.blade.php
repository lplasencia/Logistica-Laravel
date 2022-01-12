@extends('layouts.app')

@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">VENTA</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">venta final</a></li>
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
                    <form method="POST" action="{{ route('venta.save') }}">
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 2%; padding-left: 5%">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Tipo de Venta : </label>
                                        <select name="tipo_venta" class="form-control select2 select2-hidden-accessible selectpicker" style="width: 100%;" aria-label=".form-select-sm example">
                                            <option value="Contado" selected>Contado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Tipo de Comprobante : </label>
                                        <select name="tipo_comprobante" id="tipo" class="form-control select2 select2-hidden-accessible selectpicker" aria-label=".form-select-sm example" onchange="mostrarInfo()">
                                            <option value="" selected>--- Seleccione Comprobante ---</option>
                                            <option value="1" >Boleta</option>
                                            <option value="2" >Factura</option>
                                        </select>    
                                    </div>
                                </div>
                                <div class="row" style="height: 30px"></div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label for="">Serie : </label>
                                        <input type="text" id="serie" name="serie" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Numero : </label>
                                        <input type="text" id="numero" name="numero" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row" style="height: 30px"></div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Impuesto : </label>
                                        <input type="text" id="igv" name="igv" value="{{$multitable[0]->porcentaje_impuesto}}" class="form-control" placeholder="Ingrese impuesto" readonly>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Cliente : </label>
                                        <input type="text" id="cliente" name="cliente" value="{{$cliente->nombre}}" class="form-control" placeholder="Ingrese cliente" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Total : </label>
                                        <input type="text" id="total" name="total" value="{{$total}}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row" style="height: 30px"></div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="table-responsive">
                                            <table class="table table-hover " id="myTable">
                                                <thead style="background: #1976D2; color:white; opacity: 0.9">
                                                    <tr>
                                                        <th style="text-align:center">Codigo</th>
                                                        <th style="text-align:center">Articulo</th>
                                                        <th style="text-align:center">P. Venta</th>
                                                        <th style="text-align:center">Cantidad</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    @foreach($tabla as $item)
                                                    <tr>
                                                        <th scope="row" style="color: black; text-align: center">{{ $item->id }}</th>
                                                        <td style="text-align: center">{{ $item->nombre }}</td>
                                                        <td style="text-align: center">{{ $item->precio_venta }}</td>
                                                        <td style="text-align: center">{{ $item->cantidad }}</td>
                                                    </tr>
                                                    @endforeach
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
                                            <input type="text" id="subtotal" name="subtotal" value="{{$subtotal}}" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="">S/. IGV: </label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" value="{{$igv}}" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-1">
                                            <label for="">S/. Total: </label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="total" name="total" value="{{$total}}" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-2">
                                            <input type="text" id="order_id" name="order_id" value="{{$id}}" class="form-control" hidden>
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

<script>
        $(document).ready(function(){

            $('#tipo').change(function(){
                mostrarInfo();
            });
        });

        function mostrarInfo()
        {                         
            tipo=$("#tipo").val();            
            $.get('/EncontrarInfo/'+tipo, function(data){
                $('input[name=serie]').val(data[0].ultima_serie);                   
                $('input[name=numero]').val(data[0].ultimo_numero); 
            });
        }
</script>

@section('script')
<script src="js/lib/sweetalert/sweetalert.init.js"></script>
@endsection



