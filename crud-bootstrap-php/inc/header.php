<?php
if(!isset($_SESSION)) {
	session_start();
}

$logado="";
$Usuario = 'root';
$Senha = '';
$Database = 'wda_crud';
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

		$sql_code = "SELECT * FROM usuarios WHERE user = '$login' AND password = '$senha'";
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
			$_SESSION['user']= $Usuario['user'];
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
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>PETS KKKKK</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="<?php echo BASEURL; ?>images/paw.ico" type="image/x-icon">
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
		<link rel="stylesheet"  href="<?php echo BASEURL; ?>css/normalize.css">
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
	</head>
	<body>
		<nav class="navbar navbar-expand-xxl navbar-dark fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?php echo BASEURL; ?>"  style="margin-left: 20px;"><i class="fa-solid fa-house-chimney"></i> Home</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      				<span class="navbar-toggler-icon"></span>
    			</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav  mb-6 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASEURL; ?>agendamento" role="button"><i class="fa-solid fa-dog"></i>Agendamento</a>
						</li>
					</ul>
					<ul class="navbar-nav me-auto mb-6 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASEURL; ?>pet" role="button"><i class="fa-solid fa-dog"></i>Pets</a>
						</li>
						<?php if(isset($_SESSION['id'])):?> 
							<?php if ($_SESSION['user']=="admin"):?>
								<li class="nav-item">
									<a class="nav-link" href="<?php echo BASEURL; ?>empresas" ><i class="fa-solid fa-user-tie"></i> Empresas</a>
								</li>
							<?php endif; ?>
						<?php endif; ?>	
					</ul>
					<ul class="navbar-nav" id="barra">
						<li class="nav-item">
							<form class="d-flex" role="search">
								<i class="fa-solid fa-paw fa-2x" style="color: #fff; margin-right: 10px; margin-top: 3px; border: 0px; "></i><input class="form-control me-2" style="width: 400px;box-shadow: 4px 6px 7px -2px rgba(0,0,0,0.68);-webkit-box-shadow: 4px 6px 7px -2px rgba(0,0,0,0.68);-moz-box-shadow: 4px 6px 7px -2px rgba(0,0,0,0.68);" type="search" placeholder="Pesquisar" aria-label="Search">
								<button class="btn btn-outline-success" type="submit" style="color: #fff; border: 0px; background-color: #0ACCA7; box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-webkit-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-moz-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);">Pesquisar</button>
							</form>
						</li>
					</ul>
					<div class="form-group col-md-2"></div>
					<div class="form-group col-md-2">
						<ul class="navbar-nav mr-auto">
							<?php if(isset($_SESSION['id'])):?>
								<div class="form-group col-md-7">
									<p style="padding-right: 20px;margin-top: 9px;"><i class="fa-solid fa-user"></i>  Bem vindo, <?php echo $_SESSION['user']; ?></p>  
								</div>	          
							<?php endif; ?>
							<?php if(!isset($_SESSION['id'])):?>
								<div class="form-group col-md-3">
									<a class="nav-link" href="<?php echo BASEURL;?>login.php">Entre</a>		
								</div>
								<div class="form-group col-md-5">
									<a class="nav-link" href="<?php echo BASEURL;?>usuarios/add.php">Cadastre-se<i class="fa-solid fa-user"></i></a>
								</div>
							<?php endif; ?>	
							<?php if(isset($_SESSION['id'])):?>
								<div class="form-group col-md-5">
									<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutmodal"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
								</div>
							<?php endif; ?>	 
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</body>
 <main class="container">
<?php include('modaluser.php'); ?>
