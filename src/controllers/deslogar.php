<?php

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