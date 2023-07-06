<?php
require_once "../Models/conexao.php";
require_once "../Models/Produto_Model.php";
require_once "../Models/Produto_Service.php";
require_once "../Controllers/ProdutosController.php";
$produtos = ProdutosController::listarProdutosByCategoria(4);
include("Head.php");
?>

<body id="products">
  <div id="demo" class="carousel" style="width: 100%">
    <div class="container-fluid mt-3" style="width: 75%;">
      <h3>Frios & Laticínios</h3>
    </div>

    <?php
    include("produtoCategoria.php");
    include("Footer.php");
    ?>

</html>
