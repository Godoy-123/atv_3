<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "estoque");

if ($conn->connect_error) {
    echo json_encode(["erro" => "Falha na conexão com o banco de dados."]);
    exit;
}

$nome = $_POST['nome'] ?? '';
$matricula = $_POST['matricula'] ?? '';
$funcao = $_POST['funcao'] ?? '';

if ($nome && $matricula && $funcao) {
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, matricula, funcao) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $matricula, $funcao);

    if ($stmt->execute()) {
        echo json_encode(["sucesso" => true, "mensagem" => "Usuário cadastrado com sucesso!"]);
    } else {
        echo json_encode(["erro" => "Erro ao inserir usuário."]);
    }
    $stmt->close();
} else {
    echo json_encode(["erro" => "Todos os campos são obrigatórios."]);
}

$id = $_POST['id'] ?? '';
$nome = $_POST['nome'] ?? '';
$matricula = $_POST['matricula'] ?? '';
$funcao = $_POST['funcao'] ?? '';

if ($id && $nome && $matricula && $funcao) {
    $stmt = $conn->prepare("INSERT INTO usuarios (id, nome, matricula, funcao) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id, $nome, $matricula, $funcao);

    if ($stmt->execute()) {
        echo json_encode(["sucesso" => true, "mensagem" => "Usuário cadastrado com sucesso!"]);
    } else {
        echo json_encode(["erro" => "Erro ao inserir usuário. Verifique se o ID já existe."]);
    }
    $stmt->close();
} else {
    echo json_encode(["erro" => "Todos os campos são obrigatórios."]);
}

$conn->close();
?>1
