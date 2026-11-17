<?php
require_once __DIR__ . '/config/conexao.php';
$titulo = 'Início';
$campanhas = $pdo->query('SELECT nome, descricao, meta FROM doacoes ORDER BY id DESC')->fetchAll();
require 'includes/header.php';
?>
<section class="destaque">
    <p class="sobretitulo">SOLIDARIEDADE QUE TRANSFORMA</p>
    <h1>Faça parte de uma mudança positiva.</h1>
    <p>Conheça campanhas e acompanhe iniciativas que ajudam pessoas e comunidades.</p>
    <a class="botao" href="cadastro.php">Quero participar</a>
</section>
<h2>Campanhas</h2>
<div class="grade">
<?php foreach ($campanhas as $campanha): ?>
    <article class="cartao">
        <h3><?= htmlspecialchars($campanha['nome']) ?></h3>
        <p><?= nl2br(htmlspecialchars($campanha['descricao'])) ?></p>
        <strong>Meta: R$ <?= number_format((float)$campanha['meta'], 2, ',', '.') ?></strong>
    </article>
<?php endforeach; ?>
<?php if (!$campanhas): ?><p>Nenhuma campanha cadastrada ainda.</p><?php endif; ?>
</div>
<?php require 'includes/footer.php'; ?>
