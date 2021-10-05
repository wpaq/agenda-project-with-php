<?php

require_once 'connection.php';
include 'LoginModel.php';

if(isset($_POST['cadastro'])){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $password = password_hash($senha, PASSWORD_DEFAULT);

    $verify = $pdo->prepare('SELECT email from users WHERE :email = email');
    $verify->execute(array(
        ':email' => $email
    ));

    //Verifica se email já existe no BD
    if($verify->rowCount() > 0) {
        errors($arr, 'Usuário Já existe');       
        die();
    } else if(empty($email) or empty($senha)){
        errors($arr, 'Informe o email e senha'); 
        die();
    }
    
    if(empty($arr)) {
        $stmt = $pdo->prepare('INSERT INTO users (email, senha) VALUES( :email, :senha)');
        $stmt->execute(array(
            ':email' => $email,
            ':senha' => $password
        ));
    }
}

?>