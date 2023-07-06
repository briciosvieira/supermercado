<?php

class PedidosItemController{
  public static function addItem($pedidoItem) {
    $pedidoItemService = new PedidoItemService();

    $pedidoItemExists = $pedidoItemService->getPedidosItemByIdPedidoAndIdIProduto($pedidoItem);

    if($pedidoItemExists->getIdPedidoItem() != null) {
      $pedidoItemExists -> setQuantidadePedido(($pedidoItemExists -> getQuantidadePedido()) + 1);
      
      $pedidoItem = $pedidoItemService -> update($pedidoItemExists);
    } else {
      $pedidoItem = $pedidoItemService -> create($pedidoItem);
    }
    
    return $pedidoItem;
  }

  public static function removeItem($pedidoItem) {
    $pedidoItemService = new PedidoItemService();
    $pedidoItemService -> delete($pedidoItem);
  }

  public static function updateQuantity($pedidoItem){
    $pedidoItemService = new PedidoItemService();
    $pedidoItemService->updateQuantity($pedidoItem);
  }

  public static function listPedidoItems($pedidoItem) {
    $pedidoItemService = new PedidoItemService();
    $pedidoItems = $pedidoItemService -> getPedidosItemByIdPedido($pedidoItem);

    return $pedidoItems;
  }
}


?>