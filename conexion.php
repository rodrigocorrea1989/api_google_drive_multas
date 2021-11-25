<?php

$miconexion=mysqli_connect("localhost","dimitri","dimitri2022","c2310176_multas");

mysqli_set_charset($miconexion,"utf8");


	//comprobar conexión
	
	if(!$miconexion){
		
		echo "<kbd>no hay conexión ".mysqli_error()."</kbd>";
		
		exit();
		
            
        }


?>