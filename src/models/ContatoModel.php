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
        $this->sucess = array();        
    }

    function register() {
        //chama a function valida enviando os dados digitados
        $this->valida();

        //se exister algum erro retorna aqui
        if(!empty($this->errors)) { return; }

        //senão existir erros cadastra o usuário
        if(empty($this->errors)) {
            $insertContato = $this->connStart->prepare('INSERT INTO contatos (nome, sobrenome, email, telefone) VALUES (:nome, :sobrenome, :email, :telefone)');
            $insertContato->bindParam(':nome', $this->nome);
            $insertContato->bindParam(':sobrenome', $this->sobrenome);
            $insertContato->bindParam(':email', $this->email);
            $insertContato->bindParam(':telefone', $this->telefone);
            $insertContato->execute();
            $this->connEnd;
        }
    }

    function update($id) {
        //chama a function valida enviando os dados digitados
        $this->valida();

        //se exister algum erro retorna aqui
        if(!empty($this->errors)) { return; }

        //senão existir erros cadastra o usuário
        if(empty($this->errors)) {
            $insertContato = $this->connStart->prepare('UPDATE contatos SET nome=:nome, sobrenome=:sobrenome, email=:email, telefone=:telefone WHERE id_contatos=:id');
            $insertContato->bindParam(':nome', $this->nome);
            $insertContato->bindParam(':sobrenome', $this->sobrenome);
            $insertContato->bindParam(':email', $this->email);
            $insertContato->bindParam(':telefone', $this->telefone);
            $insertContato->bindParam(':id', $id);
            $insertContato->execute();
            $this->connEnd;
            array_push($this->sucess,'Contato atualizado com sucesso!');
        }
    }

    function delete($id) {
        if(isset($_SESSION['email'])) {
            $deleteContato = $this->connStart->prepare('DELETE FROM contatos WHERE id_contatos=:id');
            $deleteContato->bindParam(':id', $id);
            $deleteContato->execute();
            $this->connEnd;
            array_push($this->sucess,'Contato deletado com sucesso!');
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

        $dados = $contatos->fetchAll(PDO::FETCH_ASSOC);

        if(empty($contatos->rowCount())) {
            array_push($this->errors,'Nenhum contato encontrado');
            $this->connEnd;
        }
        return $dados; 
    }

    function buscaPorId($id) {
        $contatos = $this->connStart->prepare("SELECT * FROM contatos WHERE id_contatos = :id");
        $contatos->bindParam(':id', $id);
        $contatos->execute();

        $dados = $contatos->fetchAll(PDO::FETCH_ASSOC);

        if(empty($contatos->rowCount())) {
            array_push($this->errors,'Nenhum contato encontrado');
            $this->connEnd;
        }
        return $dados; 
    }

}

?>