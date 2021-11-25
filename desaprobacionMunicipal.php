<?php

$fileId=htmlentities(addslashes($_GET["url"]));

$imagenId=htmlentities(addslashes($_GET["urlImg"]));

$id=htmlentities(addslashes($_GET["id"]));

include('conexion.php');

include 'api-google/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=multasprocess-00313ff334d2.json');

$client= new Google_Client();

$client->useApplicationDefaultCredentials();

$client->SetScopes(['https://www.googleapis.com/auth/drive']);

$client->SetScopes(['https://www.googleapis.com/auth/drive.file']);




    $service= new Google_Service_Drive($client);

    
    /* eliminar video  */

    $file_path=$fileId;

    $file = new Google_Service_Drive_Drivefile();

    $file->setName($file_path);

    $file->setParents(array("1eZBzykxH5V8y6ZwbnYHV_xZKARQyFXXC"));

    $file->setDescription("multa carga por multaprocess");

    $file->setMimeType("video/mp4");

    $resultado="";

    $resultado=$service->files->delete($fileId);

    /* eliminar video  */

    /* eliminar imagen  */

    $file_path2=$imagenId;

    $file2 = new Google_Service_Drive_Drivefile();

    $file2->setName($file_path2);

    $file2->setParents(array("1eZBzykxH5V8y6ZwbnYHV_xZKARQyFXXC"));

    $file2->setDescription("multa carga por multaprocess");

    $file2->setMimeType("image/jpg");

    $resultado2="";

    $resultado2=$service->files->delete($imagenId);   

    /*  ELIMINAR DE LA BASE DE DATOS */

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
    
      /*  ELIMINAR DE LA BASE DE DATOS */

      header("Location:multasMas.php");
    

    mysqli_close($miconexion);






?>