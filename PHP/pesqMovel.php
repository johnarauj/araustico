<?php
include_once 'header.php'; 
require_once 'includes/functions.php';
require_once 'includes/bdconnect.inc.php';
?>

<div class="listagem-cadeiras">
    <table class="aumentar-table">
        <thead>
            <tr>
                <td>
                    <h1 id="hover-pra-cadeira-de-graca">Lista Pesquisa</h1>
                    <p id="hover-pra-cadeira-de-graca"><a href="index.php" class="volta-homepage">Homepage</a> - Produtos encontrados</p>
                    <form action="pesqMovel.php" method="POST">
                                <input id="margem-10" type="text" name="keywords" class="search" placeholder="Pesquise aqui...">
                                <button type="submit" class="search" name="submit" id="alterar-botao-pesquisar">pesquisar</button>
                            </form>
                    <?php
                    $keywords = isset($_POST["keywords"]) ? $_POST["keywords"] : '';

                    // Verifica se o campo de busca está vazio
                    if (empty($keywords)) {
                        echo '<br><p id="margem-10">Por favor, insira um termo de busca.</p>';
                    } else {
                        $listar = search($conn, $keywords);
                        // Verifica se a consulta foi bem-sucedida e se houve resultados
                        if ($listar !== false) {
                            if (is_array($listar) && count($listar) === 0) {
                                echo '<br><p id="margem-10">Não foram encontrados produtos.</p>';
                            } else {
                              ?>
                        </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="So-pra-margem">
                        <div id="listagem-cadeiras">
                          <?php
                                $resultsFound = false;
                                while ($lista = mysqli_fetch_assoc($listar)) {
                                    $resultsFound = true;
                                    ?>
                                    <div>
                                        <a class="divs-da-listagem" href="detalhemoveis.php?id=<?=$lista['moveisId'];?>">
                                            <img src="../img/<?=$lista['moveisimage'];?>" alt="" id="cadeira-da-listagem">
                                            <p id="hover-pra-cadeira-de-graca"><strong><?=$lista['moveisNome'];?></strong></p>
                                            <p><?=$lista['moveisValor'];?> €</p>
                                        </a>
                                    </div>
                                    <?php
                                }
                                if (!$resultsFound) {
                                  
                                    echo '<br><p id="margem-10">Não foram encontrados produtos.</p>';
                                }
                            }
                        } else {
                            echo '<p id="margem-10">Ocorreu um erro ao realizar a pesquisa.</p>';
                        }
                    }
                    ?>
                </td>
            </tr>
        </thead>
    </table>
</div>

<?php include_once 'footer.php'; ?>
