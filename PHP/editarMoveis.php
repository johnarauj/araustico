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
        <form class = "product-content" action=includes/editarMoveis.inc.php method="POST">
          <h2 class = "product-title"><input type="text" name="moveisNome" value="<?=$lista['moveisNome'];?>"></h2>          
          <div class = "product-price">
            <p class = "new-price">Código: <span><input type="text" name= "moveisCodigo" value=<?=$lista['moveisCodigo'];?>></span></p>            
            <p class = "new-price"><input type="hidden" name="moveisId" value=<?=$lista['moveisId'];?>></p> 
            <p class = "new-price">Preço: <span><input type="text" name="moveisValor" value=<?=$lista['moveisValor'];?>></span></p>
          </div>

          <div class = "product-detail">
            <p>Caracteristicas: <textarea type="text" rows="15" style="width: 300px;  " name="moveisCaract"> <?=$lista['moveisCaract'];?></textarea></p>
            <ul>
              <li>Cor: <span>Black</span></li>
              <li>Stock <span><input type="text" name="moveisDisp" value=<?=$lista['moveisDisp']?>></span></li>
              <li>Category: <span>Shoes</span></li>
              <button type="submit" name="submit" class="alterar-botao">Alterar</button>
            </ul>
          </div>
          </div>
        </form>
      </div>
    </div>

                               <?php }} ?>
    <script src="../script.js"></script>
  </body>
</html>