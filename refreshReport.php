<?php
ob_Start();

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

$acta=41400621020455;

foreach($resultado as $elemento)
{

    echo ''.$elemento->name.'</br>';

    $nombreArchivo=$elemento->name;
    
    $idArchivo=$elemento->id;

    $estado="sin procesar";

    //date_default_timezone_set("America/Argentina/Buenos_Aires");

    $fecha=substr($nombreArchivo, 7, -10);

    $patente=substr($nombreArchivo, 0, -19);

    $hora=substr($nombreArchivo, 15, -4);

    $filter=substr($nombreArchivo, -3);

    if($filter=="mp4"){

        $acta=$acta+1;

    }

    $longitudString = strlen($nombreArchivo);

    if($longitudString==26){

        $fecha=substr($nombreArchivo, 8, -10);

        $hora=substr($nombreArchivo, 16, -4);


    }else if($longitudString==25){

        $fecha=substr($nombreArchivo, 7, -10);

        $hora=substr($nombreArchivo, 15, -4);


    }

    $actimel="0".$acta;

    $sql2="INSERT INTO ARCHIVOS (NOMBREARCHIVO,IDARCHIVO,FECHA,PATENTE,HORA,ACTA,ESTADO) VALUES 
    
    ('$nombreArchivo','$idArchivo','$fecha','$patente','$hora','$actimel','$estado') ";

    $registro2=mysqli_query($miconexion,$sql2);



}

header("Location:reportesMultas.php");

mysqli_close($miconexion);



?>