<?php 

require_once 'connection.php';

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

try {
    $stmt = $pdo->prepare('INSERT INTO users (nome, email, senha) VALUES(:nome, :email, :senha)');
    $stmt->execute(array(
        ':nome' => $nome,
        ':email' => $email,
        ':senha' => $senha
    ));

    echo $stmt->rowCount();
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}


?>