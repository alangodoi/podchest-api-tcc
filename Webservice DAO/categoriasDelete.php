<?php

include_once 'CategoriasDAO.php';
include_once 'Categorias.php';

$deleteCategorias = new CategoriasDAO();
$categorias = new Categorias();

//if (isset($_GET['id'])) {
	
if($_GET['id']){

$categorias->setId($_GET['id']);

$deleteCategorias->deleteCategorias($categorias);

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>