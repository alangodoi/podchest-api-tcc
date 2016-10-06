<?php

include_once 'AutoresDAO.php';
include_once 'Autores.php';

$inserir = new AutoresDAO();
$autores = new Autores();

if (isset($_POST['nome'])) {

$autores->setNome($_POST['nome']);

$inserir->inserir($autores);
//$result = array();

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>