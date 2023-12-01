<?php
require('../config.php');
require_once('../conexao.php');


$data = $_POST['data'];
$empresaId = $_POST['empresaId'];

// Consulta para obter todos os horários disponíveis no intervalo de meia hora das 9:00 às 18:00
$horariosDisponiveis = array();
$horarioAtual = strtotime('09:00');
$intervalo = 30 * 60; // Intervalo de 30 minutos em segundos

while ($horarioAtual <= strtotime('18:00')) {
    $horariosDisponiveis[] = date('H:i:s', $horarioAtual); // Adicionamos os segundos para corresponder ao formato do banco
    $horarioAtual += $intervalo;
}

// Obtém os horários já agendados na data e empresa específicas
$sqlAgendados = "SELECT horario FROM agendamentos WHERE data = '$data' AND id_empresa = '$empresaId'";
$resultAgendados = $conn->query($sqlAgendados);

$response = array();

if ($resultAgendados) {
    $agendados = array();
    while ($row = $resultAgendados->fetch_assoc()) {
        $agendados[] = $row['horario'];
    }

    // Remove os horários já agendados do array de horários disponíveis
    $horariosDisponiveis = array_diff($horariosDisponiveis, $agendados);

    $response['success'] = true;
    $response['horarios'] = array_values($horariosDisponiveis); // Reindexa o array para evitar problemas no lado do JavaScript
} else {
    $response['success'] = false;
    $response['message'] = 'Erro na consulta ao banco de dados.';
}

echo json_encode($response);
?>
