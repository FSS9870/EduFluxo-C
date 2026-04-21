<?php
require "conexao.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    date_default_timezone_set('America/Sao_Paulo');
    
    $ID_aluno = $_POST['ID_aluno'];
    $ID_usuario = $_POST['ID_usuario'];
    $motivo = $_POST['motivo'];
    $tipo = $_POST['tipo_registro'] ?? '';

    // Definimos a tabela com base no tipo vindo do formulário
    if ($tipo == 'professor') {
        $tabela = 'ocorrencias';
    } else if ($tipo == 'portaria') {
        $tabela = 'fluxo_saida';
    } else {
        die("Erro: O tipo de registro não foi identificado. Verifique o JavaScript.");
    }

    $stmt = $conn->prepare("INSERT INTO $tabela (ID_aluno, ID_usuario, motivo, horario) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $ID_aluno, $ID_usuario, $motivo);

    if ($stmt->execute()) {
        echo "Registro em $tabela realizado com sucesso!";
        header('Location: inicio.html?cargo=' . urlencode($tipo));
    } else {
        echo "Erro no registro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>