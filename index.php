<!DOCTYPE html>
<html>
    <head>

        <title>Proyecto</title>

        <link rel="stylesheet" type="text/css" href="css/MiCss.css">
        <link rel="stylesheet" type="text/css" href="css/slide.css">

        <!-- BOOTSTRAP CSS -->
        <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap-theme.min.css">

        <!-- JQUERY -->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
		
        <!-- BOOTSTRAP JAVASCRIPT -->
        <script src="Bootstrap/js/bootstrap.min.js" lenguage="javascript" type="text/javascript"></script>
        <script src="Bootstrap/js/npm.js" lenguage="javascript" type="text/javascript"></script> 
		
		<!--BOOTSTRAP MENU DESPLEGABLE-->
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>

		<!--BOOTSTRAP MODAL-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Example of Bootstrap 3 Modal Events</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script type="text/javascript">
		$(document).ready(function(){
		$('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').focus()
		})
		});
		</script>
		<style type="text/css">
		.bs-example{
			margin: 20px;
		}
		</style>

    </head>
    <body>
	
	<?php

	include_once "conexion.php";

	function verificar_login($nombre,$contrasenya,&$result) {

		$sql = "SELECT * FROM usuario WHERE nombre = '$nombre' and contrasenya = '$contrasenya'";
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
		$nombre = $_POST['nombre'];
		$contrasenya = $_POST['contrasenya'];
		$contrasenya = md5($contrasenya);
		
		if(verificar_login($nombre,$contrasenya,$result) == 1){
			$_SESSION["login_done"] = true;
			$_SESSION['session_username']=$nombre;
			header("location:./web/index.html");

		}else{
			echo '<span class="help-block">Please enter a valid email address</span>';	
		}
	}
	
	?>
	
	<!--Register-->
<div id="register" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                    <h4 class="modal-title">Login</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="" method="post">
						Email:
                        <input type="text" name="nombre" placeholder="email" class="form-control" id="recipient-name"/><br/>
						Password:
                        <input type="password" name="contrasenya" placeholder="Password" class="form-control" id="recipient-name"/><br/><br/>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>&nbsp;&nbsp;
						<button name="login" type="submit" value="login" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
</div>

			
        <!-- Barra de navegacio -->
        <nav class="navbar navbar-default navbar-fixed-top">
		
            <div class="container-fluid">
			
                <!-- Logo -->
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <div id="logo"></div>
                    </a>
                </div>
				
				
				

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <!-- Buscador y boton -->
                   <!-- <form class="navbar-form navbar-left" style="margin-left:30%">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                    </form>-->
                    <!-- Registro y Login -->
                    <ul class="nav navbar-nav navbar-right">
                       <!-- Buscar -->
                        <!-- Separador -->
                        <li class="divider-vertical"></li>
                        <!-- Registro -->
                        <li>
							<a href="#" data-toggle="modal" data-target="#register" data-title="login" role="button">Registro</a>
                        </li>
                        <!-- Login -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
                            <ul class="dropdown-menu" style="padding:8px;">
                                <form class="login-form" action="" method="post">
								  <input type="text" class="form-control" name="nombre" placeholder="nombre"/><br/>
								  <input type="password" class="form-control" name="contrasenya" placeholder="contrasenya"/>
								  <button name="login" class="btn btn-default" type="submit" value="login" style="margin-top:10px;">login</button>
								</form>
                            </ul>
                        </li>
                </ul>
        </div>
	
</div>

</nav>

<!-- Slidder -->
<div id="slider">
    <figure>
        <img class="imgslider" src="imgs/im1.jpg" alt>
        <img class="imgslider" src="imgs/im2.jpg" alt>
        <img class="imgslider" src="imgs/im1.jpg" alt>
        <img class="imgslider" src="imgs/im3.jpg" alt>
    </figure>
</div>

<!-- Galeria divs -->
<div id="galeria">
    <div class="row">

        <!-- columna 1 -->
        <div id="columnas-div" class="col-sm-3 col-md-3">
            <!-- div -->
            <div>
                <div class="thumbnail">
                    <img src="imgs/silla.jpg"/>
                    <div class="caption">
                        <h3>Producte</h3>
                        <h4>precio</h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>

            <!-- div -->
            <div>
                <div class="thumbnail">
                    <img src="imgs/silla.jpg"/>
                    <div class="caption">
                        <h3>Producte</h3>
                        <h4>precio</h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- columna 2 -->
        <div id="columnas-div" class="col-sm-3 col-md-3">
            <!-- div -->
            <div>
                <div class="thumbnail">
                    <img src="imgs/7202-2841503.jpg"/>
                    <div class="caption">
                        <h3>Producte</h3>
                        <h4>precio</h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
            </div>

            <!-- div -->
            <div>
                <div class="thumbnail">
                    <img src="imgs/shirt.jpg"/>
                    <div class="caption">
                        <h3>Producte</h3>
                        <h4>precio</h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolaborum. </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- columna 3 -->
        <div id="columnas-div" class="col-sm-3 col-md-3">
            <!-- div -->
            <div>
                <div class="thumbnail">
                    <img src="imgs/pelota.JPG"/>
                    <div class="caption">
                        <h3>Producte</h3>
                        <h4>precio</h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- columna 4 -->
        <div id="columnas-div" class="col-sm-3 col-md-3">
            <!-- div -->
            <div>
                <div class="thumbnail">
                    <img src="imgs/shirt.jpg"/>
                    <div class="caption">
                        <h3>Producte</h3>
                        <h4>precio</h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
            </div>
            <!-- div -->
            <div>
                <div class="thumbnail">
                    <img src="imgs/shirt.jpg"/>
                    <div class="caption">
                        <h3>Producte</h3>
                        <h4>precio</h4>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>
            </div>

        </div>

    </div>            
</div>


	
</body>
</html>

<?php
} else {
	echo 'Su usuario ingreso correctamente.';
	echo '<a href="logout.php">Logout</a>';
}
?>