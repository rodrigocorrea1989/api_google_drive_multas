<?php

include("conexion.php");

$id=htmlentities(addslashes($_POST["id"]));
$linkVideo=htmlentities(addslashes($_POST["link"]));
$fecha=htmlentities(addslashes($_POST["fecha"]));
$acta=htmlentities(addslashes($_POST["acta"]));
$linkimagen=htmlentities(addslashes($_POST["imagen"]));
$observacion=htmlentities(addslashes($_POST["observacion"]));

$sql="INSERT INTO MULTAS (ID,LINKVIDEO,FECHA,ACTA,OBSERVACION,LINKIMAGEN) VALUES ('$id','$linkVideo','$fecha','$acta','$observacion','$linkimagen')";

$resultado=mysqli_query($miconexion,$sql);

if(mysqli_affected_rows($miconexion)){

    echo "Se ha aprobado correctamente";

}else{

    echo "error al insertar";

}

/* eliminar imagen de la base de datos  */

$sql2="SELECT * FROM ARCHIVOS WHERE id='$id'";

if($resultado2=mysqli_query($miconexion,$sql2)){

    while($registro2=mysqli_fetch_assoc($resultado2)){

        $nombrearchivo=$registro2["nombrearchivo"];

        $idarchivo=$registro2["idarchivo"];

        $id=$registro2["id"];


    }

    $sql3="DELETE FROM ARCHIVOS WHERE NOMBREARCHIVO  = '$nombrearchivo' ";

    $registro3=mysqli_query($miconexion,$sql3);
    


    $videoSinExtension=substr($nombrearchivo, 0, -4);

    $nombreImagen=$videoSinExtension.".jpg";


    $sql3="DELETE FROM ARCHIVOS WHERE NOMBREARCHIVO  = '$nombreImagen' ";

    $registro3=mysqli_query($miconexion,$sql3);


}


echo "se ha desaprobado correctamente";


mysqli_close($miconexion);


header("Location:evaluarMulta.php");


?>