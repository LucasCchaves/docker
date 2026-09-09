<?php

require_once 'db.php';

$id = $_GET['id'] ?? null;

if(!$id){
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM jogos WHERE id = :id");
$stmt->execute([':id' => $id]);

$jogo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$jogo) {
    die('Jogo não encontrado.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $genero = $_POST['genero'];
    $ano_lancamento = $_POST['ano_lancamento'];

    $sql = "UPDATE jogos
            SET nome = :nome,
                genero = :genero,
                ano_lancamento = :ano_lancamento
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nome' => $nome,
        ':genero' => $genero,
        ':ano_lancamento' => $ano_lancamento,
        ':id' => $id
    ]);

    header('Location: index.php');
    exit;
}

$pageTitle = 'Editar Jogo';
require_once 'partials/bmo_header.php';
?>

    <form method="post" class="space-y-4">

        <div>
            <label for="nome" class="block mb-1 text-sm">Nome:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                value="<?= htmlspecialchars($jogo['nome']) ?>"
                required
                class="w-full bg-[#0b3d34] border-2 border-[#2f6e5f] rounded-lg px-3 py-2 text-[#d6fff0] focus:outline-none focus:border-[#7be0b8]"
            >
        </div>

        <div>
            <label for="genero" class="block mb-1 text-sm">Gênero:</label>
            <input
                type="text"
                id="genero"
                name="genero"
                value="<?= htmlspecialchars($jogo['genero']) ?>"
                required
                class="w-full bg-[#0b3d34] border-2 border-[#2f6e5f] rounded-lg px-3 py-2 text-[#d6fff0] focus:outline-none focus:border-[#7be0b8]"
            >
        </div>

        <div>
            <label for="ano_lancamento" class="block mb-1 text-sm">Ano de lançamento:</label>
            <input
                type="number"
                id="ano_lancamento"
                name="ano_lancamento"
                value="<?= $jogo['ano_lancamento'] ?>"
                required
                class="w-full bg-[#0b3d34] border-2 border-[#2f6e5f] rounded-lg px-3 py-2 text-[#d6fff0] focus:outline-none focus:border-[#7be0b8]"
            >
        </div>

        <button type="submit" class="pixel-font text-[10px] sm:text-xs bg-[#7be0b8] text-[#0b3d34] px-4 py-3 rounded-lg border-2 border-black hover:bg-[#5fd1a3] transition">
            Salvar alterações
        </button>

    </form>

    <a href="index.php" class="block mt-6 text-[#7be0b8] hover:underline">&larr; Voltar para a lista</a>

<?php require_once 'partials/bmo_footer.php'; ?>
