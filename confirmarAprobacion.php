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
    <title>Centro Fitness</title>
    <script>
        function confirmarDesaprobacion(){
      var respuesta=confirm("¿Esta seguro que desea desaprobar?");
      if (respuesta == false){
       event.preventDefault();
     }  
     }

     function confirmarAprobacion(){
      var respuesta=confirm("¿Esta seguro que desea aprobar?");
      if (respuesta == false){
       event.preventDefault();
     }  
     }
    </script>
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
              </ul>
            </div>
          </nav>
          <!-- cierre de barra de navegación-->
    </header>
    <body>

    <?php
       include("conexion.php");

       include("mostrarUsuario.php");
       
      /*restringir  */

      if($privilegio=="empresa"){
 
       header("location:/multaprocess/verMulta.php");
 
     }
 
       /* restringir */

       date_default_timezone_set("America/Argentina/Buenos_Aires");

         $id=htmlentities(addslashes($_GET["id"]));
         
         $fecha=date("Y-m-d H:i:s");

         $latinFecha=date("d-m-Y H:i:s", strtotime($fecha)); 
       
       $sql="SELECT * FROM ARCHIVOS WHERE ID=$id";
           
       if($resultado=mysqli_query($miconexion,$sql)){
       
           while($registro=mysqli_fetch_assoc($resultado)){
       
              $idarchivo=$registro["idarchivo"];
       
              $nombrearchivo=$registro["nombrearchivo"];
       
              $id=$registro["id"];
    
           }


        } 


        $videoSinExtension=substr($nombrearchivo, 0, -4);

        $nombreImagen=$videoSinExtension.".jpg";

        $sql2="SELECT * FROM ARCHIVOS WHERE NOMBREARCHIVO ='$nombreImagen' ";

        if($resultado2=mysqli_query($miconexion,$sql2)){
    
    
        while($registro2=mysqli_fetch_assoc($resultado2)){
    
          $idImagen=$registro2["idarchivo"];

          $nombreImagen=$registro2["nombrearchivo"];
    
        }
    
      }
    
      

        mysqli_close($miconexion);

    ?>
    <div class="container">
    <center>
        <h2 class="text-primary mt-5">Confirmar aprobación</h2>
    
    <div class="col-md-8 col-lg-6 mt-5">
        <form action="aprobacionMunicipal.php" method="POST">
        <div class="form-group">
          <label class="text-primary" for="formGroupExampleInput">ID</label>
          <input  type="number" name="id" value="<?php echo $id  ?>"  class="form-control mt-3 text-danger" id="formGroupExampleInput" placeholder="Documento Nacional De Identidad" required readonly>
        </div>
        <div class="form-group">
          <label class="text-primary" for="formGroupExampleInput">Link del video</label>
          <input  type="text" name="link" value="https://drive.google.com/file/d/<?php echo $idarchivo  ?>/preview"  class="form-control mt-3 text-danger" id="formGroupExampleInput" placeholder="Documento Nacional De Identidad" required readonly>
        </div>
        <div class="form-group">
          <label class="text-primary" for="formGroupExampleInput">Link de la imagen</label>
          <input  type="text" name="imagen" value="https://drive.google.com/file/d/<?php echo $idImagen ?>/preview"  class="form-control mt-3 text-danger" id="formGroupExampleInput" placeholder="Documento Nacional De Identidad" required readonly>
        </div>
        <div class="form-group">
          <label class="text-primary" for="formGroupExampleInput">Fecha</label>
          <input  type="text" name="fecha" value="<?php echo  $fecha ?>"  class="form-control mt-3 text-danger" id="formGroupExampleInput" placeholder="Documento Nacional De Identidad" required readonly>
        </div>
        <div class="form-group">
          <label class="text-primary" for="formGroupExampleInput">Número de Acta</label>
          <input  type="number" name="acta"  class="form-control mt-3 text-danger" id="formGroupExampleInput" placeholder="Número de Acta" required >
        </div>
        <div class="form-group">
          <label class="text-primary" for="formGroupExampleInput">Observación</label>
          <textarea class="form-control" name="observacion" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" onclick="confirmarAprobacion();">Confirmar</button>
    </form>
    </div>   
    <br><br><br><br>
    </center>
    </div>    

</body>
</html>