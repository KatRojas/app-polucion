<?php
	 require("config.php");
	 $query ="select npolucion,fecha,hora from polucion";
	 $resultado=pg_query($conexion,$query) or die("ERROR en la consulta");
	 $numReg=pg_num_rows($resultado);
	  while($fila=pg_fetch_array($resultado)){
			//guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
			$polucion[] =(double)$fila['npolucion'];
			$hora[]=$fila['hora'];
			$fehca[]=$fila['fecha'];
		}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>El aire que respiro </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<link rel="stylesheet" href="bootstrap-social.css">
</head>
<body>
	<div class="jumbotron text-center">
  <h1>El Aire que Respiro!</h1>
  <p>infomacion sobre la calidad del Aire en Temuco</p>
</div>

	<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="nosotros.html">Nosotros</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Informacion del Aire
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="polucion_aire.php">Polucion Del Aire</a>
          <a class="dropdown-item" href="graficos.php">Graficos</a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </div>
</nav>

<script type="text/javascript">

var polucion =<?php echo json_encode($polucion);?>;
			console.log(polucion);
			var buena = 0;
			var moderado= 0;
			var dañina_a_la_salud_y_los_grupos_sensitivos = 0;
			var dañina_a_la_salud = 0;
			var muy_dañina = 0;
			var arriesgado = 0;

			for (var i = 0; i < polucion.length; i++) {
				if (polucion[i]>=0 && polucion[i]<=50){
						buena=buena+1;
				}
				if (polucion[i]>=51 && polucion[i]<=100){
						moderado=moderado+1;
				}
				if (polucion[i]>=101 && polucion[i]<=150){
					dañina_a_la_salud_y_los_grupos_sensitivos	=dañina_a_la_salud_y_los_grupos_sensitivos+1;
				}
				if (polucion[i]>=151 && polucion[i]<=200){
					dañina_a_la_salud	=	dañina_a_la_salud	+1;
				}
				if (polucion[i]>=201 && polucion[i]<=300){
					muy_dañina=muy_dañina+1;
				}
				if (polucion[i]>=301){
					arriesgado = arriesgado +1;
				}
			}
</script>


<div id="container"></div>
<div id="contenedor" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<!--Footer Links-->
<div class="container mt-5 mb-4 text-center text-md-left">
    <div class="row mt-3">

        <!--First column-->
        <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
            <h6 class="text-uppercase font-weight-bold">
                <strong>El Aire Que respiro</strong>
            </h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>El Proposito general de esta pagina es entregar  registros
            de contaminacion.generar conciencia en las personas y el aire que respiramos,debemos actuar si queremos una mejora en este. </p>
        </div>
        <!--/.First column-->

        <!--Second column-->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold">
                <strong>Informacion Del Aire</strong>
            </h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
                <a href="graficos.php">Graficos</a>
            </p>
            <p>
                <a href="polucion_aire.php">Niveles de contaminacion</a>
            </p>
        </div>
        <!--/.Second column-->

        <!--Third column-->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold">
                <strong>Redes Sociales</strong>
            </h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
                <a href="#!" class="btn btn-block btn-social btn-facebook">Facebook</a>
            </p>
            <p>
                <a href="#!"class="btn btn-block btn-social btn-google">Gmail</a>
            </p>
            <p>
                <a href="#!"class="btn btn-block btn-social btn-instagram">Instagram</a>
            </p>
        </div>
        <!--/.Third column-->

        <!--Fourth column-->
        <div class="col-md-4 col-lg-3 col-xl-3">
            <h6 class="text-uppercase font-weight-bold">
                <strong>Contacto</strong>
            </h6>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
                <i class="fa fa-home mr-3"></i> Temuco Barros Arana 205 ,CH</p>
            <p>
                <i class="fa fa-envelope mr-3"></i> elairequerespiro@gmail.com</p>
            <p>
                <i class="fa fa-phone mr-3"></i> + 56957627987</p>
            <p>
                <i class="fa fa-print mr-3"></i> + 56989756423</p>
        </div>
        <!--/.Fourth column-->

    </div>
</div>
<!--/.Footer Links-->
<script>
Highcharts.chart('container', {

    title: {
        text: 'El Aire que Respiro'
    },
    yAxis: {
        title: {
            text: 'Nivel De polucion'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 0
        }
    },
    series: [{
        name: 'Polucion',
        data: polucion,
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
});

</script>
<script type="text/javascript">
Highcharts.chart('contenedor', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Agrupacion de datos mediante porcentaje El aire que Respiro'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Marca',
        colorByPoint: true,
        data: [{
            name: 'Buena',
            y: buena,
            sliced: true,
            selected: true
        }, {
            name: 'Moderada',
            y: moderado
        }, {
            name: 'Dañina a la salud y a los grupos sensitivos',
            y: dañina_a_la_salud_y_los_grupos_sensitivos
        }, {
            name: 'Dañina a la salud',
            y: dañina_a_la_salud
        }, {
            name: 'Muy Dañina',
            y: muy_dañina
        }, {
            name: 'Arriesgado',
            y: arriesgado
        },]
    }]
});
</script>
</body>
</html>
