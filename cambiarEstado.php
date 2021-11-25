<?php

include("conexion.php");

session_start();

$usuario=$_SESSION["usuario"];

$id=htmlentities(addslashes($_GET["id"]));

$desde=htmlentities(addslashes($_GET["desde"]));

$hasta=htmlentities(addslashes($_GET["hasta"]));

$orden=htmlentities(addslashes($_GET["orden"]));

$estado="procesado";

$updateSql="UPDATE archivos SET estado='$estado' WHERE id='$id'";
    
$update=mysqli_query($miconexion,$updateSql);

header("Location:reportesMultas.php?desde=".$desde."&hasta=".$hasta."&orden=".$orden);

mysqli_close($miconexion);

?>