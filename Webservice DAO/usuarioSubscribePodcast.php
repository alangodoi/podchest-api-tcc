<?php

include_once 'UsuarioDAO.php';
include_once 'PodcastDAO.php';
include_once 'Usuario.php';
include_once 'Podcast.php';

$subscribe = new UsuarioDAO();
$
$podcast = new Podcast();

if (isset($_POST['email']) && isset($_POST['nome'])) {
	
$usuario->setEmail($_POST['email']);
$podcast->setNome($_POST['nome']);
	
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>