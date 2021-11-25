<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Export Checkbox</title>
</head>
<body>

 <table id="testTable"  class="table table-primary table-striped mt-5">
 <thead class="thead-dark">
   <tr>
     <th scope="col"><center>NÚMERO</center></th>
     <th scope="col"><center>VIDEO</center></th>
     <th scope="col"><center>CAPTURA</center></th>
     <th scope="col"><center>NOMBRE DE ARCHIVO</center></th>
     <th scope="col"><center>ID</center></th>
     <th scope="col"><center>PATENTE</center></th>
     <th scope="col"><center>ACTA</center></th>
     <th scope="col"><center>FECHA</center></th>
     <th scope="col"><center>HORA</center></th>
   </tr>
 </thead>
 <tbody >

 <?php
 

 include ("conexion.php");

 $id=$_POST["id"];

 $submit=$_POST["tipo"];

 if($submit=="EXPORTAR SELECCIONES"){

header("Pragma: public");
header("Expires: 0");
$filename = "reporteMultas.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 

 $contador=0;

foreach( $id as $row ){

  $contador=$contador+1;

  $sql="SELECT * FROM archivos  WHERE id='$row'";

    if($resultado=mysqli_query($miconexion,$sql)){

      while($registro=mysqli_fetch_assoc($resultado)){


        $patente=$registro["patente"];

        $id=$registro["id"];

        $idArchivo=$registro["idarchivo"];
    
        $acta=$registro["acta"];

        $nombreArchivo=$registro["nombrearchivo"];

        $hora=$registro["hora"];

        $fecha=$registro["fecha"];

        
    $latinFecha=date("d-m-Y", strtotime($fecha));    
  
        


      }

    }

    $sqlJPG="SELECT * FROM archivos  WHERE patente='$patente' AND nombrearchivo LIKE '%.jpg%'";

    if($resultadoJPG=mysqli_query($miconexion,$sqlJPG)){

      while($registroJPG=mysqli_fetch_assoc($resultadoJPG)){

        $captura=$registroJPG["idarchivo"];
        

       }

    }





?>



<tr>
            <th scope="row"><center><?php echo $contador ?></center></th>
            <td><a href="https://drive.google.com/file/d/<?php echo $idArchivo ?>/preview" target="_blank"><?php echo $idArchivo ?></a></td>
            <td><a href="https://drive.google.com/file/d/<?php echo $captura  ?>/preview" target="_blank"><?php  echo  $captura  ?></a></td>
            <th scope="row"><center><?php echo  $nombreArchivo ?></center></th>
            <td><center><?php echo $id  ?></center></td>
            <td><center><?php echo $patente ?></center></td>
            <td><center><?php echo $acta ?></center></td>
            <td><center><?php echo $fecha ?></center></td>
            <td><center><?php echo $hora ?></center></td>
          </tr>

           
          <?php  

}

         ?>
          </tbody>
      </table>
      <?php 

    }else if($submit=="QUITAR DE LA COLA"){

      foreach( $id as $row ){

        $estado="procesado";

        $updateSql="UPDATE archivos SET estado='$estado' WHERE id='$row'";

        $update=mysqli_query($miconexion,$updateSql);

       

      }

      //header("Location:reportesMultas.php?desde=".$desde."&hasta=".$hasta."&orden=".$orden);

      header("Location:reportesMultas.php");

    }

      
    mysqli_close($miconexion);
    ?>

</body>
</html>