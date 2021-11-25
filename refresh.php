<?php

include('conexion.php');

include 'api-google/vendor/autoload.php';

putenv('GOOGLE_APPLICATION_CREDENTIALS=multasprocess-00313ff334d2.json');

$client= new Google_Client();

$client->useApplicationDefaultCredentials();

$client->SetScopes(['https://www.googleapis.com/auth/drive.file']);

$service= new Google_Service_Drive($client);

$folderId="1eZBzykxH5V8y6ZwbnYHV_xZKARQyFXXC";

$optParams = array(
    'pageSize' => 1000,
    'fields' => "nextPageToken, files(contentHints/thumbnail,fileExtension,iconLink,id,name,size,thumbnailLink,webContentLink,webViewLink,mimeType,parents)",
    'q' => "'".$folderId."' in parents"
    );


$resultado=$service->files->listFiles($optParams);



foreach($resultado as $elemento)
{

    echo ''.$elemento->name.'</br>';

    $nombreArchivo=$elemento->name;
    
    $idArchivo=$elemento->id;

    //date_default_timezone_set("America/Argentina/Buenos_Aires");

    $fecha=substr($nombreArchivo, 7, -10);

    $patente=substr($nombreArchivo, 0, -19);

    $hora=substr($nombreArchivo, 15, -4);

    $sql2="INSERT INTO ARCHIVOS (NOMBREARCHIVO,IDARCHIVO,FECHA,PATENTE,HORA) VALUES ('$nombreArchivo','$idArchivo','$fecha','$patente','$hora') ";

    $registro2=mysqli_query($miconexion,$sql2);



}

header("Location:multasMas.php");

mysqli_close($miconexion);



?>