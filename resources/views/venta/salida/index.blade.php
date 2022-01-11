@extends('layouts.app')

@section('section')

<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">VENTA</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Salida Almacen</a></li>
            <li class="breadcrumb-item active">Nueva Salida</li>
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
                    <div class="alert  hidden" role="alert"></div>
                    <form method="POST" action="{{-- {{ route('customer.store') }} --}}">
                        <div class="card-body" style="padding-top: 2%; padding-bottom: 2%; padding-left: 5%">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="">Cliente : </label>
                                        <select name="cliente" id="cliente" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                            <option value="" selected>-- Seleccione Cliente --</option>
                                            @foreach($cliente as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Impuesto : </label>
                                        <input type="text" id="tipo" name="tipo" value="{{$multitable[0]->porcentaje_impuesto}}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="row" style="height: 30px"></div>
                                <div class="row" style="border-style: solid ; border-color:rgb(177, 204, 204); margin-right:35px">
                                    <div class="row" style="margin-top: 20px; margin-left: 50px">
                                        <div class="col-md-7">
                                            <label for="">Producto : </label>
                                            <select class="form-control select2 select2-hidden-accessible selectpicker" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="producto_id" name="producto_id" data-live-search="true" onchange="mostrarProducto()">
                                                <option value="0" selected>-- Seleccione Producto --</option>          
                                                    @foreach($producto as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>                                 
                                                    @endforeach            
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Cantidad : </label>
                                            <input  type="text" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad">
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px; margin-left: 50px; margin-top:20px">
                                        <div class="col-md-5">
                                            <label for="">Precio de Venta : </label>
                                            <input  type="text" id="precio" name="precio" class="form-control" placeholder="Ingrese precio de venta" readonly>
                                        </div>
                                        <div style="margin-top: 20px; margin-left: 40%" class="col-md-3">
                                            <button type="button" id="btnadddet" class="btn btn-success" onclick="agregarDetalle()"><i class="fas fa-shopping-cart"></i> Agregar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="height: 30px"></div>
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="table-responsive">
                                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover ">
                                                <thead style="background: #1976D2; color:white; opacity: 0.9">
                                                    <tr>
                                                        <th style="text-align:center">Articulo</th>
                                                        <th style="text-align:center">P. Venta</th>
                                                        <th style="text-align:center">Cantidad</th>
                                                        <th style="text-align:center">Subtotal</th>
                                                        <th style="text-align:center">Operacion</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>                                                                                                                             
                                                </tfoot>
                                                <tbody>
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
                                            <input type="text" id="subtotal" name="subtotal" class="form-control" >
                                        </div>
                                        <div class="col-md-1">
                                            <label for="">S/. IGV: </label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="igv" name="igv" class="form-control" >
                                        </div>
                                        <div class="col-md-1">
                                            <label for="">S/. Total: </label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" id="total" name="total" class="form-control" >
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
</div>
<!-- End Container fluid  -->

<!-- End PAge Content -->
</div>
<!-- End Container fluid  -->

@endsection


<script>

    var cont=0;
    var total=0;
    var IGV = 0;
    var aux = 0;
    var detalleventa=[];
    var subtotal=[];
    var controlproducto=[];              


    $(document).ready(function(){

        $('#btnadddet').change(function(){
            agregarDetalle();
        });

        $('#producto_id').change(function(){
            mostrarProducto();
        });
    });

    function mostrarProducto()
    {                          
        producto_id=$("#producto_id").val();             
        $.get('/EncontrarProducto/'+producto_id, function(data){
            $('input[name=producto_id]').val(data.product_id);                   
            $('input[name=precio]').val(data.precio_venta);     
        });
    }

    function mostrarMensajeError(mensaje)
    {
        $(".alert").css('display', 'block');
        $(".alert").removeClass("hidden");
        $(".alert").addClass("alert-danger");
        $(".alert").html("<button type='button' class='close' data-close='alert'>×</button>"+
                            "<span><b>Error!</b> " + mensaje + ".</span>");
        $('.alert').delay(5000).hide(400);
    }


    function agregarDetalle()
    {  
        descripcion = $('#producto_id option:selected').text();  
        if (descripcion=='-- Seleccione Producto --')
        {
            mostrarMensajeError("Por favor seleccione el producto");    
            return false;   
        }     
        let cantidad=$("#cantidad").val();       
        if (cantidad=='' || Number(cantidad)==0 || cantidad==null)
        {
            mostrarMensajeError("Por favor ingrese cantidad del producto");    
            return false;
        }
        if (cantidad<=0)
        {
            mostrarMensajeError("Por favor debe escribir cantidad del producto mayor a 0");    
            return false;
        }  

        pventa=$("#precio").val();
        if (pventa=='' || pventa==0)
        {
            mostrarMensajeError("Por favor ingrese precio de venta del producto");    
            return false;
        }  
        cod_producto=$("#producto_id").val();
        
        /* Buscar que codigo de producto no se repita  */
        var i=0;
        var band=false;   
        while (i<cont)
        {
            if (controlproducto[i]==cod_producto)
            {
                band=true;
            }
            i=i+1;
        }
        if  (band==true)
        {
            mostrarMensajeError("No puede volver a vender el mismo producto");    
            return false;
        }
        else
        { 
            limpiar();  
            subtotal[cont]=cantidad*pventa;  
            controlproducto[cont]=cod_producto;
            total=total + subtotal[cont]; 
                    
            var fila='<tr class="selected" id="fila'+cont+'"><td style="text-align:center;"><input type="text" name="cod_producto[]" value="'+ descripcion +'" readonly style="width:200px; text-align:center;"></td><td  style="text-align:center;"><input type="number" name="pventa[]" value="'+ pventa +'" style="width:80px; text-align:center;" readonly></td><td style="text-align:center;"><input type="number" name="cantidad[]" value="'+ cantidad +'" style="width:80px; text-align:center;" readonly></td><td style="text-align:center;"><input type="number" name="subtotal[]" value="'+ subtotal[cont] +'" style="width:80px; text-align:center;" readonly></td><td style="text-align:center;"><button type="button" class="btn btn-danger btn-xs" onclick="eliminardetalle('+cod_producto+','+cont+');"><i class="fa fa-times" ></i></button></td></tr>';        
            $('#detalles').append(fila);      
            detalleventa.push({
                codigo:cod_producto,
                cantidad:cantidad,            
                pventa:pventa,
                subtotal:subtotal
            });        
            cont++;
        }
        tipo=$('#tipo').val();
        if  (tipo > 0)
        {
            IGV = total * tipo;
            aux = total + IGV;
        }

        $('#igv').val(number_format(IGV,2));
        $('#subtotal').val(number_format(total,2));
        $('#total').val(number_format(aux,2));
    }

    function limpiar()
    {
        $("#cantidad").val("");
        $("#pcompra").val("");
        $("#pventa").val("");
    }

    function eliminardetalle(codigo,index)
    {
        total=total-subtotal[index]; 
        tam=detalleventa.length;
        var i=0;
        var pos;      
        while (i<tam)
        {
            if (detalleventa[i].codigo==codigo)
            {
                pos=i;      
                break;                   
            }
            i=i+1;
        }
        if  (tipo > 0)
        {
            IGV = total * tipo;
            aux = total + IGV;
        }

        detalleventa.splice(pos,1);    
        $('#fila'+index).remove();
        controlproducto[index]="";
        $('#igv').val(number_format(IGV,2));
        $('#subtotal').val(number_format(total,2));
        $('#total').val(number_format(aux,2));
   }

   function number_format(amount, decimals) 
   {
        amount += ''; // por si pasan un numero en vez de un string
        amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto
        decimals = decimals || 0; // por si la variable no fue fue pasada
        // si no es un numero o es igual a cero retorno el mismo cero
        if (isNaN(amount) || amount === 0) 
            return parseFloat(0).toFixed(decimals);
        // si es mayor o menor que cero retorno el valor formateado como numero
        amount = '' + amount.toFixed(decimals);
        var amount_parts = amount.split('.'),
            regexp = /(\d+)(\d{3})/;
        while (regexp.test(amount_parts[0]))
            amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
        return amount_parts.join('.');
    }


</script>

@section('script')
<script src="js/lib/sweetalert/sweetalert.init.js"></script>
@endsection



