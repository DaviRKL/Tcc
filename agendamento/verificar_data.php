<?php
 
define("DB_NAME", "tcc");

/** Usuário do banco de dados MySQL */
define("DB_USER", "root");

/** Senha do banco de dados MySQL */
define("DB_PASSWORD", "");

/** nome do host do MySQL */
define("DB_HOST", "localhost");
// Conecte-se ao seu banco de dados (substitua com suas próprias credenciais)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tcc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Receba a data e o horário da solicitação AJAX
$data = $_POST['data'];
$horario = $_POST['horario'];

// Consulta SQL para verificar se o horário já existe no banco de dados para a data especificada
$sql = "SELECT * FROM agendamentos WHERE data = '$data' AND horario = '$horario'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Esse horário está indisponível para agendamento na data selecionada.";
} else {
    echo "Esse horário está disponível para agendamento na data selecionada.";
}

$conn->close();

?>

