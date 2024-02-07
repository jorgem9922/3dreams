<?php 
	/* Desarrollado por: PROGRAMANDO BROTHERS 	
	Suscribete a : https://www.youtube.com/ProgramandoBrothers y comparte los vídeos.
	Recuerda: "EL CONOCIMIENTO SE COMPARTE, POR MÁS POCO QUE SEA".
	*/
	include_once('conexion.php');
	
	$nombre = $_POST['nombre'];
	$ape = $_POST['apellido'];
	$correo = $_POST['correo'];
	$contra = $_POST['contra'];
	

	$sql = "INSERT INTO usuarios (nombre, apellido, correo, pass) VALUES ('$nombre', '$ape', '$correo', '$contra');";
	$res = mysqli_query($conn,$sql);
	if ( isset( $res ) )
    header( 'Location: index.php' );
	else
		echo "error";	

?>