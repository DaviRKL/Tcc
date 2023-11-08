<?php
$Usuario = 'root';
$senha_empresa = '';
$Database = 'tcc';
$Host = 'localhost';

$mysqli = new mysqli($Host, $Usuario, $senha_empresa, $Database);

if($mysqli->error){
    die("Falha ao conectar ao banco de dados" . $mysqli->error);
}



if(isset($_POST['email_empresa']) || isset($_POST['senha_empresa'])) {

	if(strlen($_POST['email_empresa']) == 0){
		echo "Preencha seu usuario";
		$logado = "nao";
		
	}
	else if(strlen($_POST['senha_empresa']) ==0){
		echo "Preencha sua senha";
		$logado = "nao";
		
	}
	else{
		$email_empresa = $mysqli->real_escape_string($_POST['email_empresa']);
		$senha_empresa = $mysqli->real_escape_string($_POST['senha_empresa']);
		$CNPJ = $mysqli->real_escape_string($_POST['CNPJ']);

		$sql_code = "SELECT * FROM usuarios WHERE email = '$email_empresa' AND password = '$senha_empresa' AND fk_empresas_cnpj = '$CNPJ'";
		$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " .$mysqli->error);

		$quantidade = $sql_query->num_rows;

		if($quantidade == 1) {
			$Usuario_empresa = $sql_query->fetch_assoc();

			if(!isset($_SESSION)) {
				session_start();
			}
			$_SESSION['id'] = $Usuario_empresa['id'];
			$_SESSION['id_empresa'] = $Usuario_empresa['fk_empresas_cnpj'];
			$_SESSION['nome'] = $Usuario_empresa['nome'];
			$logado="ok";
			$_SESSION['email']= $Usuario_empresa['email'];
			header("Location: agenda.php");

		} else {
			echo "Falha ao logar! CNPJ, email ou senha incorretos";
                        			$_SESSION['message'] = "Falha ao logar! CNPJ, email ou senha incorretos";
            $_SESSION['type'] = "danger";
			$logado = "nao";
			// header("Location: logins/login.php");
		}
	}

}
?>