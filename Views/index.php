<?php include("Head.php"); ?>

<!-- CARROSSEL -->
<div class="container-md">
  <br>
<div id="demo1" class="carousel slide" data-bs-ride="carousel">
  <!-- BOTÕES INDICADORES (INFERIOR) -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo1" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo1" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo1" data-bs-slide-to="2"></button>
  </div>
  
  <!-- IMAGENS -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./img/slide/1.jpg" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="./img/slide/2.jpg" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
      <img src="./img/slide/3.jpg" class="d-block" style="width:100%">
    </div>
  </div>
  
  <!-- BOTÃO AVANÇAR/VOLTAR -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo1" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo1" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
</div>

<br>
<!-- PRODUTOS (BLOCO 1) -->
<div id="demo" class="carousel" style="width: 100%">
  <div class="container-fluid mt-3" style="width: 75%;">
    <h3>Confira Nossas Promoções</h3>
    <br>
  </div>
 
  <!-- LISTA PRODUTOS -->
  <div class="carousel-inner">
    <center>
      <div class="carousel-item active">
        <div class="row" style="width: 75%;">

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/oleo.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Óleo de Soja Soya Pet 900ML</p>
                <h5 class="card-title">R$7,99</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/acucar.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Açúcar Cristal Pinheiro 1KG</p>
                <h5 class="card-title">R$3,99</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
            
          </div><div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/arroz.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Arroz Parboilizado Urbano Tipo1 1KG</p>
                <h5 class="card-title">R$4,59</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/flocao.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Flocão de Milho Maratá 500G</p>
                <h5 class="card-title">R$1,99</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>

          <div class="col-sm">
            <div class="card">
              <img class="card-img-top" src="./img/produtos/trigo.png" alt="Card image">
              <div class="card-body">
                <p class="card-text">Farinha de Trigo Finna c/ Fermento</p>
                <h5 class="card-title">R$5,99</h5>
                <a href="#" class="btn btn-outline-warning">Comprar</a>
              </div>
            </div>
          </div>

        </div>
        <br>
    </div>
    <div class="carousel-item">
      <div class="row" style="width: 75%;">

        <div class="col-sm">
          <div class="card">
            <img class="card-img-top" src="./img/produtos/cafe.png" alt="Card image">
            <div class="card-body">
              <p class="card-text">Café Maratá a Vácuo 250G</p>
              <h5 class="card-title">R$7,49</h5>
              <a href="#" class="btn btn-outline-warning">Comprar</a>
            </div>
          </div>
        </div>

        <div class="col-sm">
          <div class="card">
            <img class="card-img-top" src="./img/produtos/ovo.png" alt="Card image">
            <div class="card-body">
              <p class="card-text">Ovos Brancos Grandes c/ 30 Unid</p>
              <h5 class="card-title">R$17,90</h5>
              <a href="#" class="btn btn-outline-warning">Comprar</a>
            </div>
          </div>
          
        </div><div class="col-sm">
          <div class="card">
            <img class="card-img-top" src="./img/produtos/limao.png" alt="Card image">
            <div class="card-body">
              <p class="card-text">Limão Taiti unidade (aprox: 120G)</p>
              <h5 class="card-title">R$0,29</h5>
              <a href="#" class="btn btn-outline-warning">Comprar</a>
            </div>
          </div>
        </div>

        <div class="col-sm">
          <div class="card">
            <img class="card-img-top" src="./img/produtos/azeite.png" alt="Card image">
            <div class="card-body">
              <p class="card-text">Azeite de Oliva Extra Virgem 500ML</p>
              <h5 class="card-title">R$24,90</h5>
              <a href="#" class="btn btn-outline-warning">Comprar</a>
            </div>
          </div>
        </div>

        <div class="col-sm">
          <div class="card">
            <img class="card-img-top" src="./img/produtos/ninho.png" alt="Card image">
            <div class="card-body">
              <p class="card-text">Leite em Pó Ninho Integral 750G</p>
              <h5 class="card-title">R$29,90</h5>
              <a href="#" class="btn btn-outline-warning">Comprar</a>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
    </center>
  </div>
  
  <!-- AVANÇAR/VOLTAR PRODUTOS (BLOCO 1) -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <img src="./img/left.png" style="width: 20%;">
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <img src="./img/right.png" style="width: 20%;">
  </button>
</div>

<div class="container-fluid mt-3" style="width: 75%;">
    <h3><center><a href="./produtos.php" class="btn btn-outline-warning" style="width: 330px;">Confira mais produtos</a></center></h3><br>
</div>

<?php include("Footer.php"); ?>
</body>
</html>