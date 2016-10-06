<?php ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL | E_STRICT);

// Conexão do DB
require_once($_SERVER['DOCUMENT_ROOT'] . '/podchestmanager/include/db_connect.php');

// Conectando ao DB
$db = new DB_CONNECT();

// Array para resposta
$response = array();

class usuarioDAO {
	
	/**
	* Create users
	**/
	public function inserir(Usuario $usuario){
		
		$nomeRecebido = $usuario->getFirstname();
		$nome = utf8_decode($nomeRecebido);
		$sobrenomeRecebido = $usuario->getLastname();
		$sobrenome = utf8_decode($sobrenomeRecebido);
		$email = $usuario->getEmail();
		//$enc_password = hash('sha512', $usuario->getPassword());
		$password = $usuario->getPassword();
		$isAdmin = $usuario->getIsAdmin();
		$isActive = $usuario->getIsActive();
		$action = $usuario->getAction();
			
			
		try {
			$result = mysql_query("INSERT INTO usuarios(nome, sobrenome, email, senha, isAdmin, isActive) 
						  VALUES('$nome', '$sobrenome', '$email', '$password', '$isAdmin', '$isActive')");
			
		} catch (Exception $e) {
			
		}
		
		if ($result) {
			// successfully inserted into database
			$response["success"] = 1;
			$response["message"] = "User successfully created.";
			if ($action == 1) {
				Header( 'Location: http://fobstudio.com.br/podchestmanager/usuarios.php?success=1' );
				exit();
			}
			} else {
				// failed to insert row
				$response["success"] = 0;
				$response["message"] = "Oops! An error occurred.";
				if ($action == 1) {
					Header( 'Location: http://fobstudio.com.br/podchestmanager/usuarios.php?success=1' );
					exit();
				}
			}	
		echo json_encode($response);
	}
	
	/**
	* Read users by id
	**/		
	public function lerUsuarioId(Usuario $usuario){
		$id = $usuario->getId();
		try {
			$result = mysql_query("SELECT * FROM usuarios WHERE id = '$id'") or die(mysql_error());
		} catch (Exception $e) {
			
		}
		
		if (mysql_num_rows($result) > 0) {
	
			$response["usuario"] = array();
 
			while ($row = mysql_fetch_array($result)) {

				$podcast = array();
				$podcast["id"] = $row["id"];
				$podcast["nome"] = utf8_encode($row["nome"]);
				$podcast["sobrenome"] = utf8_encode($row["sobrenome"]);
				$podcast["email"] = utf8_encode($row["email"]);
				$podcast["senha"] = $row["senha"];
				$podcast["isAdmin"] = $row["isAdmin"];
				$podcast["isActive"] = $row["isActive"];
		
				array_push($response["usuario"], $podcast);
			}
	
			echo json_encode($response);
		}
	}
	
	/**
	* Read users by email
	**/
	public function lerUsuarioEmail(Usuario $usuario){
		$email = $usuario->getEmail();
		
		try {
			$result = mysql_query("SELECT * FROM usuarios WHERE email = '$email'") or die(mysql_error());
		} catch (Exception $e) {
			
		}
		
		if (mysql_num_rows($result) > 0) {
	
			$response["usuarios"] = array();
 
			while ($row = mysql_fetch_array($result)) {

				$podcast = array();
				$podcast["id"] = $row["id"];
				$podcast["nome"] = utf8_encode($row["nome"]);
				$podcast["sobrenome"] = utf8_encode($row["sobrenome"]);
				$podcast["email"] = utf8_encode($row["email"]);
				$podcast["senha"] = $row["senha"];
				$podcast["isAdmin"] = $row["isAdmin"];
				$podcast["isActive"] = $row["isActive"];
		
				array_push($response["usuarios"], $podcast);
			}
			echo json_encode($response);
		}
	}
	/**
	* Read All Users
	**/
	public function lerTodos(){
		try {
			$result = mysql_query("SELECT * FROM usuarios ORDER BY nome") or die(mysql_error());
		} catch (Exception $e) {
			
		}
		
		if (mysql_num_rows($result) > 0) {
	
			$response["usuario"] = array();
 
			while ($row = mysql_fetch_array($result)) {

				$podcast = array();
				$podcast["id"] = $row["id"];
				$podcast["nome"] = utf8_encode($row["nome"]);
				$podcast["sobrenome"] = utf8_encode($row["sobrenome"]);
				$podcast["email"] = utf8_encode($row["email"]);
				$podcast["senha"] = $row["senha"];
				$podcast["isAdmin"] = $row["isAdmin"];
				$podcast["isActive"] = $row["isActive"];
		
				array_push($response["usuario"], $podcast);
			}
			echo json_encode($response);
		}
	}
	
	/**
	* Read Users Signin
	**/
	public function signin(Usuario $usuario){
		$email = $usuario->getEmail();
		$password = $usuario->getPassword();
		
		try{
			$result = mysql_query("SELECT email, senha, isAdmin, isActive FROM usuarios where email = '$email' AND senha = '$password'");
			
		} catch (Exception $e){
			
		}
		
		$row = mysql_fetch_array($result);
			
			if ((mysql_num_rows($result) > 0) && ($row['isActive'] == 1) && ($row['isAdmin'] == 0)) {
		
				$response["success"] = 1;
				$response["message"] = "User exists and is active.";
			} elseif ((mysql_num_rows($result) > 0) && ($row['isActive'] == 0)) {
		
				$response["success"] = 2;
				$response["message"] = "User exists but is not active.";
		
			} elseif ((mysql_num_rows($result) > 0) && ($row['isActive'] == 1) && ($row['isAdmin'] == 1)) {
				
				session_start();
				
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$response["success"] = 3;
				$response["message"] = "User exists, is active and administrator.";
				Header( 'Location: http://fobstudio.com.br/podchestmanager/index.php' );
				exit();
		
			} else {
				
				$response["success"] = 0;
				$response["message"] = "User or password is incorrect.";
				Header( 'Location: http://fobstudio.com.br/podchestmanager/login.php?success=2' );
				exit();
			}		
		echo json_encode($response);
	}
	
	/**
	* Update users
	**/
	public function atualizar(Usuario $usuario){
		$id = $usuario->getId();
		$nomeRecebido = $usuario->getFirstname();
		$nome = utf8_decode($nomeRecebido);
		$sobrenomeRecebido = $usuario->getLastname();
		$sobrenome = utf8_decode($sobrenomeRecebido);
		$email = $usuario->getEmail();
		$password = $usuario->getPassword();
		$isAdmin = $usuario->getIsAdmin();
		$isActive = $usuario->getIsActive();
		//$action = $usuario->getAction();
		
		try {
			$result = mysql_query("UPDATE usuarios 
									SET nome = '$nome', 
									sobrenome = '$sobrenome' 
									WHERE id = '$id'") or die(mysql_error());
		} catch (Exception $e) {
			
		}
			
		if ((mysql_affected_rows()) == 1){
			$response["success"] = 1;
			$response["message"] = "Dados alterados com sucesso.";
			//Header( 'Location: ../usuarios.php?success=1' );
		} elseif ((mysql_affected_rows()) == 0) {
			$response["success"] = 0;
			$response["message"] = "Você não alterou os seus dados.";
			//Header( 'Location: ../usuarios.php?success=3' );
		} else {
			$response["success"] = 2;
			$response["message"] = "Não foi possível atualizar os seus dados. Tente novamente.";
			//Header( 'Location: ../usuarios.php?success=2' );
		}	
		echo json_encode($response);
	}
	
	/**
	* Update users (senha)
	**/
	public function atualizarSenha(Usuario $usuario){
		$id = $usuario->getId();
		$senha = $usuario->getPassword();
		//$enc_password = hash('sha512', $usuario->getNewPassword());
		
		
		try	{
			$result = mysql_query("UPDATE usuarios
									SET senha = '$senha'
									WHERE id = '$id'") or die (mysql_error());
	
		} catch (Exception $e) {
			
		}
		if ((mysql_affected_rows()) == 1){
			$response["success"] = 1;
			$response["message"] = "Dados alterados com sucesso.";
			//Header( 'Location: ../usuarios.php?success=1' );
		} elseif ((mysql_affected_rows()) == 0) {
			$response["success"] = 0;
			$response["message"] = "Você não alterou os seus dados.";
			//Header( 'Location: ../usuarios.php?success=3' );
		} else {
			$response["success"] = 2;
			$response["message"] = "Não foi possível atualizar os seus dados. Tente novamente.";
			//Header( 'Location: ../usuarios.php?success=2' );
		}	
		echo json_encode($response);
	}
	
	
	
	/**
	* Delete users
	**/
	public function excluir(Usuario $usuario){
		$id = $usuario->getId();
		
		try {
			$result = mysql_query("DELETE FROM usuarios WHERE id = '$id'") or die(mysql_error());
			//$resultado = mysql_query("SELECT * FROM usuarios WHERE id = '$id'");
			
		} catch (Exception $e) {
			$e->getCode();
		}
		
		if (mysql_affected_rows() == 1) {
				//successfully inserted into database
				$response["success"] = 1;
				$response["message"] = "User successfully deleted.";
				Header( 'Location: ../usuarios.php?success=1' );
		} elseif (mysql_affected_rows() == 0) {
			// failed to delete
			$response["success"] = 0;
			$response["message"] = "Oops! An error occurred.";
			Header( 'Location: ../usuarios.php?success=2' );
			exit();
		} else {
			$response["success"] = 0;
			$response["message"] = "Oops! An error occurred.";
			Header( 'Location: ../usuarios.php?success=3' );
			exit();
		}
					
		echo json_encode($response);
	}
	
	/**
	* Desativa Usuário (Não Deleta)
	**/
	public function revokeAccess(Usuario $usuario){
		$email = $usuario->getEmail();
		$isActive = $usuario->getIsActive();
		try {
			$result = mysql_query("UPDATE usuarios 
							SET isActive = 0
							WHERE email = '$email'") or die(mysql_error());
		} catch (Exception $e) {
			
		}					
		// check if row inserted or not
		if (mysql_affected_rows() == 1) {
			// successfully inserted into database
			$response["success"] = 1;
			$response["message"] = "User inactivated.";
			//Header( 'Location: ../usuarios.php?success=1' );
		} else {
			// failed to insert row
			$response["success"] = 0;
			$response["message"] = "Oops! An error occurred.";
			//Header( 'Location: ../usuarios.php?success=2' );
		}
		echo json_encode($response);
	}
	
}
?>