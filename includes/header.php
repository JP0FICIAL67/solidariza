<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$titulo = $titulo ?? 'Solidariza';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titulo) ?> | Solidariza</title>
    <link rel="stylesheet" href="/solidariza/assets/css/style.css">
</head>
<body>
<header class="topo">
    <a class="marca" href="/solidariza/index.php">Solidariza</a>
    <nav>
        <a href="/solidariza/index.php">Início</a>
        <?php if (!empty($_SESSION['usuario_id'])): ?>
            <a href="/solidariza/admin/dashboard.php">Painel</a>
            <a href="/solidariza/actions/auth_logout.php">Sair</a>
        <?php else: ?>
            <a href="/solidariza/login.php">Entrar</a>
            <a href="/solidariza/cadastro.php">Cadastrar</a>
        <?php endif; ?>
    </nav>
</header>
<main class="container">
