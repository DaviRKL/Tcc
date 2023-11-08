<?php


if(!isset($_SESSION)) {
	session_start();
}
if(!isset($_SESSION['id'])) {
	
	die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\">Ir para página inicial</a></p>");
}
if(isset($_SESSION['id'])) {
	
	if($_SESSION['email']!= "admin") {
		die("<div style='display: flex;flex-direction: row;justify-content: center; align-items: center;'><h1>Você não pode acessar esta página porque não está logado. Faça seu Login clicando acima ou volte a tela incial<br></h1></div><div style='display: flex;flex-direction: row;justify-content: center; align-items: center;'><a href=\"../index.php\"><button class ='btn btn-dark'style='display: flex;flex-direction: row;justify-content: center; align-items: center;'/>Clique aqui para voltar a página inicial</a></div>");
	}
}


?>