<?php

include("conexion.php");

session_start();

$usuario=$_SESSION["usuario"];

$estado="sin procesar";

$updateSql="UPDATE archivos SET estado='$estado'";
    
$update=mysqli_query($miconexion,$updateSql);

header("Location:reportesMultas.php");

mysqli_close($miconexion);

?>