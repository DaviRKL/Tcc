
<?php 
ob_start();
include('../protecao/protect.php');
  require_once('functions.php'); 
  $id = $_GET['id'];
$sqlconsulta =  "select * from agendamentos where id = $id";
	
	// executando instrução SQL

$conexao = mysqlI_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	$resultado = @mysqli_query($conexao, $sqlconsulta);
			$dados=mysqli_fetch_array($resultado);
			

  if (isset($_GET['id'])){
	  
    delete($id);
	unlink ('imagens/'.$dados['foto']);
  } else {
    die("ERRO: ID não definido.");
  }
  ob_end_flush();
?>