<?php

ob_Start();

?>
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
    function confirmarQuite(){
    var respuesta=confirm("¿Esta seguro que desea QUITAR DE LA COLA?");
    if (respuesta == false){
    event.preventDefault();
        }  
    }

    function confirmarReset(){
    var respuesta=confirm("¿Esta seguro que desea RESETEAR?");
    if (respuesta == false){
    event.preventDefault();
        }  
    }
    
    </script>

      <!-- exportar a excel -->
    <script>
    var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
    
    </script>
    
      <!-- exportar a excel -->


      <script>
     function toggle(source) {
   checkboxes = document.getElementsByName('id[]');
   for (var i = 0, n = checkboxes.length; i < n; i++) {
      checkboxes[i].checked = source.checked;
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
      


      include ("mostrarUsuario.php");

      /*restringir  */

      if($privilegio=="municipal"){

       header("location:evaluarMulta.php");

      }else if($privilegio=="empresa"){

      header("location:verMulta.php");

    }

      /* restringir */

        /*   filtrar por fecha  */

        if(isset($_GET["desde"])){

          $desde=htmlentities(addslashes($_GET["desde"]));     
          
          }else{
          
           $desde="2021-01-01";   
          
          } 
          
          if(isset($_GET["hasta"])){
          
              $hasta=htmlentities(addslashes($_GET["hasta"]));     
          
              }else{
          
               $hasta=date("Y-m-d");   
          
              } 

              if(isset($_GET["orden"])){
          
                $orden=htmlentities(addslashes($_GET["orden"]));     
            
                }else{
            
                 $orden="fecha";   
            
                }   

        /* filtrar por fecha  */



      ?>
      <br><br>
    
      <div class="container-fluid">

      <?php



         $estado="sin procesar";

        $count=0;
                
        if($orden=="id"){
        
        $sqlCount="SELECT * FROM archivos  WHERE nombrearchivo LIKE '%.mp4%' AND estado='$estado' AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY id ASC ";

        }else if($orden=="acta"){

          $sqlCount="SELECT * FROM archivos  WHERE nombrearchivo LIKE '%.mp4%' AND estado='$estado' AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY acta ASC ";

        }else {

          $sqlCount="SELECT * FROM archivos  WHERE nombrearchivo LIKE '%.mp4%' AND estado='$estado' AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC ";     

        }

          if($resultadoCount=mysqli_query($miconexion,$sqlCount)){

          while($registroCount=mysqli_fetch_assoc($resultadoCount)){

              $count=$count+1;

         }

        }


      ?>
   

   <center> <h2 class="text-primary font-weight-bold font-capitalize">MULTAS (<?php echo $count ?>) </h2></center><br>
 <!--<a onclick="tableToExcel('testTable', 'W3C Example Table')" class="btn btn-success text-light">EXPORTAR </a>-->
 <a class="btn btn-warning" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    FILTRAR
  </a>
  <a class="btn btn-info" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
    SELECCIONES
  </a>
  <br><br>
  <div class="collapse" id="collapseExample">
  <div class="card card-body">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
  <div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputEmail4">Desde</label>
      <input type="date" value="<?php echo $desde  ?>" class="form-control" name="desde" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Hasta</label>
      <input type="date" value="<?php echo $hasta  ?>" class="form-control" id="inputPassword4" name="hasta" placeholder="Password">
    </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Ordenar Por</label>
    <select class="form-control" name="orden" id="exampleFormControlSelect1">
      <option value="fecha">fecha</option>
      <option value="acta">acta</option>
      <option value="id">id</option>
    </select>
  </div>
  </div>
  <input type="submit" class="btn btn-primary" value="FILTRAR" class="form-control" id="inputPassword4" placeholder="Password">
  <a class="btn btn-info" href="reportesMultas.php">DESHACER</a>
      </form>
  </div>
</div><br><br>
<div class="collapse" id="collapseExample2">
  <div class="card card-body2">
<form action="exportCheckbox.php" method="POST">

<input type="submit" name="tipo" class="btn btn-danger" value="QUITAR DE LA COLA">   
<input type="submit" name="tipo" class="btn btn-success" value="EXPORTAR SELECCIONES">  
<a href="export.php" class="btn btn-info text-light">EXPORTAR TODO</a>
<a href="reset.php" onclick="confirmarReset();" class="btn btn-primary text-light">RESETEAR </a>
      </div>
      </div>
<table id="testTable"  class="table table-primary table-striped mt-5">
        <thead class="thead-dark">
          <tr>
            <th scope="col"><center>NÚMERO</center></th>
            <th scope="col"><center>VIDEO</center></th>
            <th scope="col"><center>CAPTURA</center></th>
            <th scope="col"><center>ID</center></th>
            <th scope="col"><center>NOMBRE DE ARCHIVO</center></th>
            <th scope="col"><center>PATENTE</center></th>
            <th scope="col"><center>ACTA</center></th>
            <th scope="col"><center>FECHA</center></th>
            <th scope="col"><center>HORA</center></th>
            <th scope="col"></th>
            <th scope="col"><input type="checkbox" onClick="toggle(this)" ></th>
          </tr>
        </thead>
        <tbody >

<?php


      
    $contador=0;

    $idid=0;

    if($orden=="id"){
        
      $sql="SELECT * FROM archivos  WHERE nombrearchivo LIKE '%.mp4%' AND estado='$estado' AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY id ASC ";

      }else if($orden=="acta"){

        $sql="SELECT * FROM archivos  WHERE nombrearchivo LIKE '%.mp4%' AND estado='$estado' AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY acta ASC ";

      }else {

        $sql="SELECT * FROM archivos  WHERE nombrearchivo LIKE '%.mp4%' AND estado='$estado' AND fecha BETWEEN '$desde' AND '$hasta' ORDER BY fecha ASC ";     

      }

    
    if($resultado=mysqli_query($miconexion,$sql)){

    while($registro=mysqli_fetch_assoc($resultado)){

    $latinFecha=date("d-m-Y", strtotime($registro["fecha"]));    

    $contador=$contador+1;

    $patente=$registro["patente"];

    $id=$registro["id"];

    $acta=$registro["acta"];

    $idid=$idid+1;

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
            <th scope="row"><center><?php echo  $id ?></center></th>
            <td><?php  echo  $registro["nombrearchivo"] ?></td>
            <td><?php  echo  $registro["patente"] ?></td>
            <td><?php  echo  $acta ?></td>
            <td><?php  echo  $latinFecha ?></td>
            <td><?php  echo  $registro["hora"] ?></td>
            <td><a href="editarMulta.php?id=<?php echo $id  ?>" class="btn btn-success text-light">EDITAR</a></td>
            <td><center><input type="checkbox" name="id[]" value=<?php echo $id ?>></center></td>
          </tr>
       


<?php
        }
    }
    
    mysqli_close($miconexion);


?>


    </tbody>
      </table> 
  </form>   
            </div>




<!-- cierre de Contenido  -->


    </div>


    <br><br><br><br>
</body>
</html>