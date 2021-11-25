<?php

    include("conexion.php");

    $password=htmlentities(addslashes( $_POST["password"])); 

    $usuario=htmlentities(addslashes($_POST["usuario"])) ;

    $dni=htmlentities(addslashes( $_POST["dni"])); 

    $nombre=htmlentities(addslashes($_POST["nombre"])) ;

    $apellido=htmlentities(addslashes( $_POST["apellido"])); 

    $privilegio=htmlentities(addslashes($_POST["privilegio"])) ;

    $sql="INSERT INTO USUARIOS (DNI , NOMBRE , APELLIDO , USUARIO, PRIVILEGIO, CONTRASEÑA) VALUES ('$dni','$nombre','$apellido','$usuario','$privilegio','$password')";

    $insertar=mysqli_query($miconexion,$sql);


    if(mysqli_affected_rows($miconexion)){

        echo "<div class='container mt-3'>";
        echo "<br><center><h2 class='text-primary text-capitalize font-weight-bold font-italic'>se ha creado el usuario correctamente</h2></center>";
        echo "</div>";
    
    
    }else{
        
        echo "error al insertar";
    
    }   

    mysqli_close($miconexion);



?>