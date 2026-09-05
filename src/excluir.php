<?php 

require_once 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location:index.php');
    exit;
}

$stmt = $pdo->prepare("DELETE FROM jogos WHERE id = :id");

$stmt->execute([
    ':id' => $id
]);

header('Location: index.php');

?>