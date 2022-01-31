<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venta Diaria</title>
</head>
<style>
    table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        font-size: 12px;    margin: 45px;     width: 600px; text-align: left;    border-collapse: collapse;
        margin-top: 80px; 
    }

    th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
        border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

    td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
        color: #669;    border-top: 1px solid transparent; }

    tr:hover td { background: #d0dafd; color: #339; }

    .input{
        margin-left: 15px;  width: 130px; height: 100px;
    }
</style>
<body>
    <div>
        <h2 style="margin-left: 45px">REPORTE VENTAS DE HOY</h2>
    </div>
    <div>
        <div style="float: left; margin-left: 50px;">
            <h4>Fecha : {{$date}} </h4>
        </div >
    </div>
    <div>
        <table class="table">
            <tr>      
              <th style="text-align:center">Id Producto</th>  
              <th style="text-align:center">Nombre</th>
              <th style="text-align:center">Precio Venta</th>
              <th style="text-align:center">Cantidad</th>
              <th style="text-align:center">Subtotal</th>
            </tr>
            @foreach($valor as $item)
                <tr> 
                    <td style="text-align:center">{{$item->id}}</td>
                    <td style="text-align:center">{{$item->nombre}}</td>
                    <td style="text-align:center">{{$item->precio_venta}}</td>
                    <td style="text-align:center">{{$item->cantidad}}</td>
                    <td style="text-align:center">{{$item->subtotal}}</td>
                </tr>
            @endforeach
          </table>
    </div>
    <div>
        <div style="float: left; margin-left: 300px;">
            <h3>TOTAL : {{$total[0]->total}} </h3>
        </div >
    </div>
</body>
</html>