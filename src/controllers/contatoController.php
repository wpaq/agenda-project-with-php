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

function contatoUpdate() {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $id = $_GET['buscaPorId'];

    try {
        $contato = new Contato($nome, $sobrenome, $email, $telefone);
        $contato->update($id);
    
        if(count($contato->errors) > 0) {
            return $contato->errors;
        } else {
            return $contato->sucess;
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

function buscaPorId() {
    $id = $_GET['buscaPorId'];

    try {
        $contato = new Contato('','', '', '');
        $dados = $contato->buscaPorId($id);        
    
        if(count($contato->errors) > 0) {
            return $contato->errors;
        }
        return $dados;

    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function deleteContato() {
    $id = $_GET['deleteContato'];

    try {
        $contato = new Contato('', '', '', '');
        $contato->delete($id);
    
        if(count($contato->errors) > 0) {
            return $contato->errors;
        } else {
            return $contato->sucess;
        }
    } catch(Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

?>