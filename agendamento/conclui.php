<?php 
ob_start();
include('../protecao/protect.php');
  require_once('functions.php'); 
  $id = $_GET['id'];
$sqlconsulta =  "select * from agendamentos where id = $id";
	
	// executando instrução SQL
	$host = "localhost"; 			
	$user = "root"; 
	$pass = ""; 
	$db = "tcc";
$conexao = mysqlI_connect($host, $user, $pass, $db);
	$resultado = @mysqli_query($conexao, $sqlconsulta);
			$dados=mysqli_fetch_array($resultado);
			

  if (isset($_GET['id'])){
    $agendamento['status'] = 'concluido';
    $agendamento['eventColor'] = 'blue';
    update('agendamentos', $id, $agendamento);
    header('location: ../empresas/agenda.php');
  } else {
    die("ERRO: ID não definido.");
  }
  ob_end_flush();


?>
