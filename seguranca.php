<?php
/**
* Sistema de segurança com acesso restrito
*
* Usado para restringir o acesso de certas páginas do seu site
*
* @author Thiago Belem <contato@thiagobelem.net>
* @link http://thiagobelem.net/
*
* @version 1.0
* @package SistemaSeguranca
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);
//  Configurações do Script
// ==============================
$_SG['conectaServidor'] = true;    // Abre uma conexão com o servidor MySQL?
$_SG['abreSessao'] = true;         // Inicia a sessão com um session_start()?
$_SG['caseSensitive'] = false;     // Usar case-sensitive? Onde 'thiago' é diferente de 'THIAGO'
$_SG['validaSempre'] = true;       // Deseja validar o usuário e a senha a cada carregamento de página?
// Evita que, ao mudar os dados do usuário no banco de dado o mesmo contiue logado.

$_SG['servidor'] = 'mysql01.fobstudio1.hospedagemdesites.ws';   // Servidor MySQL
$_SG['usuario'] = 'fobstudio1';          						// Usuário MySQL
$_SG['senha'] = 'Tabacompras123';                				// Senha MySQL
$_SG['banco'] = 'fobstudio1';            					    // Banco de dados MySQL
$_SG['paginaLogin'] = 'login.php'; 								// Página de login

$_SG['tabela'] = 'usuarios';       // Nome da tabela onde os usuários são salvos
// ==============================
ini_set('session.use_only_cookies', 'On');
// ======================================
//   ~ Não edite a partir deste ponto ~
// ======================================

// Verifica se precisa fazer a conexão com o MySQL
if ($_SG['conectaServidor'] == true) {
  $_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
  mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");
}

// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true)
  session_start();

/**
* Função que valida um email e senha
*
* @param string $email - O email a ser validado
* @param string $senha - A senha a ser validada
*
* @return bool - Se o usuário foi validado ou não (true/false)
*/
function validaUsuario($email, $senha) {
  global $_SG;

  $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';

  // Usa a função addslashes para escapar as aspas
  $nemail = addslashes($email);
  $nsenha = addslashes($senha);

  // Monta uma consulta SQL (query) para procurar um usuário
  $sql = "SELECT `id`, `nome` FROM `".$_SG['tabela']."` WHERE ".$cS." `email` = '".$nemail."' AND ".$cS." `password` = '".$nsenha."' LIMIT 1";
  $query = mysql_query($sql);
  $resultado = mysql_fetch_assoc($query);

  // Verifica se encontrou algum registro
  if (empty($resultado)) {
    // Nenhum registro foi encontrado => o usuário é inválido
    return false;
  } else {
    // Definimos dois valores na sessão com os dados do usuário
    $_SESSION['id'] = $resultado['id']; // Pega o valor da coluna 'id do registro encontrado no MySQL
    $_SESSION['nome'] = $resultado['nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL

    // Verifica a opção se sempre validar o login
    if ($_SG['validaSempre'] == true) {
      // Definimos dois valores na sessão com os dados do login
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha;
    }

    return true;
  }
}

/**
* Função que protege uma página
*/
function protegePagina() {
  global $_SG;

  if (!isset($_SESSION['id']) OR !isset($_SESSION['nome'])) {
    // Não há usuário logado, manda pra página de login
    expulsaVisitante();
  } else if (!isset($_SESSION['id']) OR !isset($_SESSION['nome'])) {
    // Há usuário logado, verifica se precisa validar o login novamente
    if ($_SG['validaSempre'] == true) {
      // Verifica se os dados salvos na sessão batem com os dados do banco de dados
      if (!validaUsuario($_SESSION['email'], $_SESSION['senha'])) {
        // Os dados não batem, manda pra tela de login
        expulsaVisitante();
      }
    }
  }
}

/**
* Função para expulsar um visitante
*/
function expulsaVisitante() {
  global $_SG;

  // Remove as variáveis da sessão (caso elas existam)
  unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['senha']);

  // Manda pra tela de login
  header("Location: ".$_SG['paginaLogin']);
}