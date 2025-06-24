<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "estoque");

if ($conn->connect_error) {
    echo json_encode([]);
    exit;
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

$usuarios = [];
while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

echo json_encode($usuarios);
$conn->close();
?>
