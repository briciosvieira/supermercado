<?php

class PedidoItemModel{
    private $idPedidoItem;
    private $idProduto;
    private $precoPedido;
    private $quantidadePedido;
    private $idPedido;

    public function __construct($idProduto, $precoPedido, $quantidadePedido, $idPedido) {
        $this->idProduto = $idProduto;
        $this->quantidadePedido = $quantidadePedido;
        $this->precoPedido = $precoPedido;
        $this->idPedido = $idPedido;
    }

    public function getIdPedidoItem() {
        return $this->idPedidoItem;
    }

    public function setIdPedidoItem($idPedidoItem) {
        $this->idPedidoItem = $idPedidoItem;
    }

    public function getIdProduto() {
        return $this->idProduto;
    }

    public function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }
    
    public function getPrecoPedido() {
        return $this->precoPedido;
    }

    public function setPrecoPedido($precoPedido) {
        $this->precoPedido = $precoPedido;
    }

    public function getQuantidadePedido() {
        return $this->quantidadePedido;
    }

    public function setQuantidadePedido($quantidadePedido) {
        $this->quantidadePedido = $quantidadePedido;
    }

    public function getIdPedido() {
        return $this->idPedido;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

}

?>