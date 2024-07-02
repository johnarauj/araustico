<?php
require_once 'bdconnect.inc.php';
require_once 'functions.php';
require_once '../header.php';

if (isset($_POST['submit'])) {
    $moveis_id = $_POST['moveis_id'];
    $user_id = $_SESSION["userId"];  // Assumindo que o ID do usuário está armazenado na sessão

    $sql = "DELETE FROM cart WHERE moveis_id = ? AND user_id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL statement failed";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ii", $moveis_id, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../cart.php?removal=success");
    exit();
} else {
    header("location: ../cart.php");
    exit();
}
?>
