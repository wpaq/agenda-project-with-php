<?php

require_once 'F:\Programs\xampp\htdocs\projeto_agenda_php\src\models\ContatoModel.php';

function contatoIndex() {
    $errors = array();
    if(isset($_SESSION['email'])) {
        header('Location: \projeto_agenda_php\src\views\contato.php');
    } else {
        array_push($errors,'Usuário precisa estar logado');
        return $errors;
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
            return $contato->errors;
        }

    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function buscaContatos() {
    try {
        $contato = new Contato('','', '', '');
        $dados = $contato->buscaContatos();        
    
        if(count($contato->errors) > 0) {
            return $contato->errors;
        }
        return $dados;

    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function buscaPorId($id) {
    try {
        $contato = new Contato('','', '', '');
        $dados = $contato->buscaPorId($id);        
    
        if(count($contato->errors) > 0) {
            return $contato->errors;
        }
        foreach($dados as $contatos) {
            $nome = $contatos['nome'];
            $sobrenome = $contatos['sobrenome'];
        }
        echo $nome;
        print_r($dados);
        return $dados;

    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>