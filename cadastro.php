<?php
require_once __DIR__ . '/config/conexao.php';
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'] ?? '';
    if ($nome === '' || !$email || strlen($senha) < 8) {
        $erro = 'Preencha os campos corretamente. A senha deve ter pelo menos 8 caracteres.';
    } else {
        try {
            $stmt = $pdo->prepare('INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)');
            $stmt->execute([$nome, $email, password_hash($senha, PASSWORD_DEFAULT)]);
            header('Location: login.php?cadastrado=1'); exit;
        } catch (PDOException $e) {
            $erro = 'Não foi possível criar a conta. Verifique se o e-mail já está cadastrado.';
        }
    }
}
$titulo = 'Cadastro';
require 'includes/header.php';
?>
<h1>Criar conta</h1>
<?php if ($erro): ?><p class="erro"><?= htmlspecialchars($erro) ?></p><?php endif; ?>
<form class="cartao formulario" method="post">
    <label>Nome</label><input name="nome" required maxlength="100">
    <label>E-mail</label><input type="email" name="email" required>
    <label>Senha (mínimo 8 caracteres)</label><input type="password" name="senha" minlength="8" required>
    <button class="botao">Cadastrar</button>
</form>
<?php require 'includes/footer.php'; ?>
