<?php session_start();
if(!isset($_SESSION['email']) && empty($_SESSION['email'])) {
   Header( 'Location: http://fobstudio.com.br/podchestmanager/login.php?success=5' );
}
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
	
	
		<?php 			
				$result = array();
				ob_start(); // begin collecting output

				include 'include/usuarioRead.php';
				
				$result = ob_get_clean();
				
				$data = json_decode($result);
				
				echo '<div class="panel panel-default">
						<div class="panel-heading">Gerenciar usuários</div>
								<a class="mdl-navigation__link" id="#btnAddCat" href="" data-toggle="modal" data-target="#add" data-placement="right" title="Adicionar um novo usuário">
								<i class="material-icons">person_add</i>Adicionar</a>
						</div>
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th class="mdl-data-table__cell--non-numeric">Nome</th>
										<th class="mdl-data-table__cell--non-numeric">Sobrenome</th>
										<th>Email</th>
										<!--<th>Senha</th>-->
										<th>Administrador</th>
										<th>Ativado</th>
										<th>Editar</th>
										<th>Excluir</th>
									</tr>
								</thead>
								<tbody>';
									foreach ($data->usuario as $row) {
									echo '<tr>
										<td>'.$row->id.'</td>
										<td class="mdl-data-table__cell--non-numeric">'.$row->nome.'</td>
										<td class="mdl-data-table__cell--non-numeric">'.$row->sobrenome.'</td>
										<td>'.$row->email.'</td>
										<!--<td>'.$row->senha.'</td>-->
										<td>'.$row->isAdmin.'</td>
										<td>'.$row->isActive.'</td>
										<td>
											<a class="mdl-navigation__link" id="#tt1" href="editar_usuario.php?id='.$row->id.'&nome='.$row->nome.'">
											<i class="material-icons">edit</i></a>
										</td>
										<td>
											<a class="mdl-navigation__link" id="#tt2" href="include/usuarioDelete.php?id='.$row->id.'">
											<i class="material-icons">delete</i></a>
										</td>
									</tr>';
									}
								echo '</tbody>
						</table>';
						?>
	</div>			
  </main>
  
  <!-- Modal Adicionar Usuários -->
	<div class="modal fade bs-example-modal-lg" id="add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form method="post" action="include/usuarioCreate.php">
					<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">Adicionar usuário</h4>
						</div>
						<div class="modal-body">
							<input type="text" id="addInputs" class="form-control mod-pad" name="firstname" placeholder="Nome" value="" required>
							<input type="text" id="addInputs" class="form-control mod-pad" name="lastname" placeholder="Sobrenome" value="" required>
							<input type="email" id="addInputs" class="form-control mod-pad" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" 
							placeholder="Email" value="" required>
							<input type="password" id="addInputs" class="form-control mod-pad" name="password" pattern=".{8,}" 
							placeholder="Senha" value="" required>
							
							
							<div class="radio" id="addInputs">
								<label><input type="radio" name="isAdm" value="1" required>Administrador</label>
							</div>
							<div class="radio" id="addInputs">
								<label><input type="radio" name="isAdm" value="0" required>Comum</label>
							</div>
							
							<input type="hidden" min="1" max="1" id="addInputs" class="form-control mod-pad" name="isAct" placeholder="Nome" value="1" required>
							<input type="hidden" min="1" max="1" id="addInputs" class="form-control mod-pad" name="action" value="1" required>
							
						</div>
						<div class="modal-footer">
							<button type="button reset" class="btn btn-default" data-dismiss="modal"> Fechar</button>
							<button type="button submit" class="btn btn-primary">
								Salvar
							</button>
						</div>
				</form>
			</div>
		</div>
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