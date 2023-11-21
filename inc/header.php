<?php
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['id_empresa'])) {
	$_SESSION['id_empresa'] = '';
}
include_once('controla_login.php');
include_once('controla_login_empresa.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pets</title>
    <link rel="icon" href="<?php echo BASEURL; ?>images/paw.ico" type="image/x-icon">
	
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/custom.css">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/reset.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/header.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/global-style.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/secao-bem-vindos.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/secao-empresas.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/footer.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/responsivo.css" />
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/scrollbar.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
	<link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
		integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
 


  <body>
    <?php  if (((isset($_SESSION['id_empresa']) & $_SESSION['id_empresa'] != null) || (isset($_SESSION['id']))) ): ?> 
      <script>
         var nomeJS = '<?php echo $_SESSION['nome'] ?>';
      window.onload = function() {
      AlertaLog();
     
    };  
    </script>
    <?php endif;?>
    <?php if ((!isset($_SESSION['id_empresa']) & $_SESSION['id_empresa'] == null) || (!isset($_SESSION['id']))): ?>
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
        <img
              class="icone-osso"
              src="<?php echo BASEURL?>images/icons/osso.png"
              alt="Icone de osso"
            />
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
            <a class="nav-link" data-bs-toggle="modal" data-bs-target="#usuarioModal">
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
            <a href="<?php echo BASEURL;?>" class="link-nav">Home</a>
          </li>
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
        </ul>
      </nav>
    </header>

    <script src="<?php echo BASEURL; ?>js/menu.js"></script>

  <main>
<?php include('modal.php'); include('modalSair.php'); include('modalUsuario.php');?>

<script>
 
  var funcaoJaChamada = localStorage.getItem('funcaoJaChamada');
  function AlertaLog() {
    if (!funcaoJaChamada) {
      alert("Seja bem vindo ao DearPets " + nomeJS + "!");
          funcaoJaChamada = true; // Define a variável como true após a execução
          localStorage.setItem('funcaoJaChamada', funcaoJaChamada);
        }
  }
function ZeraMessage() {
        localStorage.removeItem('funcaoJaChamada');
}

</script>