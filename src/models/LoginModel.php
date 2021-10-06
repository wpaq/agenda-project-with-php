<?php

require_once 'ConnectionModel.php';

class Login {
    function __construct() {
        $this->db = new DBConnection();
        $this->conn = $this->db->startConnection();
        $this->connEnd = $this->db->endConnection();

        $this->errors = array();
        $this->register();
        $this->login();
        print_r($this->errors);        
    }

    function register() {
        //verifica se o user tentou cadastrar
        if(isset($_POST['cadastro'])) {
            $passwordEncrypt = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            //chama a function valida enviando o email e senha
            $this->valida($_POST['email'], $_POST['senha']);

            //se exister algum erro retorna aqui
            if(!empty($this->errors)) { return; }

            //chama a function userExists enviando o email e a conexao com o bd
            $this->usersExists($_POST['email'], $this->conn);

            //se exister algum erro retorna aqui
            if(!empty($this->errors)) { return; }

            //senão existir erros cadastra o usuário
            if(empty($this->errors)) {
                $insertUser = $this->conn->prepare('INSERT INTO users (email, senha) VALUES (:email, :senha)');
                $insertUser->bindParam(':email', $_POST['email']);
                $insertUser->bindParam(':senha', $passwordEncrypt);
                $insertUser->execute();
            }
        }
    }

    function login() {
        if(isset($_POST['login'])) {
            $this->valida($_POST['email'], $_POST['senha']);

            if(!empty($this->errors)) { return; }

            if($this->usersExists($_POST['email'], $this->conn) == 0) {
                array_push($this->errors, 'Usuário não existe');
                return;
            }

            if(password_verify($_POST['senha'], $info['senha'])){

            }
            
        }
    }

    function usersExists($email, $conn) {
        $verifyEmail = $conn->prepare('SELECT email from users WHERE email = :email');
        $verifyEmail->bindParam(':email', $email);
        $verifyEmail->execute();
        
        if($verifyEmail->rowCount() > 0) {
            array_push($this->errors, 'Usuário já existe');
        } else {
            return 0;
        }
    }

    function valida($email, $senha) {
        // Validação
        if(empty($email)) {
            array_push($this->errors, 'E-mail inválido');
        }

        // A senha precisa ter entre 3 e 50 
        if(strlen($senha) < 3 or strlen($senha) >= 50) {
            array_push($this->errors, 'A senha precisa ter entre 3 e 50 caracteres');
        }
    }
}

$login = new Login();

?>