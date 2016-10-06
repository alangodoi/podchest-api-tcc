<?php

include_once 'PodcastDAO.php';
include_once 'Podcast.php';

$inserir = new PodcastDAO();
$podcast = new Podcast();

if (isset($_POST['nome']) && isset($_POST['descricao'])&& isset($_POST['nome_autor']) && isset($_POST['nome_cat']) && isset($_POST['link']) && isset($_POST['imagem'])) {

$podcast->setNome($_POST['nome']);
$podcast->setDescricao($_POST['descricao']);
$podcast->setAutorId($_POST['nome_autor']);
$podcast->setCategoriaId($_POST['nome_cat']);
$podcast->setLink($_POST['link']);
$podcast->setImagem($_POST['imagem']);

$inserir->inserir($podcast);

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
	echo json_encode($response);
}

?>