<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'AutoresDAO.php';
include_once 'Autores.php';

$atualizar = new AutoresDAO();
$autores = new Autores();

if ((isset($_POST['id'])) && (isset($_POST['nome']))) {

$autores->setId($_POST['id']);	
$autores->setNome($_POST['nome']);

echo json_encode($_POST['id']);

$atualizar->atualizar($autores);

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>