<?php

require_once '../models/Usuario.php';

class UsuarioController {
    public function cadastrar($dados) {
        $usuario = new Usuario();

        $usuario->setNome($dados['nome']);
        $usuario->setCpf($dados['cpf']);
        $usuario->setEmail($dados['email']);
        $usuario->setTelefone($dados['telefone']);
        $usuario->setEndereco($dados['endereco']);
        $usuario->setSenha($dados['senha']);

        $host = 'localhost:3306';
        $dbname = 'supermercado';
        $username = 'root';
        $password = '';

        $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

        $query = "
        INSERT INTO
        usuario (nome, cpf, email, telefone, endereco, senha) 
        VALUES
        (:nome, :cpf, :email, :telefone, :endereco, :senha)";

        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':cpf', $usuario->getCpf());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':telefone', $usuario->getTelefone());
        $stmt->bindValue(':endereco', $usuario->getEndereco());
        $stmt->bindValue(':senha', $usuario->getSenha());
        $stmt->execute();

    }
}
?>
