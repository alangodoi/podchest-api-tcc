<?php

// Conexão DB
require_once($_SERVER['DOCUMENT_ROOT'] . '/podchestmanager/include/db_connect.php');

// Conectando ao DB
$db = new DB_CONNECT();

// Array para resposta
$response = array();

class PodcastDAO{
	
	/**
	* Podcast create
	**/
	public function inserir (Podcast $podcast){
		
		$nome = $podcast->getNome();
		$descricao = $podcast->getDescricao();
		$autor_id = $podcast->getAutorId();
		$categoria_id = $podcast->getCategoriaId();
		$link = $podcast->getLink();
		$imagem = $podcast->getImagem();
		
		//(nome, descricao, link, imagem, autores_id, categorias_id)
		try {
			$result = mysql_query("INSERT INTO podcasts VALUES(null, '$nome', '$descricao', '$link', '$imagem', '$autor_id', '$categoria_id')");
			
			//$result = mysql_query("INSERT INTO podcasts VALUES(null,'$nome', '$descricao', '$link', '$imagem', '$autor_id', 10)");
			
			if ($result) {
					// successfully inserted into database
					$response["success"] = 1;
					$response["message"] = "User successfully created.";
 
					} else {
						// failed to insert row
						$response["success"] = 0;
						$response["message"] = "Oops! An error occurred.";
					} 
		} catch (Exception $e) {
			
		}
		echo json_encode($response);
		//$miarray = array();
		//$miarray = $response;
	}
	
	/**
	* Podcast read by id
	**/
	public function lerPodcastId(Podcast $podcast){
		$id = $podcast->getId();
		try {
			$result = mysql_query("SELECT podcasts.id, podcasts.nome, podcasts.descricao, podcasts.link, podcasts.imagem, nome_autores, categorias.nome_cat from podcasts 
									JOIN categorias ON categorias.id = podcasts.categorias_id
									JOIN autores ON autores.id = podcasts.autores_id WHERE podcasts.id = '$id'") or die (mysql_error());
		} catch (Exception $e) {
			
		}
		if (mysql_num_rows($result) > 0) {
		
		$response["podcast"] = array();
		
		while ($row = mysql_fetch_array($result)) {
			
			$podcast = array();
			$podcast["id"] = $row["id"];
			$podcast["nome"] = utf8_encode($row["nome"]);
			$podcast["descricao"] = utf8_encode($row["descricao"]);
			$podcast["link"] = $row["link"];
			$podcast["imagem"] = $row["imagem"];
			$podcast["nome_cat"] = utf8_encode($row["nome_cat"]);
			$podcast["nome_autor"] = utf8_encode($row["nome_autores"]);
		
        array_push($response["podcast"], $podcast);
    }
    echo json_encode($response);
	}
		
	}
	
	/**
	* Podcast read
	**/
	public function lerTodos (){
		
		try {
			
			$result = mysql_query("SELECT podcasts.id, podcasts.nome, podcasts.descricao, podcasts.link, podcasts.imagem, nome_autores, categorias.nome_cat from podcasts 
									JOIN categorias ON categorias.id = podcasts.categorias_id
									JOIN autores ON autores.id = podcasts.autores_id ORDER BY podcasts.nome
								") or die(mysql_error());
			
		} catch (Exception $e){
			
		}
		
	if (mysql_num_rows($result) > 0) {
		
		$response["podcast"] = array();
		
		while ($row = mysql_fetch_array($result)) {
			
			$podcast = array();
			$podcast["id"] = $row["id"];
			$podcast["nome"] = utf8_encode($row["nome"]);
			$podcast["descricao"] = utf8_encode($row["descricao"]);
			$podcast["link"] = $row["link"];
			$podcast["imagem"] = $row["imagem"];
			$podcast["nome_cat"] = utf8_encode($row["nome_cat"]);
			$podcast["nome_autor"] = utf8_encode($row["nome_autores"]);
		
        array_push($response["podcast"], $podcast);
    }
    echo json_encode($response);
	}
}
	/**
	* Podcast update
	**/
	public function atualizar (Podcast $podcast){
		
	}
	
	/**
	* Podcast delete
	**/
	public function excluir (Podcast $podcast){
		$id = $podcast->getId();
		try {
			$result = mysql_query("DELETE FROM podcasts WHERE id = '$id'") or die(mysql_error());
			//$resultado = mysql_query("SELECT * FROM usuarios WHERE id = '$id'");
			if (mysql_affected_rows() == 1) {
					//successfully inserted into database
					$response["success"] = 1;
					$response["message"] = "User successfully deleted.";
					} else {
						// failed to delete
						$response["success"] = 0;
						//$response["message"] = "Oops! An error occurred.";
					}
		} catch (Exception $e) {
			
		}
		echo json_encode($response);
	}
}

?>