<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "prova";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou, avise o administrador do sistema");
}

$salaSelecionada = isset($_GET['sala']) ? $_GET['sala'] : null;

$query = "SELECT * FROM candidatos WHERE sala_de_prova = " . $salaSelecionada . " ORDER BY nome";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(array());
}

$conn->close();
?>
