<?php

class ProdutoService {
  
  public static function getProdutos() {
    try {
      $conexao = Conexao::conectar();
      $sql = $conexao->prepare("SELECT * FROM supermercado.produto");

      $sql -> execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);

      $produtos = array();
      $i = 0;

      while ($data = $sql -> fetch(PDO::FETCH_ASSOC)) {
        $currentProduto = new ProdutoModel($data['nomeProduto'], $data['precoProduto'], $data['imgProduto'], $data['categoriaProduto']);
        $currentProduto->setIdProduto($data['idProduto']);

        $produtos[$i] = $currentProduto;
        $i++;
      }
      
      return $produtos;
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


  public function getProduto($produto) {
    $idProduto = $produto->getIdProduto();

    try {
      $conexao = Conexao::conectar();
      $sql = "SELECT * FROM produto WHERE idProduto = :idProduto";
      $stmt = $conexao -> prepare($sql);
      $stmt -> bindParam(":idProduto", $idProduto);

      $stmt -> execute();
    
      $data = $stmt -> fetch();

      $produto = new ProdutoModel($data["nomeProduto"], $data["precoProduto"], $data["imgProduto"], $data["CategoriaProduto"]);
      $produto->setIdProduto($data["idProduto"]);

      return $produto;
    } catch (PDOException $e) {
      return null;
    }
  }

    
    public static function getProdutosByCategoria($categoriaProduto) {
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM produto WHERE categoriaProduto = :categoriaProduto";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(":categoriaProduto", $categoriaProduto);
            $stmt->execute();
      
            $produtos = array();
      
            while ($data = $stmt->fetch()) {
                $currentProduto = new ProdutoModel($data["nomeProduto"], $data["precoProduto"], $data["imgProduto"], $data["categoriaProduto"]);
                $currentProduto->setIdProduto($data["idProduto"]);
      
                $produtos[] = $currentProduto;
            }
      
            return $produtos;
        } catch (PDOException $e) {
            return null;
        }
    }
  
  
  }