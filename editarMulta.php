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
    <script>  
    function confirmarEdit(){
    var respuesta=confirm("¿Esta seguro que desea EDITAR?");
    if (respuesta == false){
    event.preventDefault();
        }  
    }

    </script>
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
                  <a class="nav-link">Editar Multa<span class="sr-only">(current)</span></a>
                </li>
              </ul>
            </div>
          </nav>
          <!-- cierre de barra de navegación-->
    </header>
    

    <body>
    <?php
         include("conexion.php"); 

         $id=htmlentities(addslashes($_GET["id"]));

         $sql="SELECT * FROM archivos  WHERE id='$id'  ";

        if($resultado=mysqli_query($miconexion,$sql)){

        while($registro=mysqli_fetch_assoc($resultado)){

          $patente=$registro["patente"];

          $hora=$registro["hora"];

          $fecha=$registro["fecha"];


        }

        
        }

    ?>
        
    <div class="container"><br><br><br>
    <center><h3 class="text text-info">EDITAR MULTA</h3></center><br><br><br>
    <center><form action="aplicarEdicionMulta.php" method="post" class="col-md-6">
    <div class="form-group">
    <label for="titulo">PATENTE</label>
    <input class="form-control" name="patente" value="<?php echo $patente  ?>" type="text"  >
        </div><br>
        <div class="form-group">
    <label for="titulo">FECHA</label>
    <input class="form-control" name="fecha"  value="<?php echo $fecha  ?>" type="date"  >
        </div><br>
        <div class="form-group">
    <label for="titulo">HORA</label>
    <input class="form-control" name="hora" value="<?php echo $hora ?>"  type="time"  step=1 >
        </div><br>
  <input type="hidden" name="id" value="<?php echo $id  ?>">
  <button class="btn btn-info" onclick="confirmarEdit();" type="submit">Editar </button>
    </form></center>




    </div>


</body>
  </html>  