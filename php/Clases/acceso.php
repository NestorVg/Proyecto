<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
echo 'Panel usuario';
if(isset($_SESSION['correo'])){
    echo 'Has iniciado sesion',$_SESSION['correo'];
}else{
    session_start();
    session_destroy();
}
?>
