<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <!-- Start Page Content -->
    
        <!-- Container fluid  -->
        <div class="container-fluid">
            <!-- Start Page Content -->
            <div class="row" style="justify-content: center">
                <div class="col-lg-8 responsive-md-100">
                    <div class="card card-outline-info">
                        <div class="alert  hidden" role="alert"></div>
                            <div class="card-body" style="padding-top: 2%; padding-bottom: 2%; padding-left: 5%">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div style="width: 20%; height: 180px; float: left; margin-right: 25px">
                                                <img src="/imagen/logo.jpg" style="height: 100%" >
                                            </div>
                                            <div style="width: 47%; height: 180px; float: left">
                                                <div class="row" style="text-align:center">
                                                    <h1>VIDRIERÍA  "ALVA"</h1>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-11" style="text-align:center">
                                                        <p style="font-size: 15px">FABRICACIÓN - INSTALACIÓN - MANTENIMIENTO</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6" style="text-align:center">
                                                        <p style="font-size: 11px">
                                                            VIDRIOS y ALUMINIO : <br>
                                                            - Ventanas, Puertas <br>
                                                            - Muro Cortinas <br>
                                                            - Puertas de duchar <br>
                                                            - Carpinteria de aluminio
                                                        </p>
                                                    </div>
                                                    <div class="col-md-5" style="text-align:center">
                                                        <p style="font-size: 11px">
                                                            SERVICIOS EN MELANINA : <br>
                                                            - Muebles de cocina <br>
                                                            - Closet * Roperos <br>
                                                            - Estantes * Escritorios <br>
                                                            - Asesoria en decoraciones
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="width: 29%; height: 180px; float: left">
                                                <div class="row" style="text-align:center">
                                                    <b style="font-size: 25px">R.U.C. 10188726297</b>
                                                    <b style="font-size: 25px">BOLETA DE VENTA</b>
                                                    @php
                                                        $numero = 0;
                                                        if($info[0]->num_comprobante%10 < 9)
                                                        {
                                                            $valor = $info[0]->num_comprobante + 0; // para quitar los ceros de delante
                                                            $tam = strlen($valor);
                                                            for($i = 0; $i<6 - $tam  ; $i++)
                                                            {
                                                                $numero = $numero."0";
                                                            }
                                                            $numero = $numero.$valor;
                                                        }
                                                        else
                                                        {
                                                            $valor = $info[0]->num_comprobante + 0; // para quitar los ceros de delante
                                                            $tam = strlen($valor);
                                                            $tam++;
                                                            for($i = 0; $i<6 - $tam ; $i++)
                                                            {
                                                                $numero = $numero."0";
                                                            }
                                                            $numero = $numero.$valor;
                                                        }
                                                    @endphp
                                                    <p style="font-size: 25px"> 00001 - {{$numero}} </p>
                                                </div>
                                                <div class="row" style="text-align:center;">
                                                    <p style="font-size: 25px"> FECHA : {{$info[0]->fecha}} </p>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:200px">
                                                <div class="col-md-2">
                                                    <p class="font-monospace">Sr. (es) :</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="total" name="total" value="{{$info[0]->nombre}}" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 15px">
                                                <div class="col-md-2">
                                                    <p class="font-monospace">Dirección :</p>
                                                </div>
                                                <div class="col-md-8" >
                                                    <input type="text" id="total" name="total" value="{{$info[0]->direccion}}" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="table-responsive" style="margin-top: 20px">
                                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover ">
                                                    <thead style="background: #1976D2; color:white; opacity: 0.9">
                                                        <tr>
                                                            <th style="text-align:center">Cantidad</th>
                                                            <th style="text-align:center; width: 50%">Descripcion</th>
                                                            <th style="text-align:center">P. Unitario</th>
                                                            <th style="text-align:center">Importe</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($detalle as $item)
                                                            <tr>
                                                                <td style="text-align: center">{{ $item->cantidad }}</td>
                                                                <td style="text-align: center">{{ $item->nombre }}</td>
                                                                <td style="text-align: center">{{ $item->precio_venta }}</td>
                                                                <td style="text-align: center">{{ $item->importe }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row" style="margin-top: 30px">
                                                <div class="col-md-7">
                                                    <p class="fw-normal" style="font-size: 11px">
                                                        Dirección : Cal. Nicolas de Pierola Mz I Lote: 15. Urb. Terraplen B <br>
                                                        Chocope - Ascope - La Libertad - Cel : 988377394/954165928
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="font-monospace">s/.TOTAL :</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <input type="text" id="total" name="total" value="{{$total[0]->total}}" class="form-control" >
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

</body>
</html>