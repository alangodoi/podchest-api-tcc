<?php session_start();
if(isset($_SESSION['email']) && !empty($_SESSION['email'])) {
   Header( 'Location: http://fobstudio.com.br/podchestmanager/index.php' );
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
				
	<title>PodChest Dashboard</title>
	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.orange-indigo.min.css" /> 
	<script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="css/custom.css" rel="stylesheet">
	<!-- Toastr -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
	
	<style media="screen" type="text/css">

		.text-center { 
			text-align : center;
		}
		.wrapper {
			margin : auto;
		}	

	</style>

</head>
<body>

<!--<form action="include/usuarioReadSigninAdmin.php" method="post">
<input type="email" name="email">
<input type="password" name="password">
<button type="submit" value="Entrar"></button>

</form>-->


<div class="mdl-card mdl-shadow--2dp wrapper">
  <div class="mdl-card__title text-center">
    <h2 class="mdl-card__title-text">Login</h2>
  </div>
  <div class="mdl-card__supporting-text">
	<form action="include/usuarioReadSigninAdmin.php" method="post">
    <!--<form action="valida.php" method="post" id="submitform">-->
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="usuario" required>
                <label class="mdl-textfield__label" for="usuario">Email</label>
            </div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" id="password" name="password" pattern=".{8,}" required>
				<label class="mdl-textfield__label" for="password">Password</label>
				<span class="mdl-textfield__error" for="sample3">A senha possui mais que 8 digitos.</span>
			</div>	
			<div class="mdl-card__actions mdl-card--border text-center">
				<input class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored" type="submit" value="Entrar" />
			</div>
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
	toastr.error('Usuário ou senha incorretos')
	</script>
	<?php
	} elseif (($_GET['success']) == 5) {?>
	 
	<script type="text/javascript">
	toastr.warning('Sessão expirada')
	</script>
	<?php
	}
	?>

</body>
</html>