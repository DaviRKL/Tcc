<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['id_empresa'])) {
	$_SESSION['id_empresa'] = '';
}
if (!isset($_SESSION['erro'])) {
	$_SESSION['erro'] = '';
}
include_once('controla_login.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DearPetz</title>
    <link rel="icon" href="<?php echo BASEURL; ?>images/LogoIcone.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/custom.css">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/reset.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/header.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/global-style.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/secao-bem-vindos.css" />
  
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/footer.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/responsivo.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
  <link rel="stylesheet" href="<?php echo BASEURL; ?>css/pets.css">
  <link rel="stylesheet" href="<?php echo BASEURL; ?>css/agendamentos.css">
  <link rel="stylesheet" href="<?php echo BASEURL; ?>css/cadastro.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/secao-empresas.css" />
  </head>
 


  <body>
    <?php  if (((isset($_SESSION['id_empresa']) & $_SESSION['id_empresa'] != null) || (isset($_SESSION['id']))) ): ?> 
      <script>
         var nomeJS = '<?php echo $_SESSION['nome'] ?>';
      window.onload = function() {
      AlertaLog();
     
    };  
    </script>
     <?php elseif ((!isset($_SESSION['id_empresa']) & $_SESSION['id_empresa'] == null) || (!isset($_SESSION['id']))): ?>
      <script>
        window.onload = function() {
          ZeraMessage();
    };     
      </script>
    <?php endif;?>
    
    <header class="header">
      <div class="header-div">
        <img
          class="icone-menu"
          src="<?php echo BASEURL?>images/icons/IconMenu.png"
          alt="Icone de Menu"
        />
        <a href="<?php echo BASEURL; ?>">
          <img class="logo" src="<?php echo BASEURL?>images/Logo.png" alt="Logo da página" />
				</a>
       
        <nav class="navegacao">
        <a href="<?php echo BASEURL; ?>pet">
          <img
                class="icone-osso"
                src="<?php echo BASEURL?>images/icons/osso.svg"
                alt="Icone de osso"
              />
        </a>
          <?php if ((!isset($_SESSION['id_empresa']) & $_SESSION['id_empresa'] == null) || (!isset($_SESSION['id']))): ?>
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#entrarmodal">
              <img
                class="icone-usuario"
                src="<?php echo BASEURL?>images/icons/conta.png"
                alt="Icone de usuário"
              />
            </a>
          <?php endif;?>
   
          <?php if ((isset($_SESSION['id_empresa']) & $_SESSION['id_empresa'] != null) || (isset($_SESSION['id']))): ?>
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#usuarioModal" >
              <img
                class="icone-usuario"
                src="<?php echo BASEURL?>images/icons/conta.png"
                alt="Icone de usuário"
              />
            </a>
          <?php endif;?>
          
        </nav>
      </div>
      <nav class="navegacao-menu">
        <div class="icones-do-menu">
          <img
            class="icone-dog"
            src="<?php echo BASEURL?>images/icons/dog.svg"
            alt="Icone de cachorro"
          />
          <img
            class="icone-fechar"
            src="<?php echo BASEURL?>images/icons/xmark-solid.svg"
            alt="Icone de fechar"
          />
        </div>
        <ul class="menu-item">
          <li class="item-do-menu">
            <a href="<?php echo BASEURL;?>" class="link-home">Home</a>
          </li>
          <?php if ((!isset($_SESSION['id_empresa']) || $_SESSION['id_empresa'] == null)): ?>
            <li class="item-do-menu">
              <a href="<?php echo BASEURL; ?>pet" class="link-nav">Pets</a>
              <ul class="sub-menu">
                <li><a href="<?php echo BASEURL; ?>pet">Meus Pets</a></li>
                <li><a href="<?php echo BASEURL; ?>pet/add.php">Novo Pet</a></li>
              </ul>
            </li>
            <li class="item-do-menu">
              <a href="<?php echo BASEURL; ?>agendamento" class="link-nav">Agendamentos</a>
              <ul class="sub-menu">
                <li><a href="<?php echo BASEURL; ?>agendamento">Meus agendamentos</a></li>
                <li><a href="<?php echo BASEURL; ?>agendamento/add.php">Agendar</a></li>
              </ul>
            </li>
            <li class="item-do-menu">
            <a href="<?php echo BASEURL;?>empresas/add.php" class="link-home">Cadastre sua empresa</a>
          </li>
          <?php endif; ?>
          <?php if (isset($_SESSION['id_empresa']) & $_SESSION['id_empresa'] != null): ?>
            <li class="item-do-menu">
              <a href="<?php echo BASEURL; ?>empresas/index.php" class="link-nav">Meu Petshop</a>
              <ul class="sub-menu">
                <li><a href="<?php echo BASEURL; ?>empresas/index.php">Agendamentos Marcados</a></li>
                <li><a href="<?php echo BASEURL; ?>empresas/addFuncionarios.php">Adicionar funcionário</a></li>
              </ul>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>

    <script src="<?php echo BASEURL; ?>js/menu.js"></script>

  <main>
<?php include('modalLogar.php'); include('modalSair.php'); include('modalUsuario.php');?>

<script  src="<?php echo BASEURL?>js/inc/alerts.js"></script>