<?php 
ob_start();
include('../protecao/protect.php');
  require_once('functions.php'); 
  $nome = $_GET['id'];
$sqlconsulta =  "select * from pets where id = $nome";
	
	// executando instrução SQL
	$host = "localhost"; 			
	$user = "root"; 
	$pass = ""; 
	$db = "wda_crud";
$conexao = mysqlI_connect($host, $user, $pass, $db);
	$resultado = @mysqli_query($conexao, $sqlconsulta);
			$dados=mysqli_fetch_array($resultado);
			

  if (isset($_GET['id'])){
	  
    delete($_GET['id']);
	unlink ('imagens/'.$dados['foto']);
  } else {
    die("ERRO: ID não definido.");
  }
  ob_end_flush();
?>