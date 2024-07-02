<?php include_once 'header.php'; 
require_once 'includes/functions.php';
require_once 'includes/bdconnect.inc.php';?>


<main>
    <div>
        <form id="hover-pra-cadeira-de-graca" class="formizinho" action="includes/login.inc.php" method="post">
                <h1>Login</h1>
                <div class="dentro-box">
                    <div class="insiraTelefone espaçamento">
                        <label>NickName</label>
                        <input type="tel" name="uid">
                    </div>
                    <div class="insiraPassword espaçamento">
                        <label>Password</label>
                        <input type="password" name="pwd">
                    </div>
                    <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=="emptyinput"){
                            echo '<p id="hover-pra-cadeira-de-graca-branco">Preencha todos os campos</p>';
                        }
                        if($_GET["error"]=="LoginErrado"){
                            echo '<p id="hover-pra-cadeira-de-graca-branco">Login Errado</p>';
                        }

                    }

                    ?>
                    <button type="submit" name="submit" class="alterar-botao">Enviar</button>                    
                </div>
            </form>

    </div>
</main>




<?php include_once 'footer.php'; ?>