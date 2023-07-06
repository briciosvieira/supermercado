<?php

class Produto {
    public $idProduto;
    public $nomeProduto;
    public $precoProduto;
    public $categoriaProduto;
    public $mercado;
    public $imgProduto;

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    public function getNomeProduto() {
        return $this->nomeProduto;
    }

    public function setNomeProduto($nomeProduto) {
        $this->nomeProduto = $nomeProduto;
    }

    public function getPrecoProduto() {
        return $this->precoProduto;
    }

    public function setPrecoProduto($precoProduto) {
        $this->precoProduto = $precoProduto;
    }

    public function getCategoriaProduto() {
        return $this->categoriaProduto;
    }

    public function setCategoriaProduto($categoriaProduto) {
        $this->categoriaProduto = $categoriaProduto;
    }

    public function getMercado() {
        return $this->mercado;
    }

    public function setMercado($mercado) {
        $this->mercado = $mercado;
    }

    public function getImgProduto() {
        return $this->imgProduto;
    }

    public function setImgProduto($imgProduto) {
        $this->imgProduto = $imgProduto;
    }

    public static function getAll() {
        global $db;

        // Fetch all produtos from the database
        $stmt = $db->query('SELECT * FROM produto');
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $produtos = [];

        // Create Produto objects from the results
        foreach ($results as $result) {
            $produto = new Produto();
            $produto->idProduto = $result['idProduto'];
            $produto->nomeProduto = $result['nomeProduto'];
            $produto->precoProduto = $result['precoProduto'];
            $produto->categoriaProduto = $result['categoriaProduto'];
            $produto->mercado = $result['mercado'];
            $produto->imgProduto = $result['imgProduto'];
            $produtos[] = $produto;
        }

        return $produtos;
    }

    public static function getById($idProduto) {
        global $db;

        // Fetch the produto from the database by ID
        $stmt = $db->prepare('SELECT * FROM produto WHERE idProduto = :idProduto');
        $stmt->bindValue(':idProduto', $idProduto);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $produto = new Produto();
            $produto->idProduto = $result['idProduto'];
            $produto->nomeProduto = $result['nomeProduto'];
            $produto->precoProduto = $result['precoProduto'];
            $produto->categoriaProduto = $result['categoriaProduto'];
            $produto->mercado = $result['mercado'];
            $produto->imgProduto = $result['imgProduto'];

            return $produto;
        }

        return null;
    }

    public static function setDatabase($db) {
        global $database;
        $database = $db;
    }


}
