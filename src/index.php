<?php

require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM jogos ORDER BY id ASC");
$jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Jogos</title>
</head>
<body>
    
    <h1>Lista de Jogos</h1>

    <a href="criar.php">Cadastrar novo jogo</a>

    <br><br>

    <?php if (count($jogos) > 0):?>

        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Gênero</th>
                    <th>Ano de lançamento</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($jogos as $jogo): ?>

                    <tr>
                        <td><?= $jogo['id'] ?></td>
                        <td><?= htmlspecialchars($jogo['nome']) ?></td>
                        <td><?= htmlspecialchars($jogo['genero']) ?></td>
                        <td><?= $jogo['ano_lancamento'] ?></td>
                        <td>
                            <a href="editar.php?id=<?= $jogo['id'] ?>">Editar</a>
                            <a 
                                href="excluir.php?id=<?= $jogo['id'] ?>"
                                onclick="return confirm('Tem certeza que deseja excuir este jogo?')"
                            >
                                Excluir
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>

    <?php else: ?>

        <p>Nenhum jogo cadastrado.</p>

    <?php endif;?>

</body>
</html>