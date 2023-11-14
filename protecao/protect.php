<?php
require_once('../config.php');
require_once DBAPI;
include_once(HEADER_TEMPLATE);

if (!isset($_SESSION)) {
	session_start();
}


if (!isset($_SESSION['id'])) {
	include_once(HEADER_TEMPLATE);
	include(FOOTER_TEMPLATE);
	echo "<br>";
	die("<div style='display: flex;flex-direction: row;justify-content: center; align-items: center;'><h1>Você não pode acessar esta página porque não está logado. Faça seu Login clicando acima ou volte a tela incial<br></h1></div><div style='display: flex;flex-direction: row;justify-content: center; align-items: center;'><a href=\"../index.php\"><button class ='btn btn-dark'style='display: flex;flex-direction: row;justify-content: center; align-items: center;'/>Clique aqui para voltar a página inicial</a></div>");
}




?>