<?php
// obter_dados.php
include 'conexao.php';

$response = array();

// Obter estados, cidades e bairros em uma única consulta
$query = "SELECT DISTINCT estado, cidade, bairro FROM empresas";
$result = $conn->query($query);

$estados = array();
$cidades = array();
$bairros = array();

while ($row = $result->fetch_assoc()) {
    $estado = $row['estado'];
    $cidade = $row['cidade'];
    $bairro = $row['bairro'];

    if (!in_array($estado, $estados)) {
        $estados[] = $estado;
    }

    if (!isset($cidades[$estado])) {
        $cidades[$estado] = array();
    }
    if (!in_array($cidade, $cidades[$estado])) {
        $cidades[$estado][] = $cidade;
    }
    
    if (!isset($bairros[$estado][$cidade])) {
        $bairros[$estado][$cidade] = array();
    }
    if (!in_array($bairro, $bairros[$estado][$cidade])) {
        $bairros[$estado][$cidade][] = $bairro;
    }
}

$response['estados'] = $estados;
$response['cidades'] = $cidades;
$response['bairros'] = $bairros;

header('Content-Type: application/json');
echo json_encode($response);
?>
