<?php
// Inclua seu arquivo de configuração de banco de dados aqui
 
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
$dbname = "celke";

$con = new mysqli($host, $user, $password, $dbname);
if ($con->connect_error) {
    die("Erro na conexão: " . $con->connect_error);
}
$json = array();
$sqlQuery = "SELECT id,  title,  start, end FROM events";
$result = $con->query($sqlQuery);
$conn->prepare($sqlQuery);
$eventArray = array();
while ($row = $result->fetch_assoc()) {
    array_push($eventArray, $row);
}

$result->free_result();

// Fecha a conexão
$con->close();

echo json_encode($eventArray);
?>
