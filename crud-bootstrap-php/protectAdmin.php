<?php


if(!isset($_SESSION)) {
	session_start();
}
if(!isset($_SESSION['id'])) {
	
	die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\">Ir para página inicial</a></p>");
}
if(isset($_SESSION['id'])) {
	
	if($_SESSION['user']!= "admin") {
		die("Você não pode acessar esta página porque não é adminitrador.<p><a  href=\"../index.php\">Voltar para tela incial
		</a></p>");
	}
}


?>