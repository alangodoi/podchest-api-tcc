<?php
include_once 'UsuarioDAO.php';
include_once 'Usuario.php';

$atualizar = new UsuarioDAO();
$usuario = new Usuario();

if ((isset($_POST['id'])) && (isset($_POST['nome'])) && (isset($_POST['sobrenome'])) && (isset($_POST['email']))
		 && (isset($_POST['descricao'])) && (isset($_POST['isAdm'])) && (isset($_POST['isAct']))) {

$usuario->setId($_POST['id']);	
$usuario->setNome($_POST['nome']);
$usuario->setId($_POST['sobrenome']);
$usuario->setId($_POST['email']);
$usuario->setId($_POST['descricao']);
$usuario->setId($_POST['isAdm']);
$usuario->setId($_POST['isAct']);

$atualizar->atualizar($usuario);

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>