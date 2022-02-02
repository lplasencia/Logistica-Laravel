@extends('layouts.app')

@section('section')

<section class="content">

    <div class="container-fluid">
        <label for="">Fecha Inicio</label>
        <input type="text" id="inicio" name="inicio" value="{{$inicio}}">

        <label for="">Fecha Fin</label>
        <input type="text" id="fin" name="fin" value="{{$fin}}">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable" >
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-chart-bar mr-1"></i>
                Sales
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active">
                  <div class="chart-container" style="position: relative; height:40vh; width:80vw">
                    <body onload="init()">
                        <canvas  id="myChart" width="20px" height="20px"></canvas>
                    </body>
                     
                  </div>
                 </div>
              </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>

@endsection

@section('canvas')

<script>

    // cadena = [];
    // var cadena = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado"]

    function init()
    {
        ini =$("#inicio").val(); 
        fin =$("#fin").val(); 
        cont = 0;
        mitad = 0;

        $.get('/reporte/venta/info/'+ini+'/'+fin, function(data){

            //Sacar el tamaño del array ya que length no quiere funcionar
            data.forEach(element => {
              cont = cont + 1;
            });

            //Sacando la mitad del array
            mitad = cont/2;

            var meses = data.slice(0,mitad);
            var totales = data.slice(mitad,cont);

            //Llamar a la funcion para graficar
            grafico(meses,totales);
        });

        
        
        // alert(cadena);
        
    }

    function grafico(cadena,valores)
    {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cadena,
                datasets: [{
                    label: "Ventas s/.",
                    data: valores,
                    backgroundColor: [
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(54, 162, 235, 0.2)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
  

</script>

@endsection

