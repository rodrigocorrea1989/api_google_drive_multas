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
                  <a class="nav-link">ACTA <span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
          </nav>
          <!-- cierre de barra de navegación-->
    </header>
    

    <body>
    
    <center> <h2 class="text-danger mt-5"> Ver Infracción </h2></center>
    <div class="container">
      <center>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
    <div class="form-group">
          <input  type="number" name="acta"  class="form-control mt-3 text-danger col-4 mt-5" id="formGroupExampleInput" placeholder="Ingrese Número De Acta" required>
        </div>
        <button  type="submit" class="btn btn-primary mb-2">Ver infracción</button>
    </form>
</center>
    </div>

<?php 

if(isset($_POST["acta"])){

    $acta=htmlentities(addslashes($_POST["acta"]));
    
    include("conexion.php");

        $sql="SELECT * FROM MULTAS WHERE ACTA='$acta'";
    
        if($resultado=mysqli_query($miconexion,$sql)){

        while($registro=mysqli_fetch_assoc($resultado)){

            $linkVideo=$registro["linkvideo"];

            $observacion=$registro["observacion"];

            $linkImagen=$registro["linkimagen"];


        }

    }   
  
    }else{

        $linkVideo=" ";

        $observacion=" ";
    
        
        echo "<style> 
                
                #frameMulta{
                    display:none;
                }

                #frameMulta{
                  display:imagen;
              }

        </style>";

       
  
    } 

?>
<br><br>
<center>
<h4 class="text-danger"> Infracción<br><br> <?php echo $observacion  ?></h4>
  <div class="container">
<div class="embed-responsive embed-responsive-16by9 col-8 mt-5" id="video">
                <iframe class="embed-responsive-item"  src="<?php echo $linkVideo ?>" allowfullscreen></iframe>
        </div>
  </div><br><br>
  <div class="container"  id="imagen">
<div class="embed-responsive embed-responsive-16by9 col-8 mt-5">
                <iframe  class="embed-responsive-item"  src="<?php echo $linkImagen ?>" allowfullscreen></iframe>
        </div> 
  </div>      
      </center> <br><br>
      <div class="container">
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






    <br><br><br><br>
</body>
  </html>  