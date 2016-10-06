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
	
	<link href="css/custom.css" rel="stylesheet">
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
      <a class="mdl-navigation__link" id="left-menu-autores" href="autores.php"><i class="material-icons">group</i>Autores</a>
	  <a class="mdl-navigation__link" id="left-menu-categorias" href="categorias.php"><i class="material-icons">list</i>Categorias</a>
	  <a class="mdl-navigation__link" id="left-menu-podcasts" href="podcasts.php"><i class="material-icons">audiotrack</i>Podcasts</a>
	  <a class="mdl-navigation__link" id="left-menu-usuarios" href="usuarios.php"><i class="material-icons">person</i>Usuários</a>
    </nav>
  </div>
  <main class="mdl-layout__content">
  <!-- Your content goes here -->
    <div class="page-content">
		
		
		
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		  <div class="mdl-tabs__tab-bar">
			  <a href="#starks-panel" class="mdl-tabs__tab is-active">Sugestões</a>
			  <!--<a href="#lannisters-panel" class="mdl-tabs__tab">Sugestões atendidas</a>-->
		  </div>

		  <div class="mdl-tabs__panel is-active mdl-layout" id="starks-panel">
			<?php 			
				$result = array();
				ob_start(); // begin collecting output

				include 'include/sugestaoReadAprovar.php';
				
				$result = ob_get_clean();
				
				$data = json_decode($result);
				
				echo '<table class="mdl-data-table mdl-js-data-table mdl-typography--text-center" id="tablee" >
						<thead>
							<tr>
								<th>ID</th>
								<th class="mdl-data-table__cell--non-numeric">Nome do Podcast</th>
								<th>Link</th>
								<!--<th>Email</th>
								<th>Senha</th>
								<th>Administrador</th>
								<th>Ativado</th>-->
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>';
							foreach ($data->sugestoes as $row) {
							echo '<tr>
								<td>'.$row->id.'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$row->nome.'</td>
								<td>'.$row->link.'</td>
								<!--<td>'.$row->email.'</td>
								<td>'.$row->senha.'</td>
								<td>'.$row->isAdmin.'</td>
								<td>'.$row->isActive.'</td>-->
								<td>
									<a class="mdl-navigation__link" href="#"><i class="material-icons">edit</i></a>
								</td>
								<td>
									<a class="mdl-navigation__link" href="#"><i class="material-icons">delete</i></a>
								</td>
							</tr>';
							}
						echo '</tbody>
				</table>';
				?>
		  </div>
		  <div class="mdl-tabs__panel mdl-layout" id="lannisters-panel">
			<?php 			
				$result = array();
				ob_start(); // begin collecting output

				include 'include/sugestaoReadAprovados.php';
				
				$result = ob_get_clean();
				
				$data = json_decode($result);
				
				echo '<table class="mdl-data-table mdl-js-data-table full-width" id="tablee" >
						<thead>
							<tr>
								<th>ID</th>
								<th class="mdl-data-table__cell--non-numeric">Nome do Podcast</th>
								<th>Link</th>
								<!--<th>Email</th>
								<th>Senha</th>
								<th>Administrador</th>
								<th>Ativado</th>-->
								<th>Editar</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>';
							foreach ($data->sugestoes as $row) {
							echo '<tr>
								<td>'.$row->id.'</td>
								<td class="mdl-data-table__cell--non-numeric">'.$row->nome.'</td>
								<td>'.$row->link.'</td>
								<!--<td>'.$row->email.'</td>
								<td>'.$row->senha.'</td>
								<td>'.$row->isAdmin.'</td>
								<td>'.$row->isActive.'</td>-->
								<td>
									<a class="mdl-navigation__link" href="#"><i class="material-icons">edit</i></a>
								</td>
								<td>
									<a class="mdl-navigation__link" href="#"><i class="material-icons">delete</i></a>
								</td>
							</tr>';
							}
						echo '</tbody>
				</table>';
				?>
		</div>
	
	
	
		
	</div>
  </main>
</div>


</body>
</html>