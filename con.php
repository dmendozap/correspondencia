<?php
//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli=new mysqli("localhost","root","97b8467b2b","correspondencia"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>