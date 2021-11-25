
<?php 



include("conexion.php"); 

session_start();

if(!$_SESSION['usuario']){

  header("location:login.php");

}


?>



<h4 class="text-primary text-weight-bold font-italic"><br>USUARIO:  <?php 


$usuario=$_SESSION["usuario"]; 

$sql="SELECT * FROM USUARIOS WHERE usuario = '$usuario'";

if($resultado=mysqli_query($miconexion,$sql)){

  while($registro=mysqli_fetch_assoc($resultado)){


    $nombreUsuario=$registro["usuario"];

    $privilegio=$registro["privilegio"];

    echo $nombreUsuario;

  
  }

  

}
?>
</h4>