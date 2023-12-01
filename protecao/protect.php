<?php
require_once('../config.php');
require_once DBAPI;


if (!isset($_SESSION)) {
	session_start();
}


if (!isset($_SESSION['id'])) {
	include_once(HEADER_TEMPLATE);


	die("
	<div style='font-family: Montserrat; letter-spacing: 0.3px; text-transform: uppercase; padding-top: 30px;display: flex; flex-direction: row; justify-content: center; align-items: center;'>
		<h1>Parece que você não está logado =(<br></h1>
	</div>
	<div style='display: flex;flex-direction: row;justify-content: center; align-items: center;'>
	<img src = \"../images/cachorroerro.jpg\"/>
	</div>
	
	<div style='font-family: Montserrat; letter-spacing: 0.3px; text-transform: uppercase; padding-top: 25px;display: flex; flex-direction: row; justify-content: center; align-items: center;'>
		<h1>Faça seu Login antes de acessar a página!<br></h1>
	</div> ");
}

?>