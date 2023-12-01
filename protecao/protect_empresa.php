<?php
require_once ('../config.php'); 
require_once DBAPI; 


if(!isset($_SESSION)) {
	session_start();
}

if (!isset($_SESSION['id_empresa'])) {
	include_once(HEADER_TEMPLATE);


	die("
	<div style='display: flex;flex-direction: row;justify-content: center; align-items: center;'>
		<h1>Parece que você não está logado =(<br></h1>
	</div>
	<div style='display: flex;flex-direction: row;justify-content: center; align-items: center;'>
	<img src = \"../images/cachorroerro.jpg\"/>
	</div>
	
	<div style='display: flex;flex-direction: row;justify-content: center; align-items: center;'>
		<h1>Faça seu Login antes de acessar a página!<br></h1>
	</div> ");
}





?>
