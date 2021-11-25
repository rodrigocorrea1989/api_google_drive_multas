<?php

include("conexion.php");

session_start();

$usuario=$_SESSION["usuario"];

$id=htmlentities(addslashes($_POST["id"]));

$patente=htmlentities(addslashes($_POST["patente"]));

$fecha=htmlentities(addslashes($_POST["fecha"]));

$hora=htmlentities(addslashes($_POST["hora"]));

header("Location:iindex.php");

$updateSql="UPDATE archivos SET patente='$patente', fecha='$fecha', hora='$hora'  WHERE id = '$id'";
    
$update=mysqli_query($miconexion,$updateSql);

header("Location:reportesMultas.php");

mysqli_close($miconexion);

?>