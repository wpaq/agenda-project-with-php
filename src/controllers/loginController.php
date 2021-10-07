<?php

require_once '../models/ConnectionModel.php';
require_once '../models/LoginModel.php';

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        $login = new Login();
        $login->login($email, $senha);
    
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

if(isset($_GET['logout'])) {
    deslogar();    
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