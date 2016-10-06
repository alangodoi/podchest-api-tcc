<?php session_start();
if(!isset($_SESSION['email']) && empty($_SESSION['email'])) {
   Header( 'Location: http://fobstudio.com.br/podchestmanager/login.php?success=5' );
}?>
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
		#custom, #btn {
			margin:10px;
		}
		#id, #nome {
			width:300px;
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
  
    <div class="page-content">

		<div class="panel panel-default">
			<div class="panel-heading">Editar autor</div>
				<form id="custom" method="post" action="include/autoresUpdate.php">
					<div class="form-group">
						<label for="id">ID</label>
						<input type="text" class="form-control" name="id" id="id" value="<?php echo $_GET['id']?>" readonly>
						<label for="nome">Nome do autor</label>
						<input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do autor" value="<?php echo $_GET['nome']?>">
					</div>
					<button type="submit" class="btn btn-primary" id="btn">Salvar</button>
				</form>
		</div>			
	</div>

	<!-- ##### Scripts ##### -->
	<!-- JQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Toastr -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

	<?php
	if (($_GET['success']) == 1) {?>

	<script type="text/javascript">
	toastr.success('Operação realizada com sucesso')
	</script>
	<?php    
	} elseif (($_GET['success']) == 2) {?>

	 <script type="text/javascript">
	toastr.error('Operação falhou')
	</script>

	<?php
	}
	?>
</body>
</html>