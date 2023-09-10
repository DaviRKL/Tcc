<?php

require_once('../config.php');
require_once('../inc/header.php');
require_once(DBAPI);


$empresas = null;
$empresa = null;

/**
 *  Listagem de Clientes
 */
function index() {
	global $empresas;
  $empresas = find_all('empresas');
}


// function get_pet_name($id_pet=null) {
// $id_pet = "" ;
//   global $nome_pet;
  
// $nome_pet = filter('pets', "id_tutor = $id_pet ");
// }

function upload ($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo) {
  try {
      $nomearquivo = basename($arquivo_destino);
      $uploadOK = 1;

      if(isset($_POST["submit"])) {
          $check = getimagesize($nome_temp);
          if(!$check) { 
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
              $pasta_destino = "imagens/";
              $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
              $nomearquivo = basename($_FILES["foto"]['name']);
              $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
              $tamanho_arquivo = $_FILES["foto"]["size"];
              $nome_temp = $_FILES["foto"]["tmp_name"];
              $tipo_arquivo = strtolower(pathinfo($arquivo_destino, PATHINFO_EXTENSION));

              upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

              $empresa['foto'] = $nomearquivo;
          }
                
            
           
          $empresa['foto'] = $nomearquivo;
         
          save('empresas', $empresa);
          header('Location: index.php');
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

function view($cnpj = null) {
  global $empresa;
  $empresa = find1('empresas', $cnpj);
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