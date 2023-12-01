<?php 
ob_start();
include('../protecao/protect.php');
  require_once('functions.php');
  require_once('../conexao.php');  
  $id = $_GET['id'];
$sqlconsulta =  "select * from agendamentos where id = $id";

	$resultado = @mysqli_query($conn, $sqlconsulta);
			$dados=mysqli_fetch_array($resultado);
			

  if (isset($_GET['id'])){
    $agendamento['status'] = 'concluido';
    $agendamento['eventColor'] = 'blue';
    update('agendamentos', $id, $agendamento);
    header('location: ../empresas/index.php');
  } else {
    die("ERRO: ID não definido.");
  }
  ob_end_flush();


?>
