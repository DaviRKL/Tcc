<?php
require_once ('../config.php'); 
require_once DBAPI; 
include(HEADER_TEMPLATE); 

if(!isset($_SESSION)) {
	session_start();
}

if(!isset($_SESSION['id_empresa'])) {
	include_once(HEADER_TEMPLATE); 
	include(FOOTER_TEMPLATE); 
	echo"<br>" .  $_SESSION['id_empresa'];
	die("<h1>Você não pode acessar esta página porque não está logado.<br><a href=\"../index.php\">Clique aqui para voltar a página inicial</a></h1>");
}




?>
