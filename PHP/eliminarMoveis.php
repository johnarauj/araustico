<?php include_once 'header.php'; 
require_once 'includes/functions.php';
require_once 'includes/bdconnect.inc.php';
?>

<div class="listagem-cadeiras">
    <table class="aumentar-table">
        <thead>
            <tr>
                <td>
                    <h1 id="hover-pra-cadeira-de-graca">Eliminar Produto</h1>
                    <p id="hover-pra-cadeira-de-graca"><a href="index.php" class="volta-homepage">Homepage</a> - Eliminar Produto</p>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="So-pra-margem">
                        <div id="listagem-cadeiras">
    
<?php
    if(isset($_GET["id"])){
      
        $lista = detalheMoveis($conn,$_GET["id"]);

        if($lista){?>
            <form action="includes/eliminarMoveis.inc.php" method="POST" id="eliminar-form">
                <input type="hidden" name="moveisId" value="<?=$lista['moveisId'];?>">
                <p>Tem a certeza que deseja eliminar o produto?</p>
                <br><p><strong>Codigo:</strong><?=$lista['moveisCodigo'];?></p>
                <p><strong>Nome:</strong><?=$lista['moveisNome'];?></p>
                <button class="alterar-botao-Emoveis" type="submit" name="submit">Eliminar</button>
            </form>
        <?php
    }else{
            echo "<p>Não foi encontrado o produto</p>";
        }

    }

?>
    

</div>

<?php include_once 'footer.php'; ?>