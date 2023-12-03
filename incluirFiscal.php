<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "prova";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Conexão falhou, avise o administrador do sistema']));
}

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$sala_de_prova = $_POST['sala_de_prova'];

$queryCount = "SELECT COUNT(*) as total FROM fiscais WHERE sala_de_prova = '$sala_de_prova'";
$resultCount = $conn->query($queryCount);

if ($resultCount->num_rows > 0) {
    $row = $resultCount->fetch_assoc();
    $totalFiscais = $row['total'];

    if ($totalFiscais < 2) {
        $queryInsert = "INSERT INTO fiscais (nome, cpf, email, sala_de_prova) VALUES ('$nome', '$cpf', '$email', '$sala_de_prova')";
        $resultInsert = $conn->query($queryInsert);

        if ($resultInsert) {
            echo json_encode(['status' => 'success', 'message' => 'Fiscal incluído com sucesso']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao incluir fiscal']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Limite de fiscais atingido para esta sala']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Erro ao verificar a contagem de fiscais']);
}

$conn->close();
?>
