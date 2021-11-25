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
    <title>Crear Usuario</title>
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

    <?php  
    
      include("mostrarUsuario.php");

      /*restringir  */

      if($privilegio=="empresa"){
 
        header("location:verMulta.php");
  
      } else if($privilegio=="municipal"){

        header("location:evaluarMulta.php");

      }
  
        /* restringir */
    
    ?>

<br><br>
<center><h3 class="text-success">Crear Usuario</h3></center><br>
<center>

    <div class="container">
    <div class="col-md-8 col-lg-4 mt-5">
      <form action="success.php" method="POST">
      <div class="form-group">
    <label for="formGroupExampleInput" class="text-success">DNI</label>
    <input type="number" class="form-control" name="dni" id="formGroupExampleInput" placeholder="DNI">
  </div><br>
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-success">NOMBRE</label>
    <input type="text" class="form-control" name="nombre" id="formGroupExampleInput" placeholder="NOMBRE">
  </div><br>
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-success">APELLIDO</label>
    <input type="text" class="form-control" name="apellido" id="formGroupExampleInput" placeholder="APELLIDO">
  </div><br>
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-success">USUARIO</label>
    <input type="text" class="form-control" name="usuario" id="formGroupExampleInput" placeholder="USUARIO">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput" class="text-success">PASSWORD</label>
    <input type="password" class="form-control" name="password" id="formGroupExampleInput" placeholder="CONTRASEÑA">
  </div><br>
  <div class="form-group">
            <label for="inputState" class="text-success">PRIVILEGIO</label>
            <select id="inputState" name="privilegio" class="form-control">
            <option>admin</option>
            <option>empresa</option>
            <option>municipal</option>
            
</select>
</div>             
  <button type="submit" class="btn btn-success">CREAR</button>
</form>
</div>

    </div>

</center>
</body>
</html>   