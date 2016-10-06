<?php

include_once 'UsuarioDAO.php';
include_once 'Usuario.php';

$atualizar = new UsuarioDAO();
$usuario = new Usuario();

if (isset($_POST['firstname']) && isset($_POST['lastname'])) {

// && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['isAdm']) && isset($_POST['isAct']))
 //&& isset($_POST['action'])

$usuario->setId($_POST['id']);
$usuario->setFirstname($_POST['firstname']);
$usuario->setLastname($_POST['lastname']);
/*$usuario->setEmail($_POST['email']);
$usuario->setPassword($_POST['password']);
$usuario->setIsAdmin($_POST['isAdm']);
$usuario->setIsActive($_POST['isAct']);*/
//$usuario->setAction($_POST['action']);

$atualizar->atualizar($usuario);

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>