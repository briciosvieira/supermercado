<?php

class ProdutoModel{
    private $idProduto;
    private $nomeProduto;
    private $precoProduto;
    private $imgProduto;
    private $categoriaProduto;

    public function __construct($nomeProduto, $precoProduto, $imgProduto, $categoriaProduto){
        $this->nomeProduto = $nomeProduto;
        $this->precoProduto = $precoProduto;
        $this->imgProduto = $imgProduto;
        $this->categoriaProduto = $categoriaProduto;
    }

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

    public function getImgProduto() {
        return $this->imgProduto;
    }

    public function setImgProduto($imgProduto) {
        $this->imgProduto = $imgProduto;
    }

    public function getCategoriaProduto() {
        return $this->categoriaProduto;
    }

    public function setCategoriaProduto($categoriaProduto) {
        $this->categoriaProduto = $categoriaProduto;
    }

    public static function getProdutos(){
        return ProdutoService::getProdutos();
    }

    public static function getProdutosByCategoria() {
        return ProdutoService::getProdutosByCategoria();
    }
    

}

?>