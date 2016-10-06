<?php

include_once 'UsuarioDAO.php';
include_once 'Usuario.php';

$inserir = new UsuarioDAO();
$usuario = new Usuario();

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['isAdm']) && isset($_POST['isAct'])) {

$usuario->setFirstname($_POST['firstname']);
$usuario->setLastname($_POST['lastname']);
$usuario->setEmail($_POST['email']);
$usuario->setPassword($_POST['password']);
$usuario->setIsAdmin($_POST['isAdm']);
$usuario->setIsActive($_POST['isAct']);

if (isset($_POST['action'])) {
	$usuario->setAction($_POST['action']);
}

$inserir->inserir($usuario);

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>