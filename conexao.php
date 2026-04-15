<?php

$servidor = "localhost";
$usuario = "root";
$port = "3306";
$senha = "";
$banco = "edufluxo_banco";


$conn = new mysqli($servidor, $usuario, $senha, $banco, $port);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($servidor, $usuario, $senha, $banco, $port);
    $conn->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("Erro crítico na conexão com o banco: " . $e->getMessage());
}
?>