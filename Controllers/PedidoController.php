<?php
class PedidoController{
  public static function createIfNotExists($idCliente) {
    $pedidoService = new PedidoService();
    $pedido = $pedidoService -> getLastUserPedido($idCliente);

    if(($pedido != null) && ($pedido -> getStatus() != "Aberto")) {
      $pedido = $pedidoService -> create(new PedidoModel($idCliente, "Aberto"));
    }
    return $pedido;
  }

  public static function deleteWhenEmpty($pedido) {
    $pedidoService = new PedidoService();
    $pedidoItemService = new PedidoItemService();

    $pedidos = $pedidoItemService -> getPedidosItemByIdPedido($pedido);

    if (count($pedidos) == 0) {
      $pedidoService -> delete($pedido);
    }
  }

  public static function getPedidosByUser($idCliente) {
    $idCliente = $_SESSION["idCliente"];
    $pedidoService = new PedidoService();
    $data = $pedidoService -> getPedidosByUser($idCliente);

    $openPedidos = array();
    $otherPedidos = array();
    
    foreach ($data as $pedido) {
      if ($pedido -> getStatus() != "Entregue") {
        array_push($openPedidos, $pedido);
      } else {
        array_push($otherPedidos, $pedido);
      }
    }

    $pedidos= array('open' => $openPedidos, 'history' => $otherPedidos );
    
    return $pedidos;
    
  }

  public static function getPedidos() {
    $pedidoService = new PedidoService();
    $allPedidos = $pedidoService->getPedidos();

    $activePedidos = array();

    foreach ($allPedidos as $pedido) {
      if ($pedido->getStatus() != "Entregue" && $pedido->getStatus() != "Aberto") {
        array_push($activePedidos, $pedido);
      }
    }


    return array('all' => $allPedidos, 'active' => $activePedidos);
  }

  public static function changeStatus($idPedido, $status) {
    $pedidoService = new PedidoService();

    return $pedidoService -> changeStatus($idPedido, $status);
  }


}

?>