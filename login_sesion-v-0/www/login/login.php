<?php
	/* Desarrollado por: PROGRAMANDO BROTHERS 	
	Suscribete a : https://www.youtube.com/ProgramandoBrothers y comparte los vídeos.
	Recuerda: "EL CONOCIMIENTO SE COMPARTE, POR MÁS POCO QUE SEA".
	*/
	include_once('conexion.php');
	mysqli_select_db($conn, "productosbd");
	$usuario = $_POST['usuario'];
	$contra = $_POST['contra'];
	

	$sql = "SELECT COUNT(*) FROM usuario where(nombre='$usuario' and contra='$contra' )";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);

	if($row[0] > 0 ){
		session_start();
		$_SESSION['nombre'] = $usuario;
		header( 'Location: ../compra/index.php?pagina=1' );
	}
	else{
		header( 'Location: index.php' );		
	}
?>