<?php

include_once 'UsuarioDAO.php';
include_once 'Usuario.php';

$excluir = new UsuarioDAO();
$usuario = new Usuario();

if (isset($_GET['id'])) {

$usuario->setId($_GET['id']);

$excluir->excluir($usuario);
	
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>