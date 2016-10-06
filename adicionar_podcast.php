<?php session_start();
if(!isset($_SESSION['email']) && empty($_SESSION['email'])) {
   Header( 'Location: http://fobstudio.com.br/podchestmanager/login.php?success=5' );
}
// Conexão do DB
//require_once($_SERVER['DOCUMENT_ROOT'] . '/podchestmanager/include/db_connect.php');

// Conectando ao DB
//$db = new DB_CONNECT();

/*include_once 'include/AutoresDAO.php';

$lerTodosAutores = new AutoresDAO();
$lerTodosAutores->lerAutores();*/

//$resultAut = mysql_query("SELECT * FROM autores");
//$resultCat = mysql_query("SELECT * FROM categorias");
$result = array();
$resultCat = array();
ob_start(); // begin collecting output

include 'include/spinnerData.php';
				
$result = ob_get_clean();
$data = json_decode($result);

foreach ($data->autores as $row) {
	
	echo $row->id;
	echo $row->nome;
	
}

foreach ($data->categorias as $row) {
	
	echo $row->id;
	echo $row->nome;
	
}



/*$autores = array();

while ($row = mysql_fetch_array($resultAut)) {
			
			$autores = array();
			$autores["id"] = $row["id"];
			$autores["nome"] = utf8_encode($row["nome_autores"]);
			
			}
			
			print_r(array_values ($autores));*/



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
				
    <title>PodChest Dashboard</title>
				
	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.blue_grey-indigo.min.css" /> 
	<script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">	
	<!-- Toastr -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

	<style>
		a#btnAddCat {
			padding:40px;
			margin:30px;
			margin-left:50px;
		}
		#addInputs {
			margin:10px;
		}
	</style>
</head>
<body>

<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <div class="mdl-layout-spacer"></div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
        <!--<label class="mdl-button mdl-js-button mdl-button--icon"
               for="fixed-header-drawer-exp">
          <i class="material-icons">search</i>
        </label>-->
		<i class="material-icons">verified_user</i><?php echo "Olá, " . $_SESSION['email']; ?>
        <div class="mdl-textfield__expandable-holder">
          <input class="mdl-textfield__input" type="text" name="sample"
                 id="fixed-header-drawer-exp">
        </div>
      </div>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <span class="mdl-layout-title">PodChest</span>
    <nav class="mdl-navigation">
	  <a class="mdl-navigation__link" id="left-menu-home" href="index.php" ><i class="material-icons">home</i>Home</a>
      <a class="mdl-navigation__link" id="left-menu-notify" href="solicitacoes.php"><i class="material-icons">notifications</i>Solicitações</a>
      <a class="mdl-navigation__link active" id="left-menu-autores" href="autores.php"><i class="material-icons">group</i>Autores</a>
	  <a class="mdl-navigation__link" id="left-menu-categorias" href="categorias.php"><i class="material-icons">list</i>Categorias</a>
	  <a class="mdl-navigation__link" id="left-menu-podcasts" href="podcasts.php"><i class="material-icons">audiotrack</i>Podcasts</a>
	  <a class="mdl-navigation__link" id="left-menu-usuarios" href="usuarios.php"><i class="material-icons">person</i>Usuários</a>
    </nav>
  </div>
    <main class="mdl-layout__content">
  <!-- Your content goes here -->
    <div class="page-content">

						
						<input type="text" id="addInputs" class="form-control mod-pad" name="nome" placeholder="Nome" value="" required>
							
							<div class="form-group">
								<textarea class="form-control" id="addInputs" rows="10" id="desc" placeholder="Descrição" name="descricao"></textarea>
							</div>
							
							<input type="text" id="addInputs" class="form-control mod-pad" name="link" placeholder="Link do feed" value="" required>
							<input type="text" id="addInputs" class="form-control mod-pad" name="imagem" placeholder="Link da imagem" value="" required>
							
							
							<?php						
							
							/*echo '<div class="form-group" id="addInputs">
									<label for="sel1">Autor:</label>
									<select class="form-control" id="sel1">';
									foreach ($data->autores as $row) {
										echo '<option>'.$row->nome.'</option>
									</select>
								</div>';
								};*/
								?>
								
							<div class="form-group" id="addInputs">
								<label for="sel1">Categoria:</label>
								<select class="form-control" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>
							
							<input type="text" id="addInputs" class="form-control mod-pad" name="autor" placeholder="Autor" value="" required>
							<input type="url" id="addInputs" class="form-control mod-pad" name="link" placeholder="Feed" value="" required>
							<input type="url" id="addInputs" class="form-control mod-pad" name="imagem" placeholder="Imagem" value="" required>
						
							<button type="button submit" class="btn btn-primary">
								Salvar
							</button>
						
						
						


							
	<!-- ##### Scripts ##### -->
	<!-- JQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Toastr -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

	<?php
	if (($_GET['success']) == 1){?>
	<script type="text/javascript">
	toastr.success('Operação realizada com sucesso')
	</script><?php
	} elseif ((@$_GET['success']) == 2) 
	{?>
	<script type="text/javascript">
	toastr.error('Operação falhou')
	</script>
	<?php
	}?>

</body>
</html>
						
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	