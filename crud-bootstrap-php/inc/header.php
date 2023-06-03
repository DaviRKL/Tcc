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
		<style>
			body {
				padding-top: 50px;
				padding-bottom: 20px;
			}
			.btn-light, .btn-default, input, select {
				color: #FFF;
				background-color:#20324F;
			}
			.btn-light:hover, .btn-default:hover {
				color: #FFF;
				background-color: #ABC3DB;
			}
			.btn-secondary {
				color: #FFF;
				background-color:   #2C445C;
			}
			.btn-secondary:hover {
				color: #FFF;
				background-color: #8396A8;
			}
			.btn-dark{
				color: #FFF;
				background-color:#00B2C2;
			}
			.btn-dark:hover {
				color: #FFF;
				background-color: #8396A8;
			}
			header, #actions, h2{
				margin-top: 10px;
				
			}
			.navbar, li{
				background-color: #00a4b4;
				align: center;
			}
			.dropdown-item{
				color: white;
			}
			table{ 
				background:#00a4b4; 
				
				border-radius: 15px;
			}
			td,th{
				color: #FFF;
			}
			h5,h2, H4, label{
				color: whitesmoke;
			}
			h4{
				padding-top: 7px;
			}
			
		

#main {
  transition: margin-left .5s;
  padding: 16px;
}

			
			
		</style>
		
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
	</head>
	<body>
		
	<nav class="navbar navbar-expand-sm  navbar-dark fixed-top">
		  <div class="container-fluid">
		  
			<a class="navbar-brand" href="<?php echo BASEURL; ?>"><i class="fa-solid fa-house-chimney"></i> Home</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
			  <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
		
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-shower"></i> Banho & Tosa</a>
				  <ul class="dropdown-menu">
				  <?php if(isset($_SESSION['id'])):?>
					<li><a class="dropdown-item" href="<?php echo BASEURL; ?>agendamento/add.php"><i class="fa-solid fa-paw"></i> Agendar</a></li>
					<?php endif; ?>
					<li><a class="dropdown-item"  href="<?php echo BASEURL; ?>agendamento"><i class="fa-solid fa-dog"></i>Meus agendamentos</a></li>
				  </ul>
				</li>
			  </ul>
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-dog"></i>Pets</a>
				  <ul class="dropdown-menu">
				  <?php if(isset($_SESSION['id'])):?>
					<li><a class="dropdown-item" href="<?php echo BASEURL; ?>pet/add.php"><i class="fa-solid fa-paw"></i>Adicionar Pet</a></li>
					<?php endif; ?>
					<li><a class="dropdown-item"  href="<?php echo BASEURL; ?>pet"><i class="fa-solid fa-dog"></i>Meus Pets</a></li>
				  </ul>
				</li>
			  </ul>
			  <ul class="navbar-nav">
			<?php if(isset($_SESSION['id'])):?>
				
					<?php endif; ?>
					</ul>
			  
			
			<?php if(isset($_SESSION['id'])):?> 
			<?php if ($_SESSION['user']=="admin"):?>
			  <ul class="navbar-nav">
			  <a class="nav-link" href="<?php echo BASEURL; ?>empresas" ><i class="fa-solid fa-user-tie"></i> Empresas</a>
				<a class="nav-link" href="<?php echo BASEURL; ?>ongs"><i class="fa-solid fa-car-on"></i> Adoção</a>
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-users"></i> Usuários</a>
				  <ul class="dropdown-menu">
					<li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/add.php"><i class="fa-solid fa-user-plus"></i> Adicionar usuários</a></li>
					<li><a class="dropdown-item"  href="<?php echo BASEURL; ?>usuarios"><i class="fa-solid fa-users"></i> Usuários</a></li>
				  </ul>
				</li>
			  </ul>
                          <?php endif; ?>
			<?php endif; ?>
			
		  </div>
			</div>
			
		  <div class="form-group col-md-2">
		  <ul class="navbar-nav ml-auto">
		  <?php if(isset($_SESSION['id'])):?>

                  <H5 style="color: whitesmoke, padding-right: 20px;"><i class="fa-solid fa-user"></i>  Bem vindo, <?php echo $_SESSION['user'];  ?></H5>
                  
                  
		  <?php endif; ?>
		  </ul>	 
          </div>
		  
		  <div class="form-group col-md-2">
			<ul class="navbar-nav ml-auto">
			
			<?php if(!isset($_SESSION['id'])):?>
			
			
			
				
   					 <div class="form-group col-md-3">
						<a class="nav-link" href="<?php echo BASEURL; ?>login.php">Entre</a>		
				</div>
				<div class="form-group col-md-5">
				<a class="nav-link" href="<?php echo BASEURL; ?>usuarios/add.php">Cadastre-se  <i class="fa-solid fa-user"></i></a>
				</div>
				</div>
				<?php endif; ?>
				<?php if(isset($_SESSION['id'])):?>
				<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutmodal"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>
				
				<?php endif; ?>
			
				
			</ul>	 
          </div>
		</nav>
	</body>
    <main class="container">
	<?php include('modaluser.php'); ?>