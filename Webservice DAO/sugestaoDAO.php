<?php

// Conexão do DB
require_once($_SERVER['DOCUMENT_ROOT'] . '/podchestmanager/include/db_connect.php');

// Conectando ao DB
$db = new DB_CONNECT();

// Array para resposta
$response = array();

class sugestaoDAO  {

	public function inserir(Sugestao $sugestao) {
		$nome = $sugestao->getNome();
		//$id_usuario = $sugestao->getUsuarioId();
		$link = $sugestao->getLink();
		$dt_sugestao = $sugestao->getDataSugestao();
		$estado_aprovacao = $sugestao->getEstado();
		$email = $sugestao->getEmail();
		
		try {
			$result = mysql_query("INSERT INTO sugestoes (nome, id_usuario, link, dt_sugestao, estado_aprovacao)
									SELECT '$nome', usuarios.id, '$link', '$dt_sugestao', $estado_aprovacao
									FROM usuarios
									WHERE email = '$email'");
									
		} catch (Exception $e) {
			
		}
		if ($result) {
			 //successfully inserted into database
			$response["success"] = 1;
			$response["message"] = "Sugestão registrada com sucesso.";
			} else {
				 //failed to insert row
				$response["success"] = 0;
				$response["message"] = "Oops! An error occurred.";
			}	
		echo json_encode($response);
	}
	
	public function lerTodos(){
		
		try {
			$result = mysql_query("SELECT * FROM sugestoes");
		} catch (Exception $e) {
			
		}
		
		if (mysql_num_rows($result) > 0) {
			$response["sugestoes"] = array();
			
			while ($row = mysql_fetch_array($result)) {

				$podcast = array();
				$podcast["id"] = $row["id"];
				$podcast["nome"] = utf8_encode($row["nome"]);
				$podcast["link"] = $row["link"];
		
				array_push($response["sugestoes"], $podcast);
			}
			echo json_encode($response);
		}
		
	}
	
	public function lerTodosAprovar(){
		
		try {
			$result = mysql_query("SELECT * FROM sugestoes WHERE estado_aprovacao = 0");
		} catch (Exception $e) {
			
		}
		
		if (mysql_num_rows($result) > 0) {
			$response["sugestoes"] = array();
			
			while ($row = mysql_fetch_array($result)) {

				$podcast = array();
				$podcast["id"] = $row["id"];
				$podcast["nome"] = utf8_encode($row["nome"]);
				$podcast["link"] = $row["link"];
		
				array_push($response["sugestoes"], $podcast);
			}
			echo json_encode($response);
		}
	}
	
	public function lerAprovados(){
		
		try {
			$result = mysql_query("SELECT * FROM sugestoes WHERE estado_aprovacao = 1");
		} catch (Exception $e) {
			
		}
		
		if (mysql_num_rows($result) > 0) {
			$response["sugestoes"] = array();
			
			while ($row = mysql_fetch_array($result)) {

				$podcast = array();
				$podcast["id"] = $row["id"];
				$podcast["nome"] = utf8_encode($row["nome"]);
				$podcast["link"] = $row["link"];
		
				array_push($response["sugestoes"], $podcast);
			}
			echo json_encode($response);
		}
	}	

}

?>