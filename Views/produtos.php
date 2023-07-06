<?php
require_once "../Models/conexao.php";
require_once "../Models/Produto_Model.php";
require_once "../Models/Produto_Service.php";
require_once "../Controllers/ProdutosController.php";


if (empty($_GET)) {
  $produtos = ProdutosController::listarProdutos();
} else {
  $categoria = $_GET["categoria"];
  $produtos = ProdutosController::listarProdutosByCategoria($categoria);
}

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


<?php if (!isset($_SESSION['user'])) { ?>

<?php } else { ?>
<a href="cart.php" class="nav-link"><i class="fas fa-shopping-cart" style="font-size: 25px; margin-top: 15px;"></i></a>
<a href="perfil-cliente.php" class="nav-link col-md-6">Ver perfil <a href="../Views/index.php?logoff=1" class="nav-link col-md-5" style="margin-left: 0%;">Sair</a>
<?php } ?>

<body id="products">



<div id="demo" class="carousel" style="width: 100%">
  <div class="container-fluid mt-3" style="width: 75%;">
    <h3>Confira Nossas Ofertas</h3>
  </div>
 
  <!-- LISTA PRODUTOS -->
  <div class="carousel-inner">
    <center>
        <div class="row" style="width: 75%;">

        <?php
        if(isset($produtos)) {
          shuffle($produtos);
        }

        foreach ($produtos as $produto) { 
          $precoProduto = number_format($produto->getPrecoProduto(), 2, ',', '.');
        ?>
            <br><div class="card" style="width: 18%;">
            <form method="post" action="index.php?controller=cart&action=addToCart">
              <img class="card-img-top" src="<?= $produto->getImgProduto()?>" alt="Card image">
              <div class="card-body">
              <input type="hidden" name="acao" value="addItem">
                <p class="card-text"><?= $produto->getNomeProduto() ?></p>
                <h5 class="card-title">  <input type="hidden" name="precoProduto" value="<?= $produto->getPrecoProduto() ?>">R$<?= $precoProduto ?></h5>
                <input type="hidden" name="idProduto" value="<?= $produto->getIdProduto() ?>">
                <button type="submit" class="btn btn-outline-warning">Comprar</button>
                </form>  
              </div>
            </div><?php } ?>

        </div>
        <br>
      <br>
    </center>
  </div>
  <?php include("Footer.php"); ?>
</body>
</html>