<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo $tarefa ? 'Editar' : 'Nova'; ?> Tarefa</title>
</head>
<body>
    <h2><?php echo $tarefa ? 'Editar' : 'Nova'; ?> Tarefa</h2>

    <form method="post" action="index.php?p=salvar_tarefa">
        <?php if($tarefa): ?>
            <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
        <?php endif; ?>

        titulo: <input type="text" name="titulo" value="<?php echo $tarefa['titulo'] ?? ''; ?>"><br>
        descricao: <textarea name="descricao"><?php echo $tarefa['descricao'] ?? ''; ?></textarea><br>
        status:
        <select name="status">
            <option value="pendente" <?php if(($tarefa['status'] ?? '') == 'pendente') echo 'selected'; ?>>pendente</option>
            <option value="concluida" <?php if(($tarefa['status'] ?? '') == 'concluida') echo 'selected'; ?>>concluida</option>
        </select><br>

        <button type="submit">Salvar</button>
    </form>

    <br>
    <a href="index.php?p=dashboard">Voltar</a>
</body>
</html>
