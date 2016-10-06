<?php

include_once 'AutoresDAO.php';
include_once 'Autores.php';

$deleteAutores = new AutoresDAO();
$autores = new Autores();

//if (isset($_GET['id'])) {
	
if($_GET['id']){

$autores->setId($_GET['id']);

$deleteAutores->deleteAutores($autores);

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>