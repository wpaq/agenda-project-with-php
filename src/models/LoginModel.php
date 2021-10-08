<?php

require_once 'ConnectionModel.php';

class Login {
    function __construct($email, $senha) {
        $this->db = new DBConnection();
        $this->connStart = $this->db->startConnection();
        $this->connEnd = $this->db->endConnection();

        $this->email = $email;
        $this->senha = $senha;

        $this->errors = array();
        print_r($this->errors);        
    }

    function register() {
        //chama a function valida
        $this->valida();

        //se exister algum erro retorna aqui
        if(!empty($this->errors)) { return; }

        //chama a function userExists enviando o email e a conexao com o bd
        $this->usersExists();

        //se exister algum erro retorna aqui
        if(!empty($this->errors)) { return; }

        //senão existir erros cadastra o usuário
        if(empty($this->errors)) {
            $insertUser = $this->connStart->prepare('INSERT INTO users (email, senha) VALUES (:email, :senha)');
            $insertUser->bindParam(':email', $_POST['email']);
            $insertUser->bindParam(':senha', $senha);
            $insertUser->execute();
            $this->connEnd;
        }
    }

    function login() {
        $this->valida();

        if(!empty($this->errors)) { return; }

        $sql = $this->connStart->prepare('SELECT email, senha from users WHERE email = :email');
        $sql->bindParam(':email', $this->email);
        $sql->execute();

        if($sql->rowCount() > 0){
            $info = $sql->fetch();

            if(password_verify($this->senha, $info['senha'])){
                $_SESSION['email'] = $info['email']; 
                $_SESSION['senha'] = $info['senha'];
                header("Location: ../../index.php");
            } else {
                array_push($this->errors, 'Usuário ou senha incorretos');
                $this->connEnd;
            }            
        } else {
            array_push($this->errors, 'Usuário ou senha incorretos');
            $this->connEnd;
        }
        $this->connEnd;  
    }

    function usersExists() {
        $verifyEmail = $this->connStart->prepare('SELECT email from users WHERE email = :email');
        $verifyEmail->bindParam(':email', $this->email);
        $verifyEmail->execute();
        
        if($verifyEmail->rowCount() > 0) {
            array_push($this->errors, 'Usuário já existe');
            $this->connEnd;
        }
        $this->connEnd;
    }

    function valida() {
        // Validação
        if(empty($this->email)) {
            array_push($this->errors, 'E-mail inválido');
        }

        // A senha precisa ter entre 3 e 50 
        if(strlen($this->senha) < 3 or strlen($this->senha) >= 50) {
            array_push($this->errors, 'A senha precisa ter entre 3 e 50 caracteres');
        }
    }

}

?>