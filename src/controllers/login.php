<?php

require_once 'connection.php';

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = $pdo->prepare("SELECT * FROM users WHERE email = ?");
  $sql->execute([$email]);

  if($sql->rowCount() == 1){
    $info = $sql->fetch();

    if(password_verify($senha, $info['senha'])){
        $_SESSION['email'] = $info['email']; 
        $_SESSION['senha'] = $info['senha'];

        header("Location: ../../index.php");
    }else {
        echo '<div class="box_erro_login"><p><i class="fas fa-exclamation-circle"></i> Usuário ou senha incorretos!</p></div>';
    }
  }else {
    echo '<div class="box_erro_login"><p><i class="fas fa-exclamation-circle"></i> Usuário não encontrado.</p></div>';
  }

}

?>