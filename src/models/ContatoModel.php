<?php

require_once 'ConnectionModel.php';

class Contato {
    function __construct($nome, $sobrenome, $email, $telefone) {
        $this->db = new DBConnection();
        $this->connStart = $this->db->startConnection();
        $this->connEnd = $this->db->endConnection();

        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->telefone = $telefone;

        $this->errors = array();
        print_r($this->errors);        
    }

    function register() {
        //chama a function valida enviando os dados digitados
        $this->valida();

        //se exister algum erro retorna aqui
        if(!empty($this->errors)) { return; }

        //senão existir erros cadastra o usuário
        if(empty($this->errors)) {
            $insertContato = $this->db->startConnection()->prepare('INSERT INTO contatos (nome, sobrenome, email, telefone) VALUES (:nome, :sobrenome, :email, :telefone)');
            $insertContato->bindParam(':nome', $this->nome);
            $insertContato->bindParam(':sobrenome', $this->sobrenome);
            $insertContato->bindParam(':email', $this->email);
            $insertContato->bindParam(':telefone', $this->telefone);
            $insertContato->execute();
            $this->db->endConnection();
        }
    }

    function valida() {        
        // Validação
        if(empty($this->nome)) { array_push($this->errors, 'Nome é um campo obrigatório'); }
        if(empty($this->email) && empty($this->telefone)) { 
            array_push($this->errors, 'Pelo menos um contato precisa ser enviado: email ou telefone'); 
        }
    }

    function buscaContatos() {
        $contatos = $this->connStart->prepare("SELECT * FROM contatos");
        $contatos->execute();

        if(empty($contatos->rowCount())) {
            array_push($this->errors,'Nenhum contato encontrado');
            $this->connEnd;
        }
        return $contatos; 
    }

}

?>