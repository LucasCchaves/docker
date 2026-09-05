<?php 

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$nome = $_POST['nome'];
$genero = $_POST['genero'];
$ano_lancamento = $_POST['ano_lancamento'];

$sql = "INSERT INTO jogos (nome, genero, ano_lancamento) VALUES (:nome, :genero, :ano_lancamento)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':nome' => $nome,
    ':genero' => $genero,
    ':ano_lancamento' => $ano_lancamento
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
    <title>Cadastrar Jogo</title>
</head>
<body>
    
    <h1>Cadastrar Jogo</h1>

    <form method="POST">

        <label for="nome">Nome:</label>
        <br>
        <input type="text" id="nome" name="nome" required>

        <br><br>

        <label for="genero">Gênero:</label>
        <br>
        <input type="text" id="genero" name="genero" required>

        <br><br>

        <label for="ano_lancamento">Ano de lançamento:</label>
        <br>
        <input 
            type="number"
            id="ano_lancamento"
            name="ano_lancamento"
            min="1900"
            max="2100"
            required
        >

        <br><br>

        <button type="submit">Cadastrar</button>

    </form>

    <br>

    <a href="index.php">Voltar para a lista</a>

</body>
</html>