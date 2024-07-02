<?php 
include_once 'header.php'; 
require_once 'includes/functions.php';
require_once 'includes/bdconnect.inc.php';
?>

    <div class = "card-wrapper">
      <div class = "inserir-card">
        <form class = "product-content" action=includes/inserirMoveis2.inc.php method="POST" enctype="multipart/form-data">
          <h2 class = "product-title">Nome: <input type="text" name="moveisNome"></h2>          
          <div class = "product-price">
            <p class = "new-price">Código: <span><input type="text" name= "moveisCodigo"></span></p>            
            <p class = "new-price"><input type="hidden" name="moveisId"></p> 
            <p class = "new-price">Preço: <span><input type="text" name="moveisValor"></span></p>
          </div>

          <div class = "product-detail">
            <p>Caracteristicas: <textarea type="text" rows="8" columns="20" name="moveisCaract"></textarea></p>
            <ul>
              <li>Stock <span><input type="text" name="moveisDisp"></span></li>
              <p>Escolha uma imagem:</p>
              <input type="file" name="file" id="file" accept="image/*">
              <p><label>
                    <input type="radio" name="Tipo" value="0"checked>Cadeira
                </label></p>
                <p><label>
                    <input type="radio" name="Tipo" value="1">Mesa
                </label></p>
                <p><label>
                    <input type="radio" name="Tipo" value="2">Armário
                </label></p>
                <button type="submit" name="submit" class="alterar-botao">Submeter</button>
            </ul>
          </div>
          </div>
          
        </form>
      </div>
    </div>
    <script src="../script.js"></script>
  </body>
</html>