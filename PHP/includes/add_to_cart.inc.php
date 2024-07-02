<?php
session_start();
require_once 'bdconnect.inc.php';

if (isset($_POST['add_to_cart'])) {
    $user_id = $_SESSION['userId'];  // Assumindo que o ID do usuário está armazenado na sessão
    $moveis_id = $_POST['moveisId'];
    $quantity = $_POST['quantity'];

    //echo $moveis_id; die();  

    // Verifica se o produto existe na tabela moveis
    $sql = "SELECT * FROM moveis WHERE moveisId = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../moveis.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $moveis_id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if (!$row = mysqli_fetch_assoc($resultData)) {
        // Se o moveis_id não existir, redirecione com um erro
        header("location: ../moveis.php?error=invalidproduct");
        exit();
    }

    mysqli_stmt_close($stmt);

    // Verifica se o item já está no carrinho
    $sql = "SELECT * FROM cart WHERE user_id = ? AND moveis_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../moveis.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ii", $user_id, $moveis_id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        // Se o produto já está no carrinho, atualiza a quantidade
        $new_quantity = $row['quantity'] + $quantity;
        $sql = "UPDATE cart SET quantity = ? WHERE user_id = ? AND moveis_id = ?";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../moveis.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "iii", $new_quantity, $user_id, $moveis_id);
        mysqli_stmt_execute($stmt);
    } else {
        // Se o produto não está no carrinho, insere um novo registro
        $sql = "INSERT INTO cart (user_id, moveis_id, quantity) VALUES (?, ?, ?)";
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../moveis.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "iii", $user_id, $moveis_id, $quantity);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    header("location: ../cart.php");
    exit();
}
?>
