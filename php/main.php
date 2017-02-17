<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
		<?php
		require_once 'Clases/Usuario.php';
                require_once 'Clases/Operaciones.php';
                require_once 'Mobile_Detect.php';
                $detect = new Mobile_Detect;
		
                $tipoForm = isset($_GET['tipo']) ? $_GET['tipo']: 'default';
               
                switch ($tipoForm)
                {
                    case 'login':
                        
                        $correo = $_POST['correo'];
                        $contrasenya = md5($_POST['contrasenya']);
                        
                        $loginUsuario = new Usuario('', '', $contrasenya, $correo);
                        $operacion = new Operaciones();
						$operacion->verificar_login($loginUsuario);
						
                        break;
                    
                    case 'registro':
                        if($detect->isMobile()){
                            $json = json_decode(file_get_contents('php://input'), true);
                            $nombre=$json['name'];
                            $email=$json['email'];
                            $password=md5($json['password']);
                            $registroUsuario = new Usuario($nombre,"",$password,$email);
                            $operacion = new Operaciones();
                            $operacion->altaUsuario($registroUsuario);
                            
                        }else{
                                if(!empty($_POST))
                                {
                                    $nombre = $_POST['nombre'];
                                    $apellido = $_POST['apellidos'];
                                    $correo = $_POST['correo'];
                                    $contrasenya = md5($_POST['contrasenya']);

                                    $registroUsuario = new Usuario($nombre,$apellido,$contrasenya,$correo);
                                    $operacion = new Operaciones();

                                    //se da de alta un usuario
                                    $operacion->altaUsuario($registroUsuario);
                                }
                        }
                        break;
                }
		
		?>
    </body>
</html>
