@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" href="/calendario/css/bootstrap-datepicker.standalone.css">
<link rel="stylesheet" href="/select2/bootstrap-select.min.css">
@endsection

@section('section')


<div class="container">
      
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Salida de Inventario</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('salida.index') }}">Salida</a></li>
                <li class="breadcrumb-item active">Nueva Salida</li>
            </ol>
        </div>
    </div>
    
    <div class="container-fluid">
        <!-- Start Page Content -->
    
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row" style="justify-content: center">
                <div class="col-lg-12 responsive-md-100">
                    <div class="card card-outline-info">
                        <div class="alert  hidden" role="alert"></div>
                        <form method="POST" action="">
                            @csrf
                                <div class="row">
                                    <div class="col-md-1">                           
                                        <label for="">Fecha</label>
                                    </div>
                                    <div class="col-md-2">                        
                                        <div class="form-group">                            
                                            <div class="input-group date form_date " data-date-format="dd/mm/yyyy" data-provide="datepicker">
                                                <input type="text"  class="form-control" name="fecha" id="fecha"
                                                    value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" style="text-align:center;">
                                                <div class="input-group-btn">                                        
                                                    <button class="btn btn-primary date-set" type="button"><i class="fa fa-calendar"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>           
                                    <div class="col-md-1">
                                    </div>        
                                    <div class="col-md-1">
                                        <label for="">Tipo</label>
                                    </div>    
                                    <div class="col-md-2">                              
                                        <select class="form-control"  id="seltipo" name="seltipo"  onchange="mostrarTipo()">
                                            {{-- @foreach($tipo as $itemtipo)
                                                <option value="{{$itemtipo['tipo_id']}}" selected>{{$itemtipo['descripcion']}}</option>                                 
                                            @endforeach   --}}          
                                        </select>                                              
                                    </div>
                                    <div class="col-md-1">
                                    </div>        
                                    {{-- <div class="col-md-1">
                                        <label for="">No Doc. :</label>
                                    </div>    
                                    <div class="col-md-3">
                                        <input type="text" class="form-control" name="nrodoc" id="nrodoc" {{-- value="{{ $parametros->serie }}{{ $parametros->numeracion }}" >                              
                                    </div> --}}
                                </div>
                            
                                <div class="row">                                              
                                    <div class="col-md-1">
                                        <label for="">Cliente </label>        
                                    </div>
                                    <div class="col-md-7">       
                                        <select class="form-control select2 select2-hidden-accessible selectpicker" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="cliente_id" name="cliente_id" data-live-search="true" onchange="mostrarCliente()">
                                            <option value="0" selected>- Seleccione Cliente -</option>          
                                                @foreach($cliente as $itemcliente)
                                                    <option value="{{ $itemcliente->id }}_{{ $itemcliente->direccion }}" >{{ $itemcliente->nombre }}</option>                                 
                                                @endforeach         
                                        </select>                                                                  
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    {{-- <div class="col-md-1">
                                        <label for="">RUC/DNI</label>
                                    </div>    
                                    <div class="col-md-2">
                                        <div class="input-group">                                  
                                            <input type="text" class="form-control" name="ruc" id="ruc">      
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="row  pt-2">   
                                    <div class="col-md-1">
                                        <label for="">Dirección </label>        
                                    </div>
                                    <div class="col-md-11">
                                        <input type="text" class="form-control" name="direccion" id="direccion">        
                                    </div>
                                </div>
                                <div class="row pt-3">                
                                        <div class="col-md-1">
                                            <label for="">Producto </label>    
                                        </div>    
                                        <div class="col-md-6">
                                            <select class="form-control select2 select2-hidden-accessible selectpicker" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" id="producto_id" name="producto_id" data-live-search="true" onchange="mostrarProducto()">
                                                <option value="0" selected>- Seleccione Producto -</option>          
                                                    @foreach($product as $itemproducto)
                                                        <option value="{{ $itemproducto->id }}">{{ $itemproducto->nombre }}</option>                                 
                                                    @endforeach       
                                            </select>      
                                        </div>                                      
                                        <div class="col-md-1" style="text-align:right;">
                                            <label for="">Unidad :</label>        
                                        </div>         
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="unidad" id="unidad">                              
                                        </div>         
                                </div>  
                                <div class="row pt-3">                                
                                    <div class="col-md-1">
                                    </div>             
                                    <div class="col-md-1">
                                        <label for="">Precio </label>        
                                    </div>                         
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="precio" id="precio">                              
                                    </div>         
                                    <div class="col-md-1">
                                        <label for="">Cantidad </label>    
                                    </div>    
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="cantidad" id="cantidad">                              
                                    </div>        
                                    <div class="col-md-3">
                                        <button type="button" id="btnadddet" class="btn btn-success" onclick="agregarDetalle()"><i class="fas fa-shopping-cart"></i> Agregar la venta</button>
                                    </div>        
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="stock" id="stock" hidden>                              
                                    </div>         
                            </div>  

                            <div class="col-md-12 pt-3">     
                                <div class="table-responsive">                           
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover" style='background-color:#FFFFFF;'> 
                                        <thead class="thead-default" style="background-color:#3c8dbc;color: #fff;">
                                            <th width="10" class="text-center">OPCIONES</th>                                        
                                            <th class="text-center">CODIGO</th>                                 
                                            <th>DESCRIPCIÓN</th>
                                            <th>UNIDAD</th>
                                            <th  class="text-center">CANTIDAD</th>                                            
                                            <th class="text-center">P.VENTA</th>
                                            <th>IMPORTE</th>
                                        </thead>
                                        <tfoot>
                                                                                                                            
                                                                                                            
                                        </tfoot>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div> 
                                <div class="row">                       
                                    <div class="col-md-8">
                                    </div>   
                                    <div class="col-md-2">                        
                                        <label for="">Subtotal : </label>    
                                    </div>   
                                    <div class="col-md-2">
                                        <input type="text" class="form-control text-right" name="subtotal" id="subtotal" readonly="readonly">                              
                                    </div>   
                                </div>
{{--                                 <div class="row">                       
                                    <div class="col-md-8">
                                    </div>   
                                    <div class="col-md-2">                        
                                        <label for="">IGV : </label>    
                                    </div>   
                                    <div class="col-md-2">
                                        <input type="text" class="form-control text-right" name="IGV" id="IGV" readonly="readonly">                              
                                    </div>   
                                </div> --}}
                                <div class="row">                       
                                        <div class="col-md-8">
                                        </div>   
                                        <div class="col-md-2">                        
                                            <label for="">Total : </label>    
                                        </div>   
                                        <div class="col-md-2">
                                            <input type="text" class="form-control text-right" name="total" id="total" readonly="readonly">                              
                                        </div>   
                                </div>
                                
                            </div> 

                            <div class="col-md-12 text-center">  
                                <div  id="guardar">
                                    <div class="form-group">
                                        <button class="btn btn-primary" id="btnRegistrar" data-loading-text="<i class='fa a-spinner fa-spin'></i> Registrando">
                                            <i class='fas fa-save'></i> Registrar</button>    
                                
                                        <a href="{{URL::to('venta')}}" class='btn btn-danger'><i class='fas fa-ban'></i> Cancelar</a>              
                                    </div>    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>

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
        // $('#seltipo').change(function(){
        //     mostrarTipo();
        // });

        $('#cliente_id').change(function(){
            mostrarCliente();
        });

        $('#producto_id').change(function(){
            mostrarProducto();
        });

        $('#btnadddet').change(function(){
            agregarDetalle();
        });
    });


    /* function mostrarTipo(){
        codigotipo=$('#seltipo').val();
        $.get('/EncontrarTipo/'+codigotipo, function(data){
                $('input[name=nrodoc]').val(data[0].serie+data[0].numeracion);
            });
    } */

    function mostrarCliente(){
        datosCliente=document.getElementById('cliente_id').value.split('_');  
        //Enviar el codigo del cliente mediante un text hiden      
        $('#direccion').val(datosCliente[1]);   
    }

    function mostrarProducto(){                            
        producto_id=$("#producto_id").val();             
              $.get('/EncontrarProducto/'+producto_id, function(data){                       
                  $('input[name=producto_id]').val(data[0].id);   
                  $('input[name=unidad]').val(data[1].descripcion);    
                  $('input[name=precio]').val(data[0].precio_compra);
                  $('input[name=stock]').val(data[0].stock);      
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
        ruc=$("#ruc").val();    
        if (ruc=='')
        {
            mostrarMensajeError("Por favor seleccione el Cliente");    
            return false;
        }    
        descripcion = $('#producto_id option:selected').text();    
        if (descripcion=='Seleccione Producto')
        {
            mostrarMensajeError("Por favor seleccione el Producto");    
            return false;   
        }     
        let cantidad=$("#cantidad").val();   
        let stock= $("#stock").val();     
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
        if (Number(cantidad)>Number(stock))
        {
            mostrarMensajeError("No se tiene tal cantidad de producto solo hay " + stock);    
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
            unidad=$("#unidad").val();    
            subtotal[cont]=cantidad*pventa;  
            controlproducto[cont]=cod_producto;
            total=total + subtotal[cont]; 
                    
            var fila='<tr class="selected" id="fila'+cont+'"><td style="text-align:center;"><button type="button" class="btn btn-danger btn-xs" onclick="eliminardetalle('+cod_producto+','+cont+');"><i class="fa fa-times" ></i></button></td><td style="text-align:right;"><input type="text" name="cod_producto[]" value="'+ cod_producto +'" readonly style="width:50px; text-align:right;"></td><td>'+ descripcion +'</td><td><input type="text" name="unidad[]" value="'+ unidad +'" style="width:140px; text-align:left;"></td><td style="text-align:right;"><input type="number" name="cantidad[]" value="'+ cantidad +'" style="width:80px; text-align:right;" readonly></td><td  style="text-align:right;"><input type="number" name="pventa[]" value="'+ pventa +'" style="width:80px; text-align:right;" readonly></td><td style="text-align:right;">'+number_format(subtotal[cont],2)+'</td></tr>';        
            $('#detalles').append(fila);      
            detalleventa.push({
                codigo:cod_producto,
                unidad:unidad,
                cantidad:cantidad,            
                pventa:pventa,
                subtotal:subtotal
            });        
            cont++;
        }
        tipo=$('#seltipo').val();
        if  (tipo == 1)
        {
            IGV = total * 0.18;
            aux = total + IGV;
        }
        else
        {
            IGV = 0;
            aux = total;
        }

        $('#IGV').val(number_format(IGV,2));
        $('#subtotal').val(number_format(total,2));
        $('#total').val(number_format(aux,2));
    }

    function limpiar()
    {
        $("#cantidad").val(0);
        $("#precio").val(0);
        $("#IGV").val(0);
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
        if  (tipo == 1)
        {
            IGV = total * 0.18;
            aux = total + IGV;
        }
        else
        {
            IGV = 0;
            aux = total;
        }

        detalleventa.splice(pos,1);    
        $('#fila'+index).remove();
        controlproducto[index]="";
        $('#IGV').val(number_format(IGV,2));
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
    <script src="/select2/bootstrap-select.min.js"></script>     
     <script src="/calendario/js/bootstrap-datepicker.min.js"></script>
     <script src="/calendario/locales/bootstrap-datepicker.es.min.js"></script>
     <!-- <script src="/archivos/js/createdoc.js"></script>     
@endsection
