<?php
session_start();
if (empty($_SESSION['usuario_id'])) { header('Location: ../login.php'); exit; }
require_once __DIR__ . '/../config/conexao.php';
$titulo = 'Gerenciar campanhas';
$doacoes = $pdo->query('SELECT id, nome, descricao, meta FROM doacoes ORDER BY id DESC')->fetchAll();
require '../includes/header.php';
?>
<h1>Gerenciar campanhas</h1>
<form class="cartao formulario" action="../actions/crud_doacoes.php" method="post">
    <input type="hidden" name="acao" value="criar">
    <label>Nome da campanha</label><input name="nome" required maxlength="120">
    <label>Descrição</label><textarea name="descricao" rows="3"></textarea>
    <label>Meta (R$)</label><input type="number" name="meta" min="0.01" step="0.01" required>
    <button class="botao">Cadastrar campanha</button>
</form>
<h2>Campanhas existentes</h2>
<?php foreach ($doacoes as $item): ?>
<article class="cartao">
    <h3><?= htmlspecialchars($item['nome']) ?></h3>
    <p><?= nl2br(htmlspecialchars($item['descricao'])) ?></p>
    <p>Meta: R$ <?= number_format((float)$item['meta'], 2, ',', '.') ?></p>
    <form action="../actions/crud_doacoes.php" method="post" onsubmit="return confirm('Excluir esta campanha?')">
        <input type="hidden" name="acao" value="excluir">
        <input type="hidden" name="id" value="<?= (int)$item['id'] ?>">
        <button class="botao perigo">Excluir</button>
    </form>
</article>
<?php endforeach; ?>
<?php require '../includes/footer.php'; ?>
