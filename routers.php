<?php 
$homeController = require('src\controllers\homeController.php');
$loginController = require 'src\controllers\loginController.php';
$contatoController = require('src\controllers\contatoController.php');

$contatos = buscaContatos();


$errors = array();
$idContato = array();


//home routers
if(isset($_GET['indexHome'])) {
    $errors = indexHome();
}

// login routers
if(isset($_GET['loginIndex'])) {
    $errors = loginIndex();
}

if(isset($_POST['register'])) {
    $errors = register();
}

if(isset($_POST['login'])) {
    $errors = login();
}

if(isset($_GET['logout'])) {
    $errors = deslogar();
}

// contato routers
if(isset($_GET['contatoIndex'])) {
    $errors = contatoIndex();
}

if(isset($_POST['sendContato'])) {
    $errors = contatoRegister();
}

if(isset($_POST['buscaPorId'])) {  
    $id = $_POST['buscaPorId'];
    echo $id;

    echo 'aaaaa'; 
    $errors = contatoIndex();
    $idContato = buscaPorId($id);
    print_r($idContato);
    
}

?>