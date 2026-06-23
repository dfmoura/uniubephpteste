<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <form method="post" action="index.php?p=login">
        email: <input type="text" name="email"><br>
        senha: <input type="password" name="senha"><br>
        <button type="submit">Entrar</button>
    </form>

    <p>Nao tem conta? <a href="index.php?p=cadastro">Cadastre-se</a></p>
</body>
</html>
