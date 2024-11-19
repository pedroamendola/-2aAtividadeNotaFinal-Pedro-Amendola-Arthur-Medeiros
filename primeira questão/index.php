<?php

$query = "SELECT * FROM tarefas ORDER BY concluida ASC, data_vencimento ASC";
$tarefas = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>

    
    <form action="add_tarefa.php" method="POST">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" placeholder="Digite a descrição" required>
        <label for="data_vencimento">Data de Vencimento:</label>
        <input type="date" name="data_vencimento" id="data_vencimento" required>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Tarefas Pendentes</h2>
    <ul>
        <?php
 
        foreach ($tarefas as $tarefa):
            if ($tarefa['concluida'] == 0): 
        ?>
            <li>
                <?= htmlspecialchars($tarefa['descricao']) ?> - <?= htmlspecialchars($tarefa['data_vencimento']) ?>
                <form action="update_tarefa.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                    <button type="submit">Concluir</button>
                </form>
             
                <form action="delete_tarefa.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                    <button type="submit">Excluir</button>
                </form>
            </li>
        <?php
            endif;
        endforeach;
        ?>
    </ul>

    <h2>Tarefas Concluídas</h2>
    <ul>
        <?php
    
        foreach ($tarefas as $tarefa):
            if ($tarefa['concluida'] == 1): 
        ?>
            <li>
                <?= htmlspecialchars($tarefa['descricao']) ?> - <?= htmlspecialchars($tarefa['data_vencimento']) ?>
            
                <form action="delete_tarefa.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
                    <button type="submit">Excluir</button>
                </form>
            </li>
        <?php
            endif;
        endforeach;
        ?>
    </ul>
</body>
</html>