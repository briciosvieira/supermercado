<?php
require_once "../Models/conexao.php";
require_once "../Models/Produto_Model.php";
require_once "../Models/Produto_Service.php";
require_once "../Controllers/ProdutosController.php";
include("Head.php");
?>



<style>
  .body{
    background-color: beige;
  }

  .card{
    border-color: orange;
    margin-left: 15px;
    margin-top: 15px;
  }

  .nav-link{
    color: white;
  }

  .nav-link:hover{
    color: orange;
  }
</style>



<body id="products">



<div id="demo" class="carousel" style="width: 100%">
  <div class="container-fluid mt-3" style="width: 75%;">
    <h3>Resultado da Pesquisa</h3>
  </div>
 
  <!-- LISTA PRODUTOS -->
  <div class="carousel-inner">
  <center>
    <div class="row" style="width: 75%;">
      <?php if(isset($products) && count($products) > 0): ?>
        <?php foreach($products as $product): ?>
          <div class="card" style="width: 18%;"><br>
            <img class="card-img-top" src="<?= $product["imgProduto"]; ?>" alt="Card image">
            <div class="card-body">
              <input type="hidden" name="acao" value="addItem">
              <p class="card-text"><?= $product["nomeProduto"]; ?></p>
              <h5 class="card-title">  <input type="hidden" name="precoProduto" value="">R$<?= $product["precoProduto"]; ?></h5>
                <button type="submit" class="btn btn-outline-warning">Comprar</button>
            </div>
          </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhum resultado encontrado.</p>
    <?php endif; ?><br><br>
  </center>
  </div>

  <?php include("Footer.php"); ?>
</body>
</html>