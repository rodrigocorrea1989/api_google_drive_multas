<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img\pesa.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>multa process</title>
</head>


<header>  
        <!-- barra de navegación-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Página Principal <span class="sr-only">(current)</span></a>
</li>
                <li class="nav-item active"><a class="nav-link" href="logout.php"> Cerrar Sesión <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
  <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
  <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
</svg> </a></li>
              </ul>
            </div>
          </nav>
          <!-- cierre de barra de navegación-->
    </header>
    <body>
      <br><br>
      <?php 

    header("Pragma: public");
    header("Expires: 0");
    $filename = "reporteMultas.xls";
    header("Content-type: application/x-msdownload");
    header("Content-Disposition: attachment; filename=$filename");
    header("Pragma: no-cache");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
      
      include ("mostrarUsuario.php");

      /*restringir  */

      if($privilegio=="municipal"){

       header("location:evaluarMulta.php");

      }else if($privilegio=="empresa"){

      header("location:verMulta.php");

    }

      /* restringir */

      
      ?>
      <br><br>
    
      <div class="container">
   

   <center> <h2 class="text-primary font-weight-bold font-capitalize">MULTAS <a></a></h2></center>

    <table class="table table-primary table-striped mt-5">
        <thead class="thead-dark">
          <tr>
            <th scope="col"><center>NÚMERO</center></th>
            <th scope="col"><center>VIDEO</center></th>
            <th scope="col"><center>CAPTURA</center></th>
            <th scope="col"><center>NOMBRE DE ARCHIVO</center></th>
            <th scope="col"><center>ACTA</center></th>
            <th scope="col"><center>PATENTE</center></th>
            <th scope="col"><center>FECHA</center></th>
            <th scope="col"><center>HORA</center></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody >

<?php

    $contador=0;

    $sql="SELECT * FROM archivos  WHERE nombrearchivo LIKE '%.mp4%' ";

    
    if($resultado=mysqli_query($miconexion,$sql)){

    while($registro=mysqli_fetch_assoc($resultado)){

    $latinFecha=date("d-m-Y", strtotime($registro["fecha"]));    

    $contador=$contador+1;

    $patente=$registro["patente"];

    $acta=$registro["acta"];

    $id=$registro["id"];

    $sqlJPG="SELECT * FROM archivos  WHERE patente='$patente' AND nombrearchivo LIKE '%.jpg%'";

    if($resultadoJPG=mysqli_query($miconexion,$sqlJPG)){

      while($registroJPG=mysqli_fetch_assoc($resultadoJPG)){

        $captura=$registroJPG["idarchivo"];
        

       }

    }


    

?>


          <tr>
            <th scope="row"><center><?php echo  $contador ?></center></th>
            <td><a href="https://drive.google.com/file/d/<?php echo $registro["idarchivo"]  ?>/preview" target="_blank"><?php  echo  $registro["idarchivo"] ?></a></td>
            <td><a href="https://drive.google.com/file/d/<?php echo $captura  ?>/preview" target="_blank"><?php  echo  $captura  ?></a></td>
            <td><?php  echo  $registro["nombrearchivo"] ?></td>
            <td><?php  echo  $registro["acta"] ?></td>
            <td><?php  echo  $registro["patente"] ?></td>
            <td><?php  echo  $latinFecha ?></td>
            <td><?php  echo  $registro["hora"] ?></td>
            <td><a href="editarMulta.php?id=<?php echo $id  ?>" class="btn btn-danger text-light">EDITAR</a></td>
          </tr>
       


<?php
        }
    }
    
    mysqli_close($miconexion);

    //header("Location:reportesMultas.php");

?>


    </tbody>
      </table>    
            </div>




<!-- cierre de Contenido  -->


    </div>


    <br><br><br><br>
</body>
</html>