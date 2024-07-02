<?php 
include_once 'header.php'; 
require_once 'includes/functions.php';
require_once 'includes/bdconnect.inc.php';
?>
<main>
    <div class="listagem-cadeiras">
        <table class="aumentar-table">
            <thead>
                <tr>
                    <td>
                        <?php
                        // para pegar o valor que foi passado pela URL usamos o $_GET['variavel']
                        $movelTipo = $_GET['Tipo'];
                        switch($movelTipo){
                            case 0:
                                echo '<h1 id="hover-pra-cadeira-de-graca">Cadeiras</h1>';
                                echo '<p id="hover-pra-cadeira-de-graca"><a href="index.php" class="volta-homepage">Homepage</a> - Cadeiras</p>';
                                break; 
                            case 1:
                                echo '<h1 id="hover-pra-cadeira-de-graca">Mesas</h1>';
                                echo '<p id="hover-pra-cadeira-de-graca"><a href="index.php" class="volta-homepage">Homepage</a> - Mesas</p>';
                                break;
                            case 2:
                                echo '<h1 id="hover-pra-cadeira-de-graca">Armários</h1>';
                                echo '<p id="hover-pra-cadeira-de-graca"><a href="index.php" class="volta-homepage">Homepage</a> - Armários</p>';
                                break;
                            default:
                                echo '<h1 id="hover-pra-cadeira-de-graca">Categoria Desconhecida</h1>';
                                
                                break;
                        }
                        if (isset($_SESSION["userName"]) && $_SESSION["userDom"] == 1) {
                            ?>
                            <a href="inserirMoveis.php" ><button class="alterar-botao-moveis">Inserir novo produto</button></a>
                            <?php } ?>
                            <form action="pesqMovel.php" method="POST">
                                <input id="margem-10" type="text" name="keywords" class="search" placeholder="Pesquise aqui...">
                                <button type="submit" class="search" name="submit" id="alterar-botao-pesquisar">pesquisar</button>
                            </form>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="So-pra-margem">
                        <div id="listagem-cadeiras">
                        <?php
                        if ($movelTipo >= 0) { // Verifica se o tipo de móvel é válido
                            $mostrar = mostrarMoveis($conn, $movelTipo);
                            if ($mostrar) {
                                foreach ($mostrar as $lista) {
                                    ?>
                                    <div>
                                        <a class="divs-da-listagem" href="detalhemoveis.php?id=<?=$lista['moveisId'];?>">
                                            <img src="../img/<?=$lista['moveisimage'];?>" alt="" id="cadeira-da-listagem">
                                            <p id="hover-pra-cadeira-de-graca"><strong><?=$lista['moveisNome'];?></strong></p>
                                            <p><?=$lista['moveisValor'];?>  €</p>
                                        </a>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<p>Não foram encontrados produtos.</p>";
                            }
                        } else {
                            //Porque esse else não funciona??
                            echo "<p>Tipo de móvel não especificado.</p>";
                        }?>
                    </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</main>
<?php include_once 'footer.php'; 

//Inserir dados na BD

//INSERT INTO moveis (moveisCodigo, moveisNome, moveisCaract, moveisimage, moveisDisp, moveisValor, moveisFav, moveisTipo) VALUES ("22222", "Armario estante madeira", "Uma estante de madeira sem portas é uma peça de mobiliário versátil e estilosa, perfeita para exibir e organizar diversos itens. Feita de madeira de alta qualidade, sua construção robusta e durável oferece um visual natural e acolhedor que complementa qualquer decoração. Com várias prateleiras abertas, esta estante é ideal para exibir livros, objetos decorativos, plantas e outros itens de forma organizada e acessível. Seu design aberto facilita a visualização e o acesso aos itens, tornando-a uma escolha prática e elegante para salas de estar, escritórios ou quartos, adicionando um toque de charme rústico ou moderno ao ambiente.", "armario3.png", "25", "188.99", "0","2");

?>


