<?php
if(!isset($_SESSION)) {
	session_start();
}
include_once('controla_login.php');
include_once('controla_login_empresa.php');
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
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/custom.css">
		
		
	</head>
	<body>
		<nav class="navbar bg-body-tertiary fixed-top">
			<div class="container-fluid">
				<div class=" col-6">
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation" style="border: none;">
					<span class="navbar-toggler-icon" ></span>
				</button>
				</div>
				<div class=" col-4" >
					<img src="<?php echo BASEURL; ?>images/Logo.png" style="height: 50px" />
				</div>
				<?php if( (isset($_SESSION['id']))) :?>
					<div class="col" style="margin-right: 10px">
						<p style="margin-top: 9px;margin-left: 20px;"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['email']; ?></p>  
					</div>	
					<a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#logoutmodal"><i class="fa-solid fa-right-from-bracket"></i> Sair</a>  								
				<?php endif; ?>
				<?php if(!isset($_SESSION['id']) ):?>
						<a class="nav-link" href="<?php echo BASEURL;?>logins/login.php">Entre</a>		
						<a class="nav-link" href="<?php echo BASEURL;?>usuarios/add.php">Cadastre-se<i class="fa-solid fa-user"></i></a>
				<?php endif; ?>	
				<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Petz</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
							<li class="nav-item">
								<a class="navbar-brand" href="<?php echo BASEURL; ?>" style="color: #FFF"><i class="fa-solid fa-house-chimney" style="color: #FFF"></i> Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo BASEURL; ?>agendamento" role="button"><i class="fa-regular fa-calendar-days"></i> Agendamento</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo BASEURL; ?>pet" role="button"><i class="fa-solid fa-dog"></i> Pets</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo BASEURL; ?>petshops" role="button"><i class="fa-solid fa-paw"></i> Pet Shops</a>
							</li>
							<?php if(isset($_SESSION['id'])):?> 
									<li class="nav-item">
										<a class="nav-link" href="<?php echo BASEURL; ?>empresas/add.php" role="button"><i class="fa-solid fa-paw"></i> Cadastre-se como empresa</a>
									</li>
							<?php endif; ?>	
						</ul>
					</div>
    			</div>
  			</div>
		</nav>
	</body>
 <main class="container">
<?php include('modaluser.php'); ?>