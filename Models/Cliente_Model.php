<?php

    class ClienteModel{
        private $idUser;
        private $nome;
        private $cpf;
        private $email;
        private $telefone;
        private $endereco;
        private $senha;

        public function __construct($idUser, $nome, $cpf, $email, $telefone, $endereco, $senha) {

            $this->idUser = $idUser;
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->email = $email;
            $this->telefone = $telefone;
            $this->endereco = $endereco;
            $this->senha = $senha;
        }
    
    
        public function getIdUser() {
            return $this->idUser;
        }
    
        public function setIdUser($idUser) {
            $this->idUser = $idUser;
        }
    
        public function getNome() {
            return $this->nome;
        }
    
        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getEmail() {
            return $this->email;
        }
    
        public function setEmail($email) {
            $this->email = $email;
        }
        
        public function getSenha() {
            return $this->senha;
        }
    
        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function getCpf() {
            return $this->cpf;
        }
    
        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        public function getTelefone() {
            return $this->telefone;
        }
    
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

        public function getEndereco() {
            return $this->endereco;
        }
    
        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }
    
    
    }

?>