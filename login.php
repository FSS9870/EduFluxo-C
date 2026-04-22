<?php

require "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $senha_digitada = $_POST['senha'];


    $stmt = $conn->prepare('SELECT cargo, senha FROM usuarios WHERE nome = ?');
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $getUsuario = $stmt->get_result();

    if ($usuario = $getUsuario->fetch_assoc()) {
        if (password_verify($senha_digitada, $usuario['senha'])) {
            $cargo = $usuario['cargo'];
            header('Location: inicio.html?cargo=' . urlencode($cargo));
            exit();
        } else {
            echo('Senha incorreta!');
        }
    } else {
        echo('Usuário não encontrado!');
    }
    $stmt->close();
}
$conn->close();
?>