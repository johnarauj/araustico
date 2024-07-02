<?php
session_start();
?>
<?php 
include_once 'header.php'; 
require_once 'includes/functions.php';
require_once 'includes/bdconnect.inc.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <title>HomePage</title>
    <link rel="stylesheet" href="../css/main4.css">
    <link rel="stylesheet" href="../css/foter.css">
    <link rel="stylesheet" href="../css/mart2.css">
    <link rel="stylesheet" href="../css/cadeira5.css">
    <link rel="stylesheet" href="../css/Sobrenos7.css">
    <link rel="stylesheet" href="../css/detalhe4.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="header">
                <div class="logo">
                    <a href="../index.php">
                        <img src="../img/logo branco vertical sem fundo.png" class="header-logo" alt="">
                    </a>
                </div>
                <nav class="nav-header">
                    <ul>
                        <li class="dropdown">
                            <a href="moveis.php?Tipo=0" class="alterar-letra aheader">Cadeiras</a>
                        </li>
                        <li>
                            <a href="moveis.php?Tipo=1" class="alterar-letra aheader">Mesas</a>
                        </li>
                        <li>
                            <a href="moveis.php?Tipo=2" class="alterar-letra aheader">Armários</a>
                        </li>
                        <?php
                            if(isset($_SESSION["userName"])){
                                echo '<li class="alterar-letra"><a href="includes/logout.inc.php" class="alterar-letra aheader">Olá, '.$_SESSION["userName"].'/Logout</a></li>';
                                echo '<li class="carrinho"><a href="cart.php"><img src="../img/shopping_cart_white.png" alt=""></a></li>';
                            }else{
                                echo '<li><a href="registo.php" class="alterar-letra aheader">Registar</a></li>';
                                echo '<li><a href="login.php" class="alterar-letra aheader">Login</a></li>';
                            }
                        ?>
                        
                    </ul>
                </nav>
                <div class="mobile-menu-icon">
                    <button onclick="menuShow()"><img id="3icon" src="../img/menu_white_36dp.svg" alt=""></button>
                </div>
                <div class="mobile-menu">
                    <ul>
                        <li class="nav-item">
                            <a href="" class="alterar-letra">Cadeiras</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="alterar-letra">Mesas</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="alterar-letra">Armários</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="alterar-letra">Poltronas/sofás</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>