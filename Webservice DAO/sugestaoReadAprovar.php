<?php

include_once 'sugestaoDAO.php';

$lerTodasSugestoes = new sugestaoDAO();

$lerTodasSugestoes->lerTodosAprovar();

?>