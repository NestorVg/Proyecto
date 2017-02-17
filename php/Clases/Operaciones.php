<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Operaciones
 *
 * @author Nestor
 */
class Operaciones {
    private $servidor = "mysql.hostinger.es";
    private $usuario = "u825670329_nest";
    private $pass = "barternow";
    private $nombreBd ="u825670329_bart";
    
    public function conectar()
    {
        $con = mysqli_connect($this->servidor, $this->usuario, $this->pass, $this->nombreBd);
        return $con;
    }
    
    public function altaUsuario($usuario)
    {
	if(!empty($usuario->getNombre()) && !empty($usuario->getApellido()) 
		&& !empty($usuario->getPass()) && !empty($usuario->getCorreo()))
	{
            $sql_Select = "SELECT correo FROM usuario WHERE correo='".$usuario->getCorreo()."'";
			
            $con = $this->conectar();
            $resultado = mysqli_query($con,$sql_Select); 
            
            $existe = $this->recorrer($resultado);
            
            if($existe['correo'] != $usuario->getCorreo())
            {
                $sql_insert=("INSERT INTO usuario
                (nombre, apellidos, contrasenya, correo)
                VALUES('{$usuario->getNombre()}','{$usuario->getApellido()}', '{$usuario->getPass()}','{$usuario->getCorreo()}')");
                $result=mysqli_query($con,$sql_insert);

                if($result){
                        echo  "Cuenta Creada Correctamente...";
                           header( 'Location: http://bartnow.esy.es/Proyecto/index.html');
						
                } else {
                        echo  "Error al registrarse!";
                }
	   }else {
                    echo  "El email ya existe! Por favor, intenta con otro!";
		}
	}else{
		echo  "Todos los campos no deben de estar vacios!";
	}
    }
    
    public function loginUsuario($usuario){
        $array_user = array();
        
        $sql = "SELECT ID_USUARIO,nombre,apellidos,correo FROM usuario "
                . "WHERE correo='{$usuario->getCorreo()}' AND contrasenya='{$usuario->getPass()}'";
                
	
        $con = $this->conectar();
        if($res == mysqli_query($con, $sql))
        {
            $ok = False;
            echo 'se encontro el usuario';
            while($row = mysqli_fetch_assoc($res))
            {
                $_SESSION['ID_USUARIO'] = $row["ID_USUARIO"];
                $_SESSION['nombre'] = $row["nombre"];
                $_SESSION['apellidos'] = $row["apellidos"];			    	
                $_SESSION['correo'] = $row["correo"];
                $ok = true;
            }
            
            if($ok)
            {
                
                header('location: Clases/acceso.php');
            }
        }else{
             echo "Email o contraseña incorrectos";
        }
    }
	
	function verificar_login($usuario) {
        $sql = "SELECT * FROM usuario "
                . "WHERE correo='{$usuario->getCorreo()}' AND contrasenya='{$usuario->getPass()}'";
		
		$con = $this->conectar();		
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$active = $row['active'];
		$count = mysqli_num_rows($result);
		if($count == 1) {
			/*
         session_register("myusername");
         $_SESSION['nombre'] = $myusername;
			*/
         
         header("location: Clases/acceso.php");
      }else {
         echo "Email o contraseña incorrectos";
      }
  }
  
  
    
    public function recuperarPassword(){
    }
    
    public function recorrer($valor)
    {
        return mysqli_fetch_array($valor);
    }
}

?>