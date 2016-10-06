<?php

include_once 'UsuarioDAO.php';
include_once 'Usuario.php';

$lerUsuarioId = new UsuarioDAO();
$usuario = new Usuario();

if (isset($_POST['id'])) {

$usuario->setId($_POST['id']);
$lerUsuarioId->lerUsuarioId($usuario);

} elseif (isset($_GET['id'])) {

$usuario->setId($_GET['id']);

echo json_encode($_GET['id']);

$lerUsuarioId->lerUsuarioId($usuario);
	
}

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>