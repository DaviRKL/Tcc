<?php

require_once('../config.php');
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
function processa($id_empresa = null){
  if (!empty($_POST['estrela'])) {
      $id_empresa = $_GET['cnpj'];
      $id_usuario = $_SESSION['id'];
      
      // Receber os dados do formulário
      $estrela = filter_input(INPUT_POST, 'estrela', FILTER_DEFAULT);
      $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT);

      // Criar a conexão com o banco de dados usando MySQLi
      $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Verificar a conexão
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }
      $created = date("Y-m-d H:i:s");

      // Criar a QUERY para cadastrar no banco de dados
      $query_avaliacao = "INSERT INTO avaliacoes (qtd_estrela, mensagem, created, id_empresa, id_usuario) VALUES ('$estrela', '$mensagem', '$created', '$id_empresa', '$id_usuario')";
      
      // Executar a declaração
      $result = $conn->query($query_avaliacao);
      
      // Verificar se a execução foi bem-sucedida
      if ($result) {
          // Criar a mensagem de sucesso
          $_SESSION['msg'] = "<p style='color: green;'>Avaliação cadastrada com sucesso.</p>";
      } else {
          // Criar a mensagem de erro
          $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Avaliação não cadastrada.</p>";
      }

  
      // Redirecionar o usuário para a página inicial
      header("Location:" . BASEURL);
  } 
}
function calcularMedia($conn,  $host, $usuario, $senha, $banco, $tabela, $coluna, $cnpj) {
  // Conectar ao banco de dados


  // Verificar a conexão
  if (!$conn) {
      die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
  }

  // Consulta SQL para selecionar os dados da coluna
  $consulta = "SELECT qtd_estrela FROM avaliacoes WHERE id_empresa = '$cnpj'";

  // Executar a consulta
  $resultado = mysqli_query($conn, $consulta);

  if (!$resultado) {
      die("Erro na consulta: " . mysqli_error($conn));
  }

  // Inicializar variáveis para calcular a média
  $soma = 0;
  $contador = 0;

  // Loop através dos resultados e somar os valores
  while ($linha = mysqli_fetch_assoc($resultado)) {
      $soma += $linha['qtd_estrela'];
      $contador++;
  }

  // Calcular a média
  if ($contador > 0) {
      $media = $soma / $contador;
  } else {
      $media = 0; // Evita divisão por zero
  }
  $mediaInteiro = intval($media);
  // Fechar a conexão com o banco de dados
  mysqli_close($conn);

  return $mediaInteiro;
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
  $empresa = find1('empresas',$cnpj);
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