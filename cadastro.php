<?php
require "conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha_digitada = $_POST['senha'];
    $cargo = $_POST['cargo'];

    $senhas_permitidas = [
            'professor' => '123',
            'portaria' => '456'
        ];
    if (isset($senhas_permitidas[$cargo]) && $senha_digitada === $senhas_permitidas[$cargo]) {
            
            $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha, cargo) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $nome, $email, $senha_digitada, $cargo);

            if ($stmt->execute()) {
                echo "Cadastro de $cargo realizado com sucesso!";
            } else {
                echo "Erro no banco: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Senha incorreta para o cargo de $cargo!";
        }
    }
    $conn->close();
    ?>