<?php

header("Content-Type: text/html; charset=utf-8",true);

$response = array();

	//require_once __DIR__ . '/db_connect.php';
	require_once($_SERVER['DOCUMENT_ROOT'] . '/podchestmanager/include/db_connect.php');
 
	// conectando ao DB
	$db = new DB_CONNECT();
	
	$resultAut = mysql_query("SELECT * FROM autores") or die(mysql_error());
	$resultCat = mysql_query("SELECT * FROM categorias") or die(mysql_error());
	
	if (mysql_num_rows($resultAut) > 0){
		
		$responseAut["autores"] = array();
		
		while ($row = mysql_fetch_array($resultAut)){
			$autores = array();
			$autores ["id"] = $row["id"];
			$autores ["nome_autores"] = utf8_encode($row["nome_autores"]);
			
			array_push($responseAut["autores"], $autores);
		}
		
	}
	
	if (mysql_num_rows($resultCat) > 0){
		
		$responseCat["categorias"] = array();
		
		while ($row = mysql_fetch_array($resultAut)){
			$categorias = array();
			$categorias ["id"] = $row["id"];
			$categorias ["nome_cat"] = utf8_encode($row["nome_cat"]);
			
			array_push($responseCat["categorias"], $categorias);
		}
	}
	
	$result = array( 'autores' => $responseAut, 'categorias' => $responseCat );
	echo json_encode( $result );

?>