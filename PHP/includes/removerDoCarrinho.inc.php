<?php
session_start();
require_once 'bdconnect.inc.php';
require_once 'functions.php';

if (isset($_POST["remover"])) {
    if (isset($_SESSION["userId"])) {
        $userId = $_SESSION["userId"];
        $moveisId = $_POST["moveisId"];

        removerDoCarrinho($conn, $userId, $moveisId);
        header("location: ../carrinho.php?status=removed");
    } else {
        header("location: ../login.php");
    }
    exit();
}
?>
