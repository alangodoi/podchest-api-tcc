<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

include_once 'UsuarioDAO.php';
include_once 'Usuario.php';

$lerUsuarioSignin = new UsuarioDAO();
$usuario = new Usuario();

if (isset($_POST['email']) && isset($_POST['password'])) {

$usuario->setEmail($_POST['email']);
$usuario->setPassword($_POST['password']);

$lerUsuarioSignin->signin($usuario);
	
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>