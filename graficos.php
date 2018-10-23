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
<link rel="stylesheet" type="text/css" href="estilolineatiempo.css">
<script src="../../../../dist/2.7.2/Chart.bundle.js"></script>
	<script src="../../utils.js"></script>
<script type="text/javascript" src="grafico.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
<?php

        require_once 'config.php';   
          $con=Conectar();
          $sql="SELECT * FROM datos";
          $stmt= $con->prepare($sql);
          $result=$stmt->execute();
          $verde=0;
          $amarillo=0;
          $naranjo=0;
          $rojo=0;
          $purpura=0;
          $burdeo=0;

        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
             $numero=(int)$row['Npolucion'];
             if($numero>=0 && $numero<=50){
              $verde=$verde+1;
            }

            if($numero>=51 && $numero<=100){
              $amarillo=$amarillo+1;
            }
             if($numero>=101 && $numero<=150){
              $naranjo=$naranjo+1;
            }
            if($numero>=101 && $numero<=150){
              $naranjo=$naranjo+1;
            }
            if($numero>=151 && $numero<=200){
              $rojo=$rojo+1;
            }
            if($numero>=201 && $numero<=300){
              $purpura=$purpura+1;
            }
            if($numero>=300){
              $burde=$burdeo+1;
            }
            ?>
            <?php
        }
        #echo "verde:".$verde;
        #echo "amarillo:".$amarillo;
        #echo "naranjo:".$naranjo;
        #echo "rojo:".$rojo;
        #echo "purpura:".$purpura;
        #echo" burdeo:".$burdeo; 
        ?>

<canvas id="myChart" width="200px" height="200px"></canvas>
<script>
var verde=("<php echo $verde;?>");
var amarillo=parseInt("<php echo $amarillo;?>");
var naranjo=parseInt("<php echo $naranjo;?>");
var rojo=parseInt("<php echo $naranjo;?>");
var purpura=parseInt("<php echo $purpura;?>");
var burdeo=parseInt("<php echo $burdeo;?>");
document.write(verde);
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["verde", "amarillo", "naranjo", "rojo", "purpura", "burdeo"],
        datasets: [{
            label: '# of Votes',
            data: [38, 59, 6,0,0,0],
            backgroundColor: [
                'rgba(0, 255, 0, 0.7)',
                'rgba(255,255,000, 0.7)',
                'rgba(255, 164, 32, 0.7)',
                'rgba(255, 35, 20, 0.7)',
                'rgba(160, 52, 18, 0.7)',
                'rgba(146, 43, 62, 0.7)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>







	
</body>
</html>