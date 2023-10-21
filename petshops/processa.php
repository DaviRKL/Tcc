<?php
require_once('../config.php');
function processa($id_empresa= null){
    if (!empty($_POST['estrela'])) {
        $id_empresa = $_GET['cnpj'];
       
    // Receber os dados do formulário
    $estrela = filter_input(INPUT_POST, 'estrela', FILTER_DEFAULT);
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_DEFAULT);

    // Criar a QUERY cadastrar no banco de dados
    $query_avaliacao = "INSERT INTO avaliacoes (qtd_estrela, mensagem, created, id_empresa) VALUES (:qtd_estrela, :mensagem, :created, :id_empresa)";
    
    $conn = new PDO("mysql:host=".DB_HOST .";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $cad_avaliacao = $conn->prepare($query_avaliacao);
    $created = date("Y-m-d H:i:s");
    
    
    // Substituir os links pelo valor
    $cad_avaliacao->bindParam(':qtd_estrela', $estrela, PDO::PARAM_INT);
    $cad_avaliacao->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
    $cad_avaliacao->bindParam(':created', $created, PDO::PARAM_STR);
    $cad_avaliacao->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT);
    
    
    // Acessa o IF quando cadastrar corretamente
    if ($cad_avaliacao->execute()) {

        // Criar a mensagem de erro
        $_SESSION['msg'] = "<p style='color: green;'>Avaliação cadastrar com sucesso.</p>";

        // Redirecionar o usuário para a página inicial
       
        header("Location: view.php?cnpj=$id_empresa");
    } else {

        // Criar a mensagem de erro
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Avaliação não cadastrar.</p>";

        // Redirecionar o usuário para a página inicial
        header("Location: index.php");
    }
} 
}
    