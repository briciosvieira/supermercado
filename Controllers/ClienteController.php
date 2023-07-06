<?php

class ClienteController{
  public static function createIfNotExists($idUser) {
    $idUser = $_SESSION['idUser'];
    $pedidoService = new PedidoService();
    $pedido = $pedidoService -> getLastUserPedido($idUser);

    if(($pedido != null) && ($pedido -> getStatus() != "Aberto")) {
      $pedido = $pedidoService -> create(new PedidoModel($idUser, "Aberto"));
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

  public static function getPedidosByUser() {
    // $userId = $_SESSION["userId"];
    $userId = 3;
    
    $pedidoService = new PedidoService();
    $data = $pedidoService -> getPedidosByUser($userId);

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

  public static function getUser($email)
  {
    $user = ClienteService::getUser($email);
    return $user;
  }

  public static function getNomeCliente($email)
  {
    $user = ClienteService::getNomeCliente($email);
    return $user;
  }

  public static function getIdUser($email){
    $user = ClienteService::getIdUser($email);
    return $user;
  }

  public static function getUsers() {
    $clienteService = new ClienteService();
    $allClientes = $clienteService->getUsers();

    return $allClientes;
  }

}

?>