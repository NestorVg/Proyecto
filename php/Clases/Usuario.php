<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author cep
 */
class Usuario {
	private $idUsuario;
	private $nombre;
	private $apellido;
	private $contrasenya;
	private $correo;
	private $ciudad;
	private $telefono;
	private $codPostal;
	
	public function __construct($nom,$ape,$pass,$email) {
		$this->nombre = $nom;
		$this->apellido = $ape;
		$this->correo = $email;
                $this->contrasenya = $pass;
		
	}
        
        public function getNombre(){
            return $this->nombre;
        }
        
        public function getApellido(){
            return $this->apellido;
        }
        
        public function getCorreo(){
            return $this->correo;
        }
        
        public function getPass(){
            return $this->contrasenya;
        }
        
       
}
?>
