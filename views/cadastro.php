<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>
    <h2>Cadastro</h2>

    <form method="post" action="index.php?p=cadastrar">
        nome: <input type="text" name="nome"><br>
        email: <input type="text" name="email"><br>
        senha: <input type="password" name="senha"><br>
        <button type="submit">Cadastrar</button>
    </form>

    <p>Ja tem conta? <a href="index.php?p=login">Fazer login</a></p>
</body>
</html>
