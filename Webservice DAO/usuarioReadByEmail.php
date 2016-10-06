<?php

include_once 'UsuarioDAO.php';
include_once 'Usuario.php';

$lerUsuarioEmail = new UsuarioDAO();
$usuario = new Usuario();

if (isset($_POST['email'])) {

$usuario->setEmail($_POST['email']);

$lerUsuarioEmail->lerUsuarioEmail($usuario);
	
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>