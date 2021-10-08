<?php 
$homeController = require('src\controllers\homeController.php');
$loginController = require 'src\controllers\loginController.php';
$contatoController = require('src\controllers\contatoController.php');


//home routers
if(isset($_GET['indexHome'])) {
    indexHome();
}

// login routers
if(isset($_GET['loginIndex'])) {
    loginIndex();
}

if(isset($_POST['register'])) {
    register();
}

if(isset($_POST['login'])) {
    login();
}

if(isset($_GET['logout'])) {
    deslogar();
}

// contato routers
if(isset($_GET['contatoIndex'])) {
    contatoIndex();
}

if(isset($_POST['sendContato'])) {
    contatoRegister();
}


?>