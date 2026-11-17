<?php $titulo = 'Entrar'; require 'includes/header.php'; ?>
<h1>Entrar</h1>
<?php if (isset($_GET['erro'])): ?><p class="erro">E-mail ou senha inválidos.</p><?php endif; ?>
<form class="cartao formulario" action="actions/auth_login.php" method="post">
    <label>E-mail</label><input type="email" name="email" required>
    <label>Senha</label><input type="password" name="senha" required>
    <button class="botao">Entrar</button>
    <p>Ainda não tem conta? <a href="cadastro.php">Cadastre-se</a>.</p>
</form>
<?php require 'includes/footer.php'; ?>
