<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Minhas Tarefas</h2>
    <p>Ola, <?php echo $_SESSION['nome']; ?></p>

    <a href="index.php?p=nova_tarefa">+ Nova tarefa</a>
    <a href="index.php?p=sair">Sair</a>

    <hr>

    <?php if($tarefas->num_rows == 0): ?>
        <p>Nenhuma tarefa cadastrada.</p>
    <?php else: ?>
        <table border="1" cellpadding="5">
            <tr>
                <th>Titulo</th>
                <th>Descricao</th>
                <th>Status</th>
                <th>Acoes</th>
            </tr>
            <?php while($row = $tarefas->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['descricao']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <a href="index.php?p=editar_tarefa&id=<?php echo $row['id']; ?>">Editar</a>
                    <a href="index.php?p=excluir_tarefa&id=<?php echo $row['id']; ?>" onclick="return confirm('Excluir?')">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php endif; ?>
</body>
</html>
