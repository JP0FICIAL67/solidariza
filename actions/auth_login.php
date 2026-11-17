<?php
session_start();
require_once __DIR__ . '/../config/conexao.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha = $_POST['senha'] ?? '';

if (!$email || $senha === '') {
    header('Location: ../login.php?erro=1'); exit;
}
$stmt = $pdo->prepare('SELECT id, nome, senha, tipo FROM usuarios WHERE email = ? LIMIT 1');
$stmt->execute([$email]);
$usuario = $stmt->fetch();

if (!$usuario || !password_verify($senha, $usuario['senha'])) {
    header('Location: ../login.php?erro=1'); exit;
}
session_regenerate_id(true);
$_SESSION['usuario_id'] = $usuario['id'];
$_SESSION['usuario_nome'] = $usuario['nome'];
$_SESSION['usuario_tipo'] = $usuario['tipo'];
header('Location: ../admin/dashboard.php');
exit;
