<?php
require_once './Models/Produto.php';
require_once './Models/PedidosItem.php';

class CartController {
    public function index() {
        $products = Produto::getAll();
        $cartItems = PedidosItem::getItemsBySessionId(session_id());
        require './Views/cart.php';
    }

    public function addToCart() {
        $idProduto = $_POST['idProduto'];
        $quantidade = $_POST['quantidade'];
    
        $produto = Produto::getById($idProduto);
    
        if ($produto) {
            $cartItem = new PedidosItem();
    
            $cartItem->setIdProduto($idProduto);
            $cartItem->setPrecoPedido($produto->getPrecoProduto());
            $cartItem->setQuantidadePedido($quantidade);
            $cartItem->setSessionId(session_id());
            $cartItem->save();
        }
    
        // Redirect back to the cart page
        header('Location: index.php?controller=cart&action=index');
        exit;
    }
    

    public function removeFromCart() {
        $idPedidoItem = $_POST['idPedidoItem'];
        PedidosItem::deleteById($idPedidoItem);
        header('Location: index.php?controller=cart&action=index');
        exit;
    }
}
?>
