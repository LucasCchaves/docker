<?php

require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM jogos ORDER BY id ASC");
$jogos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Lista de Jogos';
require_once 'partials/bmo_header.php';
?>

    <a href="criar.php" class="inline-block pixel-font text-[10px] sm:text-xs bg-[#7be0b8] text-[#0b3d34] px-4 py-3 rounded-lg border-2 border-black hover:bg-[#5fd1a3] transition mb-6">
        + Cadastrar novo jogo
    </a>

    <?php if (count($jogos) > 0): ?>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b-2 border-[#2f6e5f]">
                        <th class="py-2 pr-3">ID</th>
                        <th class="py-2 pr-3">Nome</th>
                        <th class="py-2 pr-3">Gênero</th>
                        <th class="py-2 pr-3">Ano</th>
                        <th class="py-2 pr-3">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($jogos as $jogo): ?>

                        <tr class="border-b border-[#1f5346]">
                            <td class="py-2 pr-3"><?= $jogo['id'] ?></td>
                            <td class="py-2 pr-3"><?= htmlspecialchars($jogo['nome']) ?></td>
                            <td class="py-2 pr-3"><?= htmlspecialchars($jogo['genero']) ?></td>
                            <td class="py-2 pr-3"><?= $jogo['ano_lancamento'] ?></td>
                            <td class="py-2 pr-3 whitespace-nowrap">
                                <a href="editar.php?id=<?= $jogo['id'] ?>" class="text-[#7be0b8] hover:underline">Editar</a>
                                <a
                                    href="excluir.php?id=<?= $jogo['id'] ?>"
                                    onclick="return confirm('Tem certeza que deseja excuir este jogo?')"
                                    class="text-[#e0546a] hover:underline ml-3"
                                >
                                    Excluir
                                </a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php else: ?>

        <p class="text-center py-6">Nenhum jogo cadastrado.</p>

    <?php endif; ?>

<?php require_once 'partials/bmo_footer.php'; ?>
