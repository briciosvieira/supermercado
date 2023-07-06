<?php

class PedidosItem {
    private $idPedidoItem;
    private $idProduto;
    private $precoPedido;
    private $quantidadePedido;
    private $sessionId;

    public function setIdPedidoItem($idPedidoItem) {
        $this->idPedidoItem = $idPedidoItem;
    }
    
    public function getIdPedidoItem() {
        return $this->idPedidoItem;
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

    public function getSessionId() {
        return $this->sessionId;
    }

    public function setSessionId($sessionId) {
        $this->sessionId = $sessionId;
    }

    public function save() {
        global $db;

        $stmt = $db->prepare('INSERT INTO pedidositem (idProduto, precoPedido, quantidadePedido, sessionId) VALUES (:idProduto, :precoPedido, :quantidadePedido, :sessionId)');
        $stmt->bindValue(':idProduto', $this->idProduto);
        $stmt->bindValue(':precoPedido', $this->precoPedido);
        $stmt->bindValue(':quantidadePedido', $this->quantidadePedido);
        $stmt->bindValue(':sessionId', $this->sessionId);
        $stmt->execute();
    }

    public static function getItemsBySessionId($sessionId) {
        global $db;
    
        // Fetch the cart items for the given session ID
        $stmt = $db->prepare('SELECT * FROM pedidositem WHERE sessionId = :sessionId');
        $stmt->bindValue(':sessionId', $sessionId);
        $stmt->execute();
    
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $pedidosItems = [];
    
        // Create PedidosItem objects from the results
        foreach ($results as $result) {
            $produto = Produto::getById($result['idProduto']);
    
            if ($produto) {
                $pedidosItem = new PedidosItem();
                $pedidosItem->idPedidoItem = $result['idPedidoItem'];
                $pedidosItem->idProduto = $result['idProduto'];
                $pedidosItem->precoPedido = $result['precoPedido'];
                $pedidosItem->quantidadePedido = $result['quantidadePedido'];
                $pedidosItem->sessionId = $result['sessionId'];
    
                $pedidosItems[] = $pedidosItem;
            }
        }
    
        return $pedidosItems;
    }
    

    public static function deleteById($idPedidoItem) {
        global $db;

        // Delete the cart item from the database by ID
        $stmt = $db->prepare('DELETE FROM pedidositem WHERE idPedidoItem = :idPedidoItem');
        $stmt->bindValue(':idPedidoItem', $idPedidoItem);
        $stmt->execute();
    }

    public function getProduto() {
        return Produto::getById($this->idProduto);
    }
    

    public static function setDatabase($db) {
        global $database;
        $database = $db;
    }

    public function getSubtotal() {
        return $this->getProduto()->getPrecoProduto() * $this->quantidadePedido;
    }

    

}
