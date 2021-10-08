<?php

require_once 'F:\Programs\xampp\htdocs\projeto_agenda_php\src\models\ContatoModel.php';

function contatoIndex() {
    if(isset($_SESSION['email'])) {
        header('Location: \projeto_agenda_php\src\views\contato.php');
    }
}

function contatoRegister() {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    try {
        $contato = new Contato($nome, $sobrenome, $email, $telefone);
        $contato->register();
    
        if(count($contato->errors) > 0) {
            print_r($contato->errors);
            return;
        }

    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

buscaContatos();
function buscaContatos() {
    try {
        $contato = new Contato('','', '', '');
        $contato->buscaContatos();
    
        if(count($contato->errors) > 0) {
            print_r($contato->errors);
            return;
        }

        return $contato;

    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>