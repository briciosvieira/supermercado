<?php
include("Head.php");
?>
<head>
<link rel="stylesheet" href="./style/star.css">
</head>


<div class="container">
  <div class="container mt-3">
    <h2>Minhas Compras</h2>
    <br>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Horário</th>
          <th>Data</th>
          <th>Valor</th>
          <th>Produtos</th>
          <th></th>
          <th>Compras</th>
          <th>Avaliação da Compra</th>
          <th></th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td>23:40</td>
          <td>28/02/2023</td>
          <td>R$510,85</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn btn-outline-info" data-bs-toggle="dropdown">
                Lista de Produtos
              </button>
              <ul class="dropdown-menu">
                <li><h4 class="dropdown-header"><center>Lista de Produtos</center></h4></li>
                  <li><h6 class="dropdown-item">Produto 1 <h9 style="margin-left: 25%; color: grey;">(3)</h9></li>
                  <li><h6 class="dropdown-item">Produto 2 <h9 style="margin-left: 25%; color: grey;">(2)</h9></li>
                  <li><h6 class="dropdown-item">Produto 3 <h9 style="margin-left: 25%; color: grey;">(1)</h9></li>
                </ul>
            </div>
            </td>
            <td></td>
            <td><a type="button" class="btn btn-outline-warning" href="./statusCompra.php">Rasterar Compra</a>
            <a type="button" class="btn btn-outline-warning">Repetir Compra</a></td>
            <td><div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label></div></td>
        </tr>

        <tr>
          <td>23:40</td>
          <td>28/02/2023</td>
          <td>R$510,85</td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn btn-outline-info" data-bs-toggle="dropdown">
                Lista de Produtos
              </button>
              <ul class="dropdown-menu">
                <li><h4 class="dropdown-header"><center>Lista de Produtos</center></h4></li>
                  <li><h6 class="dropdown-item">Produto 1 <h9 style="margin-left: 25%; color: grey;">(3)</h9></li>
                  <li><h6 class="dropdown-item">Produto 2 <h9 style="margin-left: 25%; color: grey;">(2)</h9></li>
                  <li><h6 class="dropdown-item">Produto 3 <h9 style="margin-left: 25%; color: grey;">(1)</h9></li>
                </ul>
            </div>
            </td>
            <td></td>
            <td><a type="button" class="btn btn-outline-warning" href="./statusCompra.php">Rasterar Compra</a>
            <a type="button" class="btn btn-outline-warning">Repetir Compra</a>
            </td>
            <td><div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label></div></td>
               
            
        </tr>

      </tbody>
    </table>
  
  </div>
</div>

<?php include("Footer.php"); ?>
</body>
</html>