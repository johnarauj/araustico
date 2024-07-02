<?php 
include_once 'header.php'; 
require_once 'includes/functions.php';
require_once 'includes/bdconnect.inc.php';
?>

    <div class = "card-wrapper">
    <?php
    if(isset($_GET["id"])){
      
        $lista = detalheMoveis($conn,$_GET["id"]);

        if($lista){?>
      <div class = "card">
        <div class = "product-imgs">
          <div class = "img-display">
            <div class = "img-showcase">
              <img src ="../img/<?=$lista['moveisimage'];?>" alt = "shoe image">
              <img src ="../img/<?=$lista['moveisimage'];?>" alt = "shoe image">
              <img src ="../img/<?=$lista['moveisimage'];?>" alt = "shoe image">
              <img src ="../img/<?=$lista['moveisimage'];?>" alt = "shoe image">
            </div>
          </div>
          <div class = "img-select">
            <div class = "img-item">
              <a href = "#" data-id = "1">
                <img src ="../img/<?=$lista['moveisimage'];?>" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "2">
                <img src ="../img/<?=$lista['moveisimage'];?>" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "3">
                <img src ="../img/<?=$lista['moveisimage'];?>" alt = "shoe image">
              </a>
            </div>
            <div class = "img-item">
              <a href = "#" data-id = "4">
                <img src ="../img/<?=$lista['moveisimage'];?>" alt = "shoe image">
              </a>
            </div>
          </div>
        </div>
        <!-- card right -->
        <div class = "product-content">
          <h2 class = "product-title"><?=$lista['moveisNome'];?></h2>
          
          <div class = "product-price">
            <p class = "new-price">Código: <span><?=$lista['moveisCodigo'];?></span></p>
            <p class = "new-price">Preço: <span><?=$lista['moveisValor'];?></span></p>
          </div>

          <div class = "product-detail">
            <p><?=$lista['moveisCaract']?></p>
            <ul>
              <li>Stock: <span><?=$lista['moveisDisp']?></span></li>
            </ul>
          </div>
          <?php
          if (isset($_SESSION['userName'])){
            ?>
          <div class = "purchase-info">
          <form action="includes/add_to_cart.inc.php" method="post">
              <input type="hidden" name="moveisId" value="<?=$lista['moveisId'];?>">
              <input type="number" name="quantity" value="1" min="1">
              <button type="submit" name="add_to_cart" class="btn">Adicionar ao Carrinho</button>
          </form>
          </div>
        <?php } ?>
          <?php
          if (isset($_SESSION["userName"]) && $_SESSION["userDom"] == 1) {
            ?>
          <div class = "purchase-info">
              <button type = "button" class = "btn">
                <a href="editarMoveis.php?id=<?=$lista['moveisId'];?>" class="tirar-decoration">
                Editar <i class = "fas fa-shopping-cart"></i></a>
              </button>            
              <a href="eliminarMoveis.php?id=<?=$lista['moveisId'];?>" class="tirar-decoration"><button type = "button" class = " btn tirar-decoration ">Eliminar</button></a>
          </div>
          <?php } ?>
          </div>
        </div>
      </div>
    </div>

                               <?php }} 
    include_once 'footer.php';                               
?>
    <script src="../script.js"></script>
  </body>
</html>