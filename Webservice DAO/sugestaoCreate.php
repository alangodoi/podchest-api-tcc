<?php

include_once 'sugestaoDAO.php';
include_once 'Sugestao.php';

$inserir = new sugestaoDAO();
$sugestao = new Sugestao();

if (isset($_POST['nome']) && isset($_POST['link']) && isset($_POST['formattedDate']) && isset($_POST['email']) && isset($_POST['estado']) ) {

$sugestao->setNome($_POST['nome']);	
$sugestao->setLink($_POST['link']);
$sugestao->setDataSugestao($_POST['formattedDate']);
$sugestao->setEmail($_POST['email']);
$sugestao->setEstado($_POST['estado']);

$inserir->inserir($sugestao);
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}
?>