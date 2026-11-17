<?php
session_start();
require_once __DIR__ . '/../config/conexao.php';

if (empty($_SESSION['usuario_id'])) {
    header('Location: ../login.php'); exit;
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../admin/gerenciar.php'); exit;
}

$acao = $_POST['acao'] ?? '';
$nome = trim($_POST['nome'] ?? '');
$descricao = trim($_POST['descricao'] ?? '');
$meta = filter_input(INPUT_POST, 'meta', FILTER_VALIDATE_FLOAT);

if ($acao === 'criar' && $nome !== '' && $meta !== false && $meta > 0) {
    $stmt = $pdo->prepare('INSERT INTO doacoes (nome, descricao, meta, criado_por) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nome, $descricao, $meta, $_SESSION['usuario_id']]);
} elseif ($acao === 'excluir' && !empty($_POST['id'])) {
    $stmt = $pdo->prepare('DELETE FROM doacoes WHERE id = ?');
    $stmt->execute([(int) $_POST['id']]);
}
header('Location: ../admin/gerenciar.php');
exit;
