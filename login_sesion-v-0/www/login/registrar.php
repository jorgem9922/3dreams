<?php 
	/* Desarrollado por: PROGRAMANDO BROTHERS 	
	Suscribete a : https://www.youtube.com/ProgramandoBrothers y comparte los vídeos.
	Recuerda: "EL CONOCIMIENTO SE COMPARTE, POR MÁS POCO QUE SEA".
	*/
	include_once('conexion.php');
	mysqli_select_db($conn, "productosbd");

	$nombre = $_POST['nombre'];
	$ape = $_POST['apellido'];
	$correo = $_POST['correo'];
	$contra = $_POST['contra'];
	$dni = $_POST['dni'];
	$ciudad = $_POST['ciudad'];
	

	$sql = "INSERT INTO usuario (nombre, apellido, correo_electronico, contra,dni,id_ciudad) VALUES ('$nombre', '$ape', '$correo', '$contra','$dni','$ciudad');";
	$res = mysqli_query($conn,$sql);
	
	if ( isset( $res ) )
    header( 'Location: index.php' );
	else
		echo "error";	

?>