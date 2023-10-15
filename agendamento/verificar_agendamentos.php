<?php
require('../config.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// $data = $_POST['data'];
// $horario = $_POST['horario'];
// $sql = "SELECT * FROM agendamentos WHERE data = '$data' AND horario = '$horario'";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     echo "Esse horário está indisponível para agendamento na data selecionada.";
// } 
// $conn->close();

// Conecte ao banco de dados aqui

// Receba os parâmetros da data e horário enviados pela solicitação AJAX
$data = $_POST['data'];
$horario = $_POST['horario'];
$sql = "SELECT COUNT(*) AS total FROM agendamentos WHERE data = '$data' AND horario = '$horario'";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $totalAgendamentos = $row['total'];

    // Responda com JSON (true se existir um agendamento, false caso contrário)
    header('Content-Type: application/json');
    echo json_encode($totalAgendamentos > 0);
} else {
    // Lida com erros na consulta, se necessário
    echo "Erro na consulta: " . $conn->error;
}

// Feche a conexão com o banco de dados
$conn->close();
?>

