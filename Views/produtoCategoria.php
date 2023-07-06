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



<!-- LISTA PRODUTOS -->
    <div class="carousel-inner text-center">
      <center>
        <div class="row" style="width: 75%;" >
          <?php
          if (isset($produtos) && is_array($produtos) && count($produtos) > 0) {
            shuffle($produtos);

            foreach ($produtos as $produto) { 
              $precoProduto = number_format($produto->getPrecoProduto(), 2, ',', '.');
          ?>
              <div class="card" style="width: 225px;">
                <img class="card-img-top" src="<?= $produto->getImgProduto()?>" alt="Card image">
                <div class="card-body">
                  <p class="card-text"><?= $produto->getNomeProduto() ?></p>
                  <h5 class="card-title">R$<?= $precoProduto ?></h5>
                  <a href="#" class="btn btn-outline-warning">Comprar</a>
                </div>
              </div>
          <?php
            }
          } else {
            echo "<p>Nenhum produto encontrado.</p>";
          }
          ?>
        </div>
        <br>
        <br>
      </center>
    </div>
  </div>
</body>
