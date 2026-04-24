<?php

require "conexao.php";

$tipo = $_GET['tipo'] ?? '';
$tabela = ($tipo == 'professor') ? 'ocorrencias' : (($tipo == 'portaria') ? 'fluxo_saida' : '');

$sql = "SELECT ID_aluno, ID_usuario, motivo, horario FROM $tabela ORDER BY horario DESC";
$resultado = $conn->query($sql);

$registros = [];
if ($resultado) {
    while ($row = $resultado->fetch_assoc()) {
        $registros[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($registros);
$conn->close();
?>