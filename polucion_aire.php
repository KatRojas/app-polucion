<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>El aire que respiro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="estilolineatiempo.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<link rel="stylesheet" href="bootstrap-social.css">


<!------ Include the above in your HEAD tag ---------->
</head>
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
<table id="tabla" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nivel De polucion</th>
                <th>Hora</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
         <?php
				 require("config.php");


				 // los datos son guardados en postgres y luego son mostrados
				 $query ="select npolucion,fecha,hora from polucion";

				 $resultado=pg_query($conexion,$query) or die("ERROR en la consulta");

				 $numReg=pg_num_rows($resultado);
				 $mayor = 0;
				 $promedio = 0;
				 $j = 0;
				 while($fila=pg_fetch_array($resultado)){

					 echo "<tr><td>".$fila['npolucion']."</td>";
					 echo "<td>".$fila['fecha']."</td>";
					 echo "<td>".$fila['hora']."</td></tr>";
					 settype($fila['npolucion'],"double");
					 if ($mayor < $fila['npolucion']){
						 $mayor=$fila['npolucion'];
					 }
					 $dato =$fila['npolucion'];
					 $datos[]=$dato;
					 $promedio=($promedio + $fila['npolucion']);
					 $j=$j+1;

					 }
				 //echo "Promedio:".round($promedio/$i,2);
				 //echo "mayor:".$mayor;
				 $menor = $datos[0];
				 for ($i=0; $i < count($datos) ; $i++) {
					 if ($datos[$i]<$menor && $datos[$i] != 0  || $menor == 0){
						 $menor = $datos[$i];
					 }

				 }
			 	 pg_close($conexion);

				?>

        </tbody>
        <tfoot>
            <tr>
                <th>Nivel de Polucion</th>
                <th>Hora</th>
                <th>Fecha</th>
            </tr>
        </tfoot>
    </table>


<div class="container">
    <div class="page-header">
        <h1 id="timeline">Niveles De Polucion</h1>
    </div>
    <ul class="timeline">
        <li>
          <div class="timeline-badge"></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Buena "0-50"</h4>

            </div>
            <div class="timeline-body">
              <p>No se anticipan impactos a la salud cuando la calidad del aire se encuentra en este intervalo. </p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge warning"></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Moderada "51-100"</h4>
            </div>
            <div class="timeline-body">
              <p>las personas extraordinariamente sensitivas deben considerar limitar esfuerzos fisicos excesivos
              y prolongados al aire libre.</p>

            </div>
          </div>
        </li>
        <li>
          <div class="timeline-naranjo"></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Dañina a la salud y a los grupos sensitivos "101-150"</h4>
            </div>
            <div class="timeline-body">
              <p>Los niños y adultos activos, y personas con enfermedades respiratorias tales como el asma,deben evitar los esfuersos fisicos excesivos y prolongados al aire libre </p>
            </div>
          </div>
        </li>



        <li class="timeline-inverted">
          <div class="timeline-rojo"></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Dañina a la salud "151-200"</h4>
            </div>
            <div class="timeline-body">
              <p>los niños y adultos activos, y personas con enfermedades respiratorias tales como el asma, deben evitar los esfuerzos excesivos prolongados al aire libre. Las demas personas,especialmente niños y adultos mayores,debenlimitar sus esfuerzos fisicos y excesivos al aire libre.</p>
            </div>
          </div>
        </li>

        <li>
          <div class="timeline-morado"></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Muy Dañina "201-300"</h4>

            </div>
            <div class="timeline-body">
              <p> Los niños y adultos mayores  activos,y personas con enfermedades respiratorias deben evitar esfuerzos fisicos excesivos al aire libre. las demas personas tanto como niños , jovenes y adultos deben limitar su expocision al minimo y no realizar esfuerzos fisicos al aire libre.</p>
            </div>
          </div>
        </li>

        <li class="timeline-inverted">
          <div class="timeline-burdeo"></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Arriesgado "300+"</h4>
            </div>
            <div class="timeline-body">
              <p> Muy Arriesgado para Salud de las personas</p>
            </div>
          </div>
        </li>

    </ul>
</div>

<div class="row">
  <div class="col-sm-4">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5 class="card-title">Nivel de Polucion Mas Bajo Registrado</h5>
        <p class="card-text-center"><?php echo $menor ?></p>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card text-white bg-primary mb-3">
      <div class="card-body">
        <h5 class="card-title">Promedio de datos polucion</h5>
        <p class="card-text-center"><?php echo round($promedio/$j,2)?></p>
      </div>
    </div>
  </div>
   <div class="col-sm-4">
    <div class="card text-white bg-warning mb-3">
      <div class="card-body">
        <h5 class="card-title">Nivel de Polucion Mas Alto Registrado</h5>
        <p class="card-text-center"><?php echo $mayor?></p>
      </div>
    </div>
  </div>
</div>




<script type="text/javascript">

$(document).ready( function () {
    $('#tabla').DataTable();
} );

</script>

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



</body>
</html>
