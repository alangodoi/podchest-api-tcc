<?php
include_once 'CategoriasDAO.php';
include_once 'Categorias.php';

$atualizar = new CategoriasDAO();
$categorias = new Categorias();

if ((isset($_POST['id'])) && (isset($_POST['nome']))) {

$categorias->setId($_POST['id']);	
$categorias->setNome($_POST['nome']);

$atualizar->atualizar($categorias);

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>