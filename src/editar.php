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

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogo</title>
</head>
<body>
    
    <h1>Editar Jogo</h1>

    <form method="post">

        <label for="nome">Nome:</label>
        <br>
        <input 
            type="text" 
            id="nome"
            name="nome"
            value="<?= htmlspecialchars($jogo['nome']) ?>"
            required
        >

        <br><br>

        <label for="genero">Gênero:</label>
            <br>
            <input 
                type="text" 
                id="genero"
                name="genero"
                value="<?= htmlspecialchars($jogo['genero']) ?>"
                required
            >

        <br><br>

        <label for="ano_lancamento">Ano de lançamento:</label>
        <br>
        <input 
            type="number" 
            id="ano_lancamento"
            name="ano_lancamento"
            value="<?= $jogo['ano_lancamento'] ?>"
            min="1900"
            max="2100"
            required
        >

        <br><br>

        <button type="submit">Salvar alterações</button>

    </form>

    <br>

    <a href="index.php">Voltar para a lista</a>

</body>
</html>