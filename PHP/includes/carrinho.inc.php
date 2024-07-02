<?php
if (isset($_POST["adicionar"])) {
    if (isset($_SESSION["userId"])) {
        $userId = $_SESSION["userId"];
        $moveisId = $_POST["moveisId"];
        $quantidade = 1; // Defina a quantidade conforme necessário

        adicionarAoCarrinho($conn, $userId, $moveisId, $quantidade);
        header("location: ../detalheMoveis.php?id=$moveisId&status=added");
    } else {
        header("location: ../login.php");
    }
    exit();
}
?>