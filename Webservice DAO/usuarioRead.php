<?php

include_once 'UsuarioDAO.php';

$lerTodosUsuarios = new UsuarioDAO();

$lerTodosUsuarios->lerTodos();

?>