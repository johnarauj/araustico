<?php include_once 'header.php'; 
require_once 'includes/functions.php';
require_once 'includes/bdconnect.inc.php';?>


<main>
    <div>
        <form id="hover-pra-cadeira-de-graca" class="formizinho" action="includes/registo.inc.php" method="post">
                <h1>Cadastre-se</h1>
                <div class="dentro-box">
                    <div class="insiranome">
                        <label>Nome</label>
                        <input type="text" required placeholder="Insira seu nome..." name="nome">
                    </div>
                    <div class="Insiraemail espaçamento">
                        <label>Email</label>
                        <input type="email" required placeholder="Insira seu email..." name="email">
                    </div>
                    <div class="insiraTelefone espaçamento">
                        <label>NickName</label>
                        <input type="tel" name="uid">
                    </div>
                    <div class="insiraPassword espaçamento">
                        <label>Password</label>
                        <input type="password" name="pwd">
                    </div>
                    <div class="insiraPassword espaçamento">
                        <label>Repeat Password</label>
                        <input type="password" name="pwdrepeat">
                    </div>
                    <div class="vendcomp espaçamento">
                        <label>
                            <input type="radio" name="usuario" value="1"checked>Vendedor
                        </label>
                        <p><label>
                            <input type="radio" name="usuario" value="0">Comprador
                        </label></p>
                    </div>
                    <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=="emptyinput"){
                            echo '<p id="hover-pra-cadeira-de-graca-branco">Pf preencha todos os campos</p>';
                        }
                        if($_GET["error"]=="passnotmatch"){
                            echo '<p id="hover-pra-cadeira-de-graca-branco">As passwords não são iguais</p>';
                        }
                        if($_GET["error"]=="invalidUid"){
                            echo '<p id="hover-pra-cadeira-de-graca-branco">Username não permitido</p>';
                        }
                        if($_GET["error"]=="invalidEmail"){
                            echo '<p id="hover-pra-cadeira-de-graca-branco">Email invalido</p>';
                        }
                        if($_GET["error"]=="userEmailTaken"){
                            echo '<p id="hover-pra-cadeira-de-graca-branco">Este email já está sendo utilizado</p>';
                        }
                        if($_GET["error"]=="stmtfailedUid"){
                            echo '<p id="hover-pra-cadeira-de-graca-branco">Erro Ligacao BD</p>';
                        }
                        if($_GET["error"]=="stmtfailedUSER"){
                            echo '<p id="hover-pra-cadeira-de-graca-branco">Erro Ligacao BD</p>';
                        }
                        if($_GET["error"]=="none"){
                            echo '<p id="hover-pra-cadeira-de-graca-branco">Utilizador registado com sucesso!</p>';
                        }
                    }

                    ?>
                    <button type="submit" name="submit" class="alterar-botao">Cadastrar</button>
                </div>
            </form>

    </div>
</main>




<?php include_once 'footer.php'; ?>