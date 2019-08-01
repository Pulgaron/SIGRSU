<?php 
$nombre = htmlentities(addslashes($_POST["usuario"]));
$contra = htmlentities(addslashes($_POST["contra"]));
require_once("../../Modelo/usuarios.php");
$usuario = new Usuarios_Models();
$valor = $usuario->busca_usuario_registrado($nombre,$contra);
if ($valor > 0) {
    session_start();//Si el usuario existe en la bd crea una sesión
    $_SESSION["iduser"] = $valor;
    header("location:../../Vista/vistaAdmin.php");    
}
else
    header("location:../../Vista/login.html");    
?>