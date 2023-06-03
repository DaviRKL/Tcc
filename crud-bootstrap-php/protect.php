<?php
require_once "config.php"; 
require_once DBAPI; 
include(HEADER_TEMPLATE); 
if(!isset($_SESSION)) {
	session_start();
}


if(!isset($_SESSION['id'])) {
	include(FOOTER_TEMPLATE); 
	echo "<hr>";
	  
	die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\">Ir para página inicial</a></p>");
	
}




?>