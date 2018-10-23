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
        <a class="nav-link" href="Nosotros.html">Nosotros</a>
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
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Button</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> 
<div class="row">
  <div class="col-sm-4">
    <div class="card text-white bg-info mb-3">
      <div class="card-body">
        <h5 class="card-title">Nivel de Polucion Mas Bajo Registrado</h5>
        <p class="card-text-center">51</p>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="card text-white bg-primary mb-3">
      <div class="card-body">
        <h5 class="card-title">Nivel de Polucion Actual</h5>
        <p class="card-text-center">50</p>
      </div>
    </div>
  </div>
   <div class="col-sm-4">
    <div class="card text-white bg-warning mb-3">
      <div class="card-body">
        <h5 class="card-title">Nivel de Polucion Mas Alto Registrado</h5>
        <p class="card-text-center">95</p>
      </div>
    </div>
  </div>
</div>
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
         $con=Conectar();
         $sql="SELECT * FROM datos";
         $stmt= $con->prepare($sql);
         $result=$stmt->execute();
         $rows= $stmt->fetchAll(\PDO::FETCH_OBJ);
         foreach($rows as $row){
          ?>
          <tr>
            <td><?php print ($row->Npolucion);  ?></td>
            <td><?php print ($row->fecha);  ?></td>
             <td><?php print ($row->hora);  ?></td>
          </tr>
          <?php 


         }
          ?>             
        </tbody>
        <tfoot>
            <tr>
                <th>Nivel de Polucion</th>
                <th>Hora</th>
                <th>Fecha/th>
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




<script type="text/javascript">
  
$(document).ready( function () {
    $('#tabla').DataTable();
} );

</script>




	
</body>
</html>