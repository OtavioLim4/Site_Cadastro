<?php
session_start();
include('banco.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $_SESSION['logado'] = true;
        header("Location: index.php");
        exit();
    } else {
        $erro = "Email ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="estilos/style1.css">
   
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <?php if (isset($erro)) echo "<p class='error'>$erro</p>"; ?>
    <form method="post">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>