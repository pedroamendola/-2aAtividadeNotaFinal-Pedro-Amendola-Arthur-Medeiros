<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $descricao = trim($_POST['descricao']);
    $data_vencimento = $_POST['data_vencimento'];

    $stmt = $db->prepare("INSERT INTO tarefas (descricao, data_vencimento) VALUES (:descricao, :data_vencimento)");
    $stmt->execute([
        'descricao' => $descricao,
        'data_vencimento' => $data_vencimento
    ]);

    header('Location: index.php');
    exit;
}
?>