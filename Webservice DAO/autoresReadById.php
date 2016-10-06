<?php

include_once 'AutoresDAO.php';
include_once 'Autores.php';

$lerAutoresId = new AutoresDAO();
$autores = new Autores();

if (isset($_POST['id'])) {

$autores->setId($_POST['id']);
$lerAutoresId->lerAutoresId($autores);
	
} elseif (isset($_GET['id'])) { 

$autores->setId($_GET['id']);
$lerAutoresId->lerAutoresId($autores);

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}
?>