<?php

// Conexão DB
require_once($_SERVER['DOCUMENT_ROOT'] . '/podchestmanager/include/db_connect.php');

// Conectando ao DB
$db = new DB_CONNECT();

// Array para resposta
$response = array();

class AutoresDAO {
	
	public function inserir (Autores $autores){
	
		$nomeRecebido = $autores->getNome();
		$nome = utf8_decode($nomeRecebido);
		
		try {
			$result = mysql_query("INSERT INTO autores VALUES (null, '$nome')");
		
		if ($result) {
					// successfully inserted into database
					$response["success"] = 1;
					$response["message"] = "User successfully created.";
					//header("Location: ../autores.php");
					Header( 'Location: ../autores.php?success=1' );
 
					} else {
						// failed to insert row
						$response["success"] = 0;
						$response["message"] = "Oops! An error occurred.";
						Header( 'Location: ../autores.php?success=2' );
					}
					
		} catch (Exception $e) {
			
		}

		echo json_encode($response);
		
	}
	
	public function lerAutoresId(Autores $autores){
		$id = $autores->getId();
		
		try {
			
			$result = mysql_query("SELECT id, nome_autores FROM autores WHERE id = $id") or die(mysql_error());
			
		} catch (Exception $e){
			
		}
			if (mysql_num_rows($result) > 0) {
			
			$response["autores"] = array();
			
			while ($row = mysql_fetch_array($result)) {
				
				$autores = array();
				$autores["id"] = $row["id"];
				$autores["nome"] = utf8_encode($row["nome_autores"]);
				
				array_push($response["autores"], $autores);
			}
			echo json_encode($response);
		}
	}
	
	function lerAutores(){
		try {
			
			$result = mysql_query("SELECT id, nome_autores FROM autores") or die(mysql_error());
			
		} catch (Exception $e){
			
		}
		
	if (mysql_num_rows($result) > 0) {
		
		$response["autores"] = array();
		
		while ($row = mysql_fetch_array($result)) {
			
			$autores = array();
			$autores["id"] = $row["id"];
			$autores["nome"] = utf8_encode($row["nome_autores"]);
		
        array_push($response["autores"], $autores);
    }
    echo json_encode($response);
	}
		
	}
	
	public function atualizar(Autores $autores){
		$id = $autores->getId();
		$nome = $autores->getNome();
		
		try {
			$result = mysql_query("UPDATE autores 
									SET nome_autores = '$nome'
									WHERE id = $id");
		} catch (Exception $e){
			
		}
		
		if (mysql_affected_rows() == 1) {
			$response["success"] = 1;
			$response["message"] = "User successfully created.";
			Header( 'Location: ../autores.php?success=1' );
		} elseif (mysql_affected_rows() == 0) {
				// failed to insert row
				$response["success"] = 2;
				$response["message"] = "Oops! An error occurred.";
				Header( 'Location: ../autores.php?success=2' );
				} 
	}
	
	public function deleteAutores(Autores $autores){
		$id = $autores->getId();
		try {
			$result = mysql_query("DELETE FROM autores WHERE id = '$id'") or die (mysql_error());
		} catch (Exception $e){
			
		}
		
		if (mysql_affected_rows() == 1) {
			$response["success"] = 1;
			$response["message"] = "User successfully created.";
			//header( "refresh:5; url=../autores.php" );
			Header( 'Location: ../autores.php?success=1' );
		} else {
				// failed to insert row
				$response["success"] = 2;
				$response["message"] = "Oops! An error occurred.";
				Header( 'Location: ../autores.php?success=0' );
				} 
	}
	
	
	
	
	
	
	
}
?>