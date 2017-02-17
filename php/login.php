<?php

	include_once "conexion.php";

	function verificar_login($correo,$contrasenya,&$result) {

		$sql = "SELECT * FROM usuario WHERE correo = '$correo' and contrasenya = '$contrasenya'";
		$rec = mysql_query($sql);
		$count = 0;


		while($row = mysql_fetch_object($rec)){
			$count++;
			$result = $row;
		}

		if($count == 1){
			return 1;
		}

		else{
			return 0;
		}
	
	}

	if(!isset($_SESSION['userid'])){
		if(isset($_POST['login'])){
			$correo = $_POST['correo'];
			$contrasenya = $_POST['contrasenya'];
			$contrasenya = md5($contrasenya);
			
			if(verificar_login($correo,$contrasenya,$result) == 1){
				$_SESSION["username"] = $result->nombre;
				$_SESSION["login_done"] = true;
				header("location:./web/index.html");

			}else{
				echo '<span class="help-block">Please enter a valid email address</span>';	
			}
		}
	} else {
	echo 'Su usuario ingreso correctamente.';
	echo '<a href="logout.php">Logout</a>';
	}
	?>