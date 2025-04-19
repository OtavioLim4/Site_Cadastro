<?php
session_start();
include('banco.php');

if (!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit();
}

// Adicionar
if (isset($_POST['add'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    $conn->query("INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')");
}

// Excluir
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM usuarios WHERE id=$id");
}

// Listar
$usuarios = $conn->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página Principal</title>
    <link rel="stylesheet" href="estilos/style2.css">
    
</head>
<body>
<div class="container">
    <a class="logout" href="logout.php">Sair</a>
    <h2>Gerenciar Usuários</h2>

    <form method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit" name="add">Adicionar</button>
    </form>

    <h3>Lista de Usuários</h3>
    <table>
        <tr>
            <th>ID</th><th>Nome</th><th>Email</th><th>Ação</th>
        </tr>
        <?php while ($u = $usuarios->fetch_assoc()) { ?>
            <tr>
                <td><?= $u['id'] ?></td>
                <td><?= $u['nome'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><a href="?delete=<?= $u['id'] ?>" onclick="return confirm('Excluir esse usuário?')">Excluir</a></td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
