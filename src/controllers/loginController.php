<?php

require_once 'F:\Programs\xampp\htdocs\projeto_agenda_php\src\models\LoginModel.php';

function loginIndex() {
    header('Location: \projeto_agenda_php\src\views\login.php');
}

function login() {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $login = new Login($email, $senha);
        $login->login();
    
        if(count($login->errors) > 0) {
            print_r($login->errors);
            return;
        }
    
        //echo 'Usuário Logado com sucesso';
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;

    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function register() {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $loginRegister = new Login($email, $senha);
        $loginRegister->register();
    
        if(count($loginRegister->errors) > 0) {
            print_r($loginRegister->errors);
            return;
        }
    
        //echo 'Usuário Cadastrado com sucesso';
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;

    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function deslogar() {
    if((isset ($_SESSION['email']) == true) and (isset ($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ./index.php');
    } else {
        header('Location: ./index.php');
    }
}

?>