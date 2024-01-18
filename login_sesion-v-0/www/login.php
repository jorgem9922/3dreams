<?php
	/* Desarrollado por: PROGRAMANDO BROTHERS 	
	Suscribete a : https://www.youtube.com/ProgramandoBrothers y comparte los vídeos.
	Recuerda: "EL CONOCIMIENTO SE COMPARTE, POR MÁS POCO QUE SEA".
	*/
	include_once('conexion.php');

	$usuario = $_POST['usuario'];
	$contra = $_POST['contra'];

	$sql = "SELECT COUNT(*) FROM usuario where(usuario='$usuario' and contra='$contra' and estado=1)";
	$res = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);

	if($row[0] > 0 ){
		session_start();
		
			$_SESSION['usuario'] = $usuario;
			$_SESSION['nom_compreto'] = $row1[0];
		if($usuario == "admin"){
			
			header( 'Location: principal.php' );
		}
		else{
			$_SESSION['usuario'] = $usuario;
		header( 'Location: index2.php' );
		}
	}
	else{
		header( 'Location: index.php' );		
	}
?>
