<?php
$Usuario = 'root';
$Senha = '';
$Database = 'tcc';
$Host = 'localhost';

$mysqli = new mysqli($Host, $Usuario, $Senha, $Database);

if($mysqli->error){
    die("Falha ao conectar ao banco de dados" . $mysqli->error);
}



if(isset($_POST['USER']) || isset($_POST['senha'])) {

	if(strlen($_POST['USER']) == 0){
		echo "Preencha seu usuario";
		$logado = "nao";
		
	}
	else if(strlen($_POST['senha']) ==0){
		echo "Preencha sua senha";
		$logado = "nao";
		
	}
	else{
		$login = $mysqli->real_escape_string($_POST['USER']);
		$senha = $mysqli->real_escape_string($_POST['senha']);

		$sql_code = "SELECT * FROM usuarios WHERE email = '$login' AND password = '$senha'";
		$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " .$mysqli->error);

		$quantidade = $sql_query->num_rows;

		if($quantidade == 1) {
			$Usuario = $sql_query->fetch_assoc();

			if(!isset($_SESSION)) {
				session_start();
			}

			$_SESSION['id'] = $Usuario['id'];
			$_SESSION['nome'] = $Usuario['nome'];
			$logado="ok";
			$_SESSION['email']= $Usuario['email'];
			header("Location: index.php");

		} else {
			echo "Falha ao logar! Usuario ou senha incorretos";
                        			$_SESSION['message'] = "Falha ao logar! Usuario ou senha incorretos";
            $_SESSION['type'] = "danger";
			$logado = "nao";
			header("Location: login.php");
		}
	}

}
?>