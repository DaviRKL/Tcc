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

		<style>

				@import url('https://fonts.googleapis.com/css2?family=Karla:wght@300&family=Roboto+Condensed:wght@300&display=swap');
			body {
				padding-top: 50px;
				padding-bottom: 20px;
			}
			.btn-light, .btn-default, input, select {
				
font-family: 'Roboto Condensed', sans-serif;
				color: #FFF;
				background-color:#20324F;
			}
			.btn-light:hover, .btn-default:hover {
				color: #FFF;
				background-color: #ABC3DB;
			}
			.btn-secondary {
				
font-family: 'Roboto Condensed', sans-serif;
				color: #FFF;
				background-color:   #2C445C;
			}
			.btn-secondary:hover {
				color: #FFF;
				background-color: #8396A8;
			}
			.btn-dark{
				
font-family: 'Roboto Condensed', sans-serif;
				color: #FFF;
				background-color:#00B2C2;
			}
			.btn-dark:hover {
				color: #FFF;
				background-color: #8396A8;
			}
			header, #actions, h2{
				
font-family: 'Roboto Condensed', sans-serif;
				margin-top: 10px;
				
			}
			
			.navbar{
				-webkit-box-shadow: 2px 17px 13px -4px rgba(0,0,0,0.75);
-moz-box-shadow: 2px 17px 13px -4px rgba(0,0,0,0.75);
box-shadow: 2px 17px 13px -4px rgba(0,0,0,0.75);
			}
			.navbar, li{
				
font-family: 'Roboto Condensed', sans-serif;
				background-color: #00a4b4;
				align: center;
			}
			.dropdown-item{
				
font-family: 'Roboto Condensed', sans-serif;
				color: white;
			}
			table{ 
				
				font-family: 'Roboto Condensed', sans-serif;
				background:#00a4b4; 
				border-radius: 15px;
			}
			td,th{
				
font-family: 'Roboto Condensed', sans-serif;
				color: #FFF;
			}
			h5,h2, H4, label{
				
font-family: 'Roboto Condensed', sans-serif;
				color: whitesmoke;
			}
			h4{
				
font-family: 'Roboto Condensed', sans-serif;
				padding-top: 7px;
			}
			#main {
				
font-family: 'Roboto Condensed', sans-serif;
				transition: margin-left .5s;
				padding: 16px;
			}	
			#barra{
				
font-family: 'Roboto Condensed', sans-serif;
				justify-content: center;
			}
			.nav-link{
				
font-family: 'Roboto Condensed', sans-serif;
				color:#C8D2C8;
			}
			.nav-link:hover{
				color:#FFF;
			}
			
		
			p{
    color: whitesmoke;
	font-family: 'Roboto Condensed', sans-serif;
}
body{

font-family: 'Roboto Condensed', sans-serif;
    overflow-x: hidden;
}

a{

    text-decoration: none;
    color: currentColor;
}

a:hover{

    color: currentColor;
}



header .container-fluid{

    width: 100%;
    padding: 0 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

@media(max-width:992px){

    header .container-fluid{

        padding: 0 5%;
    }
}

header .navb-logo img{

    width: 140px;
    height: 66px;
}

header .navb-items{

    display: flex;
    align-items: center;
    justify-content: flex-end;
    letter-spacing: 3px;
}

header .item{

    text-align: center;
    margin-inline: 15%;
    font-size: 20px;
    letter-spacing: 3px;
    color: #102447;
    padding: 5px 0;
    transition: all .1s ease;
    border-bottom: 0px solid #64d6f4;
    border-top: 0px solid #64d6f4;
    cursor: pointer;
}

header .item:hover{

    border-bottom: 3px solid #64d6f4;
    border-top: 3px solid #64d6f4;
}

header .item-button a{

    background-color: #274d8a;
    width: 150px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    transition: all .5s ease;
}

header .item-button a:hover{

    background-color: #64d6f4;
}

header .mobile-toggler{

    font-size: 30px;
}

/* modal */

.modal-dialog{

    margin: 0;
    width: 430px;
}

@media(max-width: 450px){

    .modal-dialog{

        width: 82%;
    }
}

.modal-content{

    border-radius: 0;
    height: 100vh;
    overflow-y: scroll;
    background-color: #102447;
}

.modal-header{

    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 88%;
    margin: 0 auto;
    padding-bottom: 16px;
    border-bottom: 2px solid #fefefe;
}

.modal-header img{

    width: 140px;
    height: 66px;
    margin-top: 17.5px;
}

.modal-header .btn-close{

    background: transparent;
    opacity: 1;
}

.modal-header i{

    color: #fefefe;
    font-size: 30px;
}

.modal-body{

    width: 88%;
    margin: 0 auto;
    padding: 75px 0 0 0;
    flex: unset;
}

.modal-body .modal-line{

	
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    padding: 7px 0;
    margin-bottom: 50px;
    cursor: pointer;
    transition: all .5s ease;
    color: #274d8a;
    border-bottom: 1px solid #274d8a;
}

.modal-body .modal-line:hover{

    color: #fefefe;
    border-bottom: 1px solid #fefefe;
}

.modal-line a{

    font-size: 17px;
    font-weight: 500;
    letter-spacing: 2.5px;
    color: #fefefe;
}

.modal-line i{

    color: currentColor;
    font-size: 30px;
    width: 35px;
    margin-right: 15px;
    padding: 0 0 3px 3px;
}

.navb-button{

    width: 100%;
    height: 47px;
    background-color: #fefefe;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 20px;
    font-weight: 700;
    color: #274d8a;
    letter-spacing: 2px;
    transition: all .5s ease;
}

.navb-button:hover{

    background-color: #274d8a;
    color: #fefefe;
}

.mobile-modal-footer{

    width: 87%;
    margin: 0 auto;
    padding: 20% 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 25px;
    color: #274d8a;
}

.mobile-modal-footer i:hover{

    color: #fefefe;
}



.section-1{

    width: 100vw;
    height: 95vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.section-1 p{

    font-size: 75px;
    font-weight: 700;
    color: #102447;
    width: 90%;
    text-align: center;
}
label{
	display: flex;flex-direction: row;justify-content: center; align-items: center; margin-top: 20px; 
}

@media(max-width:767px){

    .section-1 p{
		
        font-size: 50px;
        text-align: start;
        width: 70%;
        margin: auto;
    }
}
		
		</style>
	</head>
	<body>
			<nav class="navbar navbar-expand-xxl navbar-dark fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?php echo BASEURL; ?>"  style="margin-left: 20px;"><i class="fa-solid fa-house-chimney"></i> Home</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
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
						<div class="barra">
							<ul class="navbar-nav">
								<li class="nav-item">
									<form class="d-flex" role="search">
										<i class="fa-solid fa-paw fa-2x" style="color: #fff; margin-right: 10px; margin-top: 3px; border: 0px; "></i><input class="form-control me-2" style="width: 400px;box-shadow: 4px 6px 7px -2px rgba(0,0,0,0.68);-webkit-box-shadow: 4px 6px 7px -2px rgba(0,0,0,0.68);-moz-box-shadow: 4px 6px 7px -2px rgba(0,0,0,0.68);" type="search" placeholder="Pesquisar" aria-label="Search">
										<button class="btn btn-outline-success" type="submit" style="color: #fff; border: 0px; background-color: #8396A8; box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-webkit-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);-moz-box-shadow: 2px 3px 5px 1px rgba(0,0,0,0.68);">Pesquisar</button>
									</form>
								</li>
							</ul>
						</div>
					</div>
				</div>	
				<div class="form-group col-md-2">
					<ul class="navbar-nav ml-auto">
						
					</ul>	 
				</div>
			
				<div class="form-group col-md-2">
					<ul class="navbar-nav mr-auto">
					<?php if(isset($_SESSION['id'])):?>
						<div class="form-group col-md-6">
							<p style="color: whitesmoke, padding-right: 20px;margin-top: 9px;"><i class="fa-solid fa-user"></i>  Bem vindo, <?php echo $_SESSION['user'];  ?></p>  
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
		</nav>
	</body>
 <main class="container">
<?php include('modaluser.php'); ?>