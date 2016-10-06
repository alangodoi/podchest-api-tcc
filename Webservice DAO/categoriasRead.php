<?php

include_once 'CategoriasDAO.php';

$lerTodosCategorias = new CategoriasDAO();

$lerTodosCategorias->lerCategorias();

?>