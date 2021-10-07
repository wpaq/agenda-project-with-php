<?php
require_once './src/controllers/connection.php';


    $contatos = $pdo->prepare("SELECT * FROM contatos");
    $contatos->execute();

    if(empty($contatos->rowCount())) {
        echo 'Nenhum contato encontrado';
    }
   


?>