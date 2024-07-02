<?php include_once 'header.php'; ?>


<main>
            <div class="carrossel">
                <img src="img/carrossel1.png" alt="" class="carrossel-imagem">
            </div>
            <div id="abaixo-carrossel">
                <table>
                    <tr>
                        <td>
                            <img src="img/novo 2.png" alt="" class="imagem-2">
                        </td>
                        <td>
                            <table id="Cadeira-simples-e-Texto">
                                <thead>
                                    <tr>
                                        <td>
                                            <img src="img/cadeira sem fundo_2.png" alt="" class="imagem-3">
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="embaixo-cadeira-Texto" id="hover-pra-cadeira-de-graca">
                                                <strong>Cadeira pé de Pano</strong>
                                                <p>200€</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="abaixo-abaixo-carrossel">
                <table>
                    <tr>
                        <td>
                            <table id="Cadeira-simples-e-Texto-abaixo-abaixo">
                                <thead>
                                    <tr>
                                        <td>
                                            <img src="img/cadeira sem fundo_2.png" alt="" class="imagem-3">
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="embaixo-cadeira-Texto" id="hover-pra-cadeira-de-graca">
                                                <strong>Cadeira Pano de pé</strong>
                                                <p>400€</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <img src="img/novo 1.png" alt="" class="imagem-2">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="Terceira-div-homepage">
                <ul>
                    <?php
                    $mostrar = favMoveis($conn);
                    if ($mostrar) {
                        foreach ($mostrar as $lista) {
                            ?>
                            <li id="abc">
                                <div>
                                    <a class="divs-da-listagem" href="detalheMoveis.php?id=<?=$lista['moveisId'];?>">
                                        <img src="img/<?=$lista['moveisimage'];?>" alt="" id="cadeira-da-listagem">
                                        <p id="hover-pra-cadeira-de-graca"><strong><?=$lista['moveisNome'];?></strong></p>
                                        <p><?=$lista['moveisValor'];?>  €</p>
                                    </a>
                                </div>
                            </li>
                                <?php
                                }
                            } else {
                                echo "<p>Não foram encontrados produtos.</p>";
                            }
                        ?>
                </ul>
            </div>
        </main>




<?php include_once 'footer.php'; ?>