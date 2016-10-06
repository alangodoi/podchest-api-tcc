<?php

include_once 'UsuarioDAO.php';
include_once 'Usuario.php';

$lerUsuarioRevoke = new UsuarioDAO();
$usuario = new Usuario();

if (isset($_POST['email']) && isset($_POST['isAct'])) {

$usuario->setEmail($_POST['email']);
$usuario->setIsActive($_POST['isAct']);

$lerUsuarioRevoke->revokeAccess($usuario);
	
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>