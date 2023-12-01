<?php 
ob_start();
include('../protecao/protect.php');
  require_once('functions.php'); 
  include('../conexao.php'); 
  $nome = $_GET['id'];
$sqlconsulta =  "select * from pets where id = $nome";
	$resultado = @mysqli_query($conn, $sqlconsulta);
			$dados=mysqli_fetch_array($resultado);
			

  if (isset($_GET['id'])){
	  
    delete($_GET['id']);
	unlink ('imagens/'.$dados['foto']);
  } else {
    die("ERRO: ID não definido.");
  }
  ob_end_flush();
?>