<?php

include_once 'CategoriasDAO.php';
include_once 'Categorias.php';

$inserir = new CategoriasDAO();
$categorias = new Categorias();

if (isset($_POST['nome'])) {

$categorias->setNome($_POST['nome']);

$inserir->inserir($categorias);
//$result = array();

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>