<?php
session_start();
if (empty($_SESSION['usuario_id'])) { header('Location: ../login.php'); exit; }
$titulo = 'Painel';
require_once __DIR__ . '/../config/conexao.php';
$total = $pdo->query('SELECT COUNT(*) FROM doacoes')->fetchColumn();
require '../includes/header.php';
?>
<h1>Painel da ONG</h1>
<p>Olá, <?= htmlspecialchars($_SESSION['usuario_nome']) ?>.</p>
<section class="cartao">
    <h2>Campanhas cadastradas</h2>
    <p class="numero"><?= (int)$total ?></p>
    <a class="botao" href="gerenciar.php">Gerenciar campanhas</a>
</section>
<?php require '../includes/footer.php'; ?>
