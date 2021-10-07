<?php

require_once '/projeto_agenda_php/src/models/ConnectionModel.php';
include 'errors.php';

//Verifica se o usuário está logado
if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true)){
  unset($_SESSION['email']);
  unset($_SESSION['senha']);
  header('Location: ./index.php');
}

if(isset($_POST['sendContato'])){
    $nome =  $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    //Verifica se email já existe no BD
    if(empty($nome)) {
        errors($arr, 'Insira o nome');       
        die();
    }
    
    if(empty($arr)) {
        $stmt = $pdo->prepare('INSERT INTO contatos (nome, sobrenome, email, telefone) VALUES (:nome, :sobrenome, :email, :telefone);');
        $stmt->execute(array(
            ':nome' => $nome,
            ':sobrenome' => $sobrenome,
            ':email' => $email,
            ':telefone' => $telefone
        ));
        header("Location: ../../index.php");
    }
}

?>