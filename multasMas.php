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
    <title>EVALUAR MULTAS MASIVAS</title>
</head>

<style>
   #video{
    display: none;
  }


</style>
<script>

function video(){

var video=document.getElementById("video");

var imagen=document.getElementById("imagen");

video.style.display ="block"; 

imagen.style.display ="none"; 


}

function imagen(){

var video=document.getElementById("video");

var imagen=document.getElementById("imagen");

video.style.display ="none"; 

imagen.style.display ="block"; 


}

      function aprobar(){
      var respuesta=confirm("¿Esta seguro que desea aprobar la infracción?");
      if (respuesta == false){
       event.preventDefault();
     }

     }



     function desaprobar(){
      var respuesta=confirm("¿Esta seguro que desea desaaprobar la infracción?");
      if (respuesta == false){
       event.preventDefault();
     } else if(respuesta == true){


        var elemento =document.getElementById("progress-bar");

        elemento.style.width ="1000px" 
 
     }
     }

</script> 

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
    <?php

include("conexion.php");


      $sql2="SELECT * FROM ARCHIVOS WHERE NOMBREARCHIVO LIKE '%.mp4%'";

      $count=0;
              
      if($resultado2=mysqli_query($miconexion,$sql2)){
  
      while($registro2=mysqli_fetch_assoc($resultado2)){
      
        $count=$count+1;
  
  
      }
      
    }


  ?>
    <body><br><br>
     <center><h2 class="text-primary"> Evaluar Multas  (<?php echo $count  ?>) </h2> </center>

<?php



$sql="SELECT * FROM ARCHIVOS WHERE NOMBREARCHIVO LIKE '%.mp4%' order by rand() LIMIT 1";

            
if($resultado=mysqli_query($miconexion,$sql)){

while($registro=mysqli_fetch_assoc($resultado)){

        $idarchivo=$registro["idarchivo"];
       
       $nombrearchivo=$registro["nombrearchivo"];

       $id=$registro["id"];

       $fecha=$registro["fecha"];

       $latinFecha=date("d-m-Y H:i:s", strtotime($fecha)); 

      }

    }

    $videoSinExtension=substr($nombrearchivo, 0, -4);

    $nombreImagen=$videoSinExtension.".jpg";


    $sql2="SELECT * FROM ARCHIVOS WHERE NOMBREARCHIVO ='$nombreImagen' order by rand() LIMIT 1";

    if($resultado2=mysqli_query($miconexion,$sql2)){


    while($registro2=mysqli_fetch_assoc($resultado2)){

        $idImagen=$registro2["idarchivo"];

        $nombreImagen=$registro2["nombrearchivo"];



    }

  }




?>




    <div class="container"><br><br>
            <table class="table table-primary mt-5">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">FECHA</th>
                    <th scope="col">LINK DEL VIDEO</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                <tr>
                    <th scope="row"><?php  echo  $id  ?></th>
                    <td><?php  echo  $latinFecha ?></td>
                    <td><a class="btn btn-success text-light" href="https://drive.google.com/file/d/<?php echo $idarchivo  ?>/preview" target="_blank"> ver en otra pestaña </a></td>
                    <td><a class="btn btn-primary text-light" onclick="aprobar()" href="confirmarAprobacion.php?id=<?php echo $id  ?>" > APROBAR</a></td>
                    <td><a class="btn btn-danger text-light" onclick="desaprobar()" href="desaprobacionMunicipal.php?url=<?php echo $idarchivo  ?>&id=<?php echo  $id ?>&urlImg=<?php echo $idImagen  ?>"> DESAPROBAR </a></td>
                  </tr>
                  <br>
                  <center>
                    <div class="container" id="video">
                    <center><h2 class="text-danger">VIDEO: <?php echo $nombrearchivo ?></h2></center>
    <iframe src="https://drive.google.com/file/d/<?php echo $idarchivo ?>/preview" width="640" height="480" allow="fullscreen"></iframe><br><br>
    </div>   
        <br>
      <div class="container" id="imagen">
                    <center><h2 class="text-danger">IMAGEN: <?php echo $nombreImagen ?></h2></center>
    <iframe src="https://drive.google.com/file/d/<?php echo $idImagen ?>/preview" width="640" height="480" allow="fullscreen"></iframe><br><br>
    </div>   
    </center>
        <div class="row justify-left-left">
                <div class="col-12 col-md-2 col-lg-2 col-xl-2    ">
                     <a class="btn btn-success text-light" onclick="imagen();" >IMAGEN <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
  <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
  <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
</svg> </a>
                </div><br><br><br>
            <div class="col-12 col-md-2 col-lg-2 col-xl-2  ">
            <a class="btn btn-success text-light" onclick="video();"> VIDEO <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-film" viewBox="0 0 16 16">
  <path d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0v6h8V1H4zm8 8H4v6h8V9zM1 1v2h2V1H1zm2 3H1v2h2V4zM1 7v2h2V7H1zm2 3H1v2h2v-2zm-2 3v2h2v-2H1zM15 1h-2v2h2V1zm-2 3v2h2V4h-2zm2 3h-2v2h2V7zm-2 3v2h2v-2h-2zm2 3h-2v2h2v-2z"/>
</svg></a>
                </div>
            </div>
        </div>
        <div class="progress">
       <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
      </div>
    </div>    





<?php




mysqli_close($miconexion);

?>

    </body>

    </html>