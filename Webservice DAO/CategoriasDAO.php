<?php

// Conexão DB
require_once($_SERVER['DOCUMENT_ROOT'] . '/podchestmanager/include/db_connect.php');

// Conectando ao DB
$db = new DB_CONNECT();

// Array para resposta
$response = array();

class CategoriasDAO {
	
	public function inserir (Categorias $categorias){
	
		$nome = $categorias->getNome();
		
		try {
			$result = mysql_query("INSERT INTO categorias VALUES (null, '$nome')");
		
		if ($result) {
					// successfully inserted into database
					$response["success"] = 1;
					$response["message"] = "User successfully created.";
					//header("Location: ../categorias.php");
					Header( 'Location: ../categorias.php?success=1' );
					exit();
					} else {
						// failed to insert row
						$response["success"] = 0;
						$response["message"] = "Oops! An error occurred.";
						Header( 'Location: ../categorias.php?success=2' );
						exit();
					} 
		} catch (Exception $e) {
			
		}
		echo json_encode($response);
		
	}
	
	public function lerCategorias(){
		try {
			
			$result = mysql_query("SELECT * FROM categorias") or die(mysql_error());
			
		} catch (Exception $e){
			
		}
		
		if (mysql_num_rows($result) > 0) {
			
			$response["categorias"] = array();
			
			while ($row = mysql_fetch_array($result)) {
				
				$categorias = array();
				$categorias["id"] = $row["id"];
				$categorias["nome"] = utf8_encode($row["nome_cat"]);
			
			array_push($response["categorias"], $categorias);
		}
		echo json_encode($response);
		}
		
	}
	
	public function atualizar(Categorias $categorias){
		$id = $categorias->getId();
		$nome = $categorias->getNome();
		
		try {
			$result = mysql_query("UPDATE categorias 
									SET nome_cat = '$nome'
									WHERE id = $id");
		} catch (Exception $e){
			
		}
		
		if (mysql_affected_rows() == 1) {
			$response["success"] = 1;
			$response["message"] = "User successfully created.";
			Header( 'Location: ../categorias.php?success=1' );
		} elseif (mysql_affected_rows() == 0) {
				// failed to insert row
				$response["success"] = 2;
				$response["message"] = "Oops! An error occurred.";
				Header( 'Location: ../categorias.php?success=2' );
				} 
	}
	
	public function deleteCategorias(Categorias $categorias){
		
		$id = $categorias->getId();
		
		try {
			$result = mysql_query("DELETE FROM categorias WHERE id = '$id'") or die (mysql_error());
		} catch (Exception $e){
			
		}
		
		if (mysql_affected_rows() == 1) {
			$response["success"] = 1;
			$response["message"] = "User successfully created.";
			Header( 'Location: ../categorias.php?success=1' );
		} else {
				// failed to insert row
				$response["success"] = 2;
				$response["message"] = "Oops! An error occurred.";
				Header( 'Location: ../categorias.php?success=2' );
				} 
	}
}
?>