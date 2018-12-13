<?php
$user = "polucion";
$password = "Polucion2018";
$dbname = "polucion";
$port = "5432";
$host = "db.inf.uct.cl";

$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

$conexion = pg_connect($cadenaConexion) or die("Error".pg_last_error());


 ?>
