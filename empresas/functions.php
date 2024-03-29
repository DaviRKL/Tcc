<?php

require_once('../config.php');
require_once('../inc/header.php');
require_once(DBAPI);


$empresas = null;
$empresa = null;

/**
 *  Listagem de Clientes
 */
function index($id = null) {
	global $empresas;
  $id = $_SESSION['id'];
  $empresas = filter('empresas', "id_tutor =  $id");
}
function get_pet($id=null) {
	global $pets;
  $id = $_SESSION['id'];
  $pets = filter('pets', "id_tutor =  $id");
}

function upload ($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo) {
  try {
      $nomearquivo = basename($arquivo_destino);
      $uploadOK = 1;
      if(isset($_POST["submit"])) {
          $check = getimagesize($nome_temp);
          if($check !== false) { 
              $_SESSION['message'] = "File is an image - " . $check["mime"] . ".";
              $_SESSION['type'] = "info";
              $uploadOK = 1;
          } else {
              $uploadOK = 0;
              throw new Exception("O arquivo não é uma imagem!");
          }
      } 
      
      // Check if file already exists
      if (file_exists($arquivo_destino)) {
        $uploadOK = 0;
        throw new Exception("Desculpe, o arquivo já existe!");
      }
      
      // Check file size
      if ($tamanho_arquivo > 5000000) {
        $uploadOK = 0;
        throw new Exception("Desculpe, mas o arquivo é muito grande");
      }
      
      // Allow certain file formats
      if($tipo_arquivo != "jpg" && $tipo_arquivo != "png" && $tipo_arquivo != "jpeg"
      && $tipo_arquivo != "gif" ) {
        $uploadOK = 0;
        throw new Exception("Desculpe, mas só são permitiods arquivo de imagem JPG, JPEG, PNG e GIF!");
      }
      // Check if $uploadOK is set to 0 by an error
      if ($uploadOK == 0) {
        throw new Exception("Desculpe, o arquivo não pode ser enviado!");
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $arquivo_destino)) {
          $_SESSION['message'] = "O arquivo ". htmlspecialchars($nomearquivo). " foi armazenado.";
          $_SESSION['type'] = "success";
        
        } else {
          throw new Exception("Desculpe, mas o arquivo não pode ser enviado.");
        }
      }
  } catch(Exception $e){
      $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
      $_SESSION['type'] = "danger";
  }
}

function add() {

  if (!empty($_POST['empresa'])) {
      try {
          $empresa = $_POST['empresa'];

          if (!empty($_FILES["foto"]["name"])){
            //Upload da foto
              $pasta_destino = "../petshops/imagens/";
              $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
              $nomearquivo = basename($_FILES["foto"]['name']);
              $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
              $tamanho_arquivo = $_FILES["foto"]["size"];
              $nome_temp = $_FILES["foto"]["tmp_name"];
              $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));

              upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

              $empresa['foto'] = $nomearquivo;
          }

          if (!empty($empresa['password'])){
              $senha = criptografia($empresa['password']);
              $empresa['password'] = $senha;
          }

          $empresa['foto'] = $nomearquivo;
          
          save('empresas', $empresa);
          $id = $_SESSION['id'];
          $cnpj = $empresa["cnpj"];
          $_SESSION['id_empresa'] = $cnpj;
          update_cnpj_usuario('usuarios', $id, $cnpj);
          $usuario_atualizado = find2("usuarios", $id);
          var_dump($usuario_atualizado);
         
          header('Location: index.php');
      } catch (Exception $e) {
          $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
          $_SESSION['type'] = "danger";
      }
  }
}
function addfuncionario() {

  if (!empty($_POST['usuario'])) {
      try {
          $usuario = $_POST['usuario'];

          if (!empty($_FILES["foto"]["name"])){
            //Upload da foto
              $pasta_destino = "fotos/";
              $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
              $nomearquivo = basename($_FILES["foto"]['name']);
              $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
              $tamanho_arquivo = $_FILES["foto"]["size"];
              $nome_temp = $_FILES["foto"]["tmp_name"];
              $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));

              upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

              $usuario['foto'] = $nomearquivo;
          }

          if (!empty($usuario['password'])){
              $senha = criptografia($usuario['password']);
              $usuario['password'] = $senha;
          }

          $usuario['foto'] = $nomearquivo;
          $_SESSION['message'] = "Você se cadastrou com sucesso agora faça o Login";
          $_SESSION['type'] = "success";
      
          if(isset($_SESSION['id_empresa'])){
            $usuario['fk_empresas_cnpj'] = $_SESSION['id_empresa'];
          }
          save('usuarios', $usuario);
          header('Location: '.BASEURL.'empresas/index.php');
      } catch (Exception $e) {
          $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
          $_SESSION['type'] = "danger";
      }
  }
}
function edit() {

//$today = new DateTime("now");
// $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
try {
      if (isset($_GET['id'])) {

        $id = $_GET['id'];

        if (isset($_POST['empresa'])) {

          $empresa = $_POST['empresa'];

        if (!empty($_FILES["foto"]["name"])){

          $pasta_destino = "imagens/";
          $arquivo_destino = $pasta_destino . basename($_FILES["foto"] ["name"]);
          $nomearquivo = basename($_FILES["foto"] ['name']);
          $resolucao_arquivo = getimagesize($_FILES["foto"] ["tmp_name"]);
          $tamanho_arquivo = $_FILES["foto"] ["size"];
          $nome_temp = $_FILES["foto"] ["tmp_name"];
          $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));
  
          upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);
  
          $empresa['foto'] = $nomearquivo;
        }

          update('empresas', $id, $empresa);
          header('location: index.php');
        } else {

          global $empresa;
          $empresa = find("empresas", $id);
        } 
      } else {
        header('location: index.php');
      }
    } catch (Exception $e) {
      $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
      $_SESSION['type'] = "danger";
    }
}

function view($id = null) {
  global $empresa;
  $empresa = find('empresas', $id);
}
function filtro($marca = null) {
  global $empresa;
  $empresa = find('empresas', $marca);
}

function delete($id = null) {

  global $empresas;
  $empresas = remove('empresas', $id);
  header('location: index.php');
}


	/*function clear_messages() {

		$_SESSION['type'] = "";
		$_SESSION['message'] = "";
	}*/
?>