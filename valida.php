<?php
// Inclui o arquivo com o sistema de seguran�a
//require_once("seguranca.php");
require_once("seguranca.php");
// Verifica se um formul�rio foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Salva duas vari�veis com o que foi digitado no formul�rio
  // Detalhe: faz uma verifica��o com isset() pra saber se o campo foi preenchido
  $email = (isset($_POST['email'])) ? $_POST['email'] : '';
  $password = (isset($_POST['password'])) ? $_POST['password'] : '';

  $senha = hash('SHA512', $password);
  
  // Utiliza uma fun��o criada no seguranca.php pra validar os dados digitados
  if (validaUsuario($email, $senha) == true) {
    // O usu�rio e a senha digitados foram validados, manda pra p�gina interna
    header("Location: index.php");
  } else {
    // O usu�rio e/ou a senha s�o inv�lidos, manda de volta pro form de login
    // Para alterar o endere�o da p�gina de login, verifique o arquivo seguranca.php
    expulsaVisitante();
  }
}
?>