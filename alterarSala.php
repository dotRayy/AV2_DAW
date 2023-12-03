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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idCandidato'])) {
        $idCandidato = $_POST['idCandidato'];

        $queryBuscar = "SELECT * FROM candidatos WHERE id = $idCandidato";
        $resultBuscar = $conn->query($queryBuscar);

            $candidato = $resultBuscar->fetch_assoc();

            if ($candidato['sala_de_prova'] >= 50) {
                echo json_encode(['status' => 'success', 'candidato' => $candidato, 'limiteExcedido' => true]);
            } else {
                echo json_encode(['status' => 'success', 'candidato' => $candidato, 'limiteExcedido' => false]);
            }
    } elseif (isset($_POST['idCandidatoAlterarSala']) && isset($_POST['novaSala'])) {
        $idCandidato = $_POST['idCandidatoAlterarSala'];
        $novaSala = $_POST['novaSala'];

        if ($novaSala >= 50) {
            echo json_encode(['status' => 'error', 'message' => 'A nova sala atingiu o limite máximo de 50 candidatos.']);
        } else {
            $queryAlterarSala = "UPDATE candidatos SET sala_de_prova = $novaSala WHERE id = $idCandidato";
            $resultAlterarSala = $conn->query($queryAlterarSala);

            if ($resultAlterarSala) {
                echo json_encode(['status' => 'success', 'message' => 'Sala do candidato alterada com sucesso']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Erro ao alterar sala do candidato']);
            }
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Parâmetros inválidos']);
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['candidatoId'])) {
        $candidatoId = $_GET['candidatoId'];

        $queryBuscar = "SELECT * FROM candidatos WHERE id = $candidatoId";
        $resultBuscar = $conn->query($queryBuscar);

        $candidato = $resultBuscar->fetch_assoc();

        if ($candidato) {
            echo json_encode(['status' => 'success', 'candidato' => $candidato, 'limiteExcedido' => false]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Candidato não encontrado']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Parâmetros inválidos']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método não permitido']);
}

$conn->close();
?>
