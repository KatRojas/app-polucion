<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LISTAR ALUMNOS</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="jquery-1.11.2.min.js"></script>
<script type="text/javascript"></script>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>






<?php

        require_once 'config.php';   
        $stmt = $dbcon->prepare('SELECT * FROM datos');
        $stmt->execute();
        echo "<table id='tabla' class='table table-dark' ";
        
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>

            <option value="<?php echo $Npolucion;  ?>">
            <?php echo"<tr><td>"; echo $row['Npolucion']?>
            <?php echo"<td>";     echo $row['Fecha']?>
            <?php echo "</tr>";?>
            	
            </option>
            <?php
        }
    		echo "</table>";
        
        ?>
         </head>


<body>
<script type="text/javascript">
    $(document).ready( function () {
    $('#tabla').DataTable();
} );

</script>

</body>
</html>