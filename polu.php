<?php

$user = "postgres";
$password = "12345";
$dbname = "datos";
$port = "5432";
$host = "localhost";

$cadenaConexion = "host=$host port=$port dbname=$dbname user=$user password=$password";

$conexion = pg_connect($cadenaConexion) or die("Error".pg_last_error());
echo "LISTO";

$query ="select npolucion,fecha,hora from polucion";

$resultado=pg_query($conexion,$query) or die("ERROR en la consulta");

$numReg=pg_num_rows($resultado);

if($numReg>0){
  echo "<table border='1' align='center'>
        <tr bgcolor='skyblue'>
        <th>npolucion</th>
        <th>fecha</th>
        <th>hora</th></tr>";
  while($fila=pg_fetch_array($resultado)){
    echo "<tr><td>".$fila['npolucion']."</td>";
    echo "<td>".$fila['fecha']."</td>";
    echo "<td>".$fila['hora']."</td></tr>";
  }
        echo "</table>";
}else {
  echo "NO hay";
}

pg_close($conexion);
 ?>
