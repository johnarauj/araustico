<?php 
include_once 'header.php'; 
require_once 'includes/functions.php';
require_once 'includes/bdconnect.inc.php';

$user_id = $_SESSION['userId'];  // Assumindo que o ID do usuário está armazenado na sessão

$sql = "SELECT cart.*, moveis.moveisNome, moveis.moveisValor, moveis.moveisimage FROM cart JOIN moveis ON cart.moveis_id = moveis.moveisId WHERE cart.user_id = ?";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "SQL statement failed";
    exit();
}

mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$resultData = mysqli_stmt_get_result($stmt);


echo '<div class="listagem-cadeiras">
        <table class="aumentar-table">
            <thead>
                <tr>
                    <td>
                        <h1 id="hover-pra-cadeira-de-graca">Bem vindo ao carrinho, '.$_SESSION["userName"].'</h1>
                        <p id="hover-pra-cadeira-de-graca"><a href="index.php" class="volta-homepage">Homepage</a> - Carrinho</p>';
                        if (isset($_GET['removal']) && $_GET['removal'] == 'success') {
                            echo '<br><p id="margem-10">Produto removido com sucesso!</p>';
                        }
                echo    '</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="So-pra-margem">
                        <div id="listagem-cadeiras">';


$total = 0;


while ($row = mysqli_fetch_assoc($resultData)) {
    $subtotal = $row['moveisValor'] * $row['quantity'];
    $total += $subtotal;
    echo "<div>
                <a class='divs-da-listagem' href='detalhemoveis.php?id=" . $row['moveis_id'] . "'>
                    <img src='../img/" . $row['moveisimage'] . "' alt='' id='cadeira-da-listagem'>
                    <p id='hover-pra-cadeira-de-graca'><strong>" . $row['moveisNome'] . "</strong></p>
                    <p id='hover-pra-cadeira-de-graca'>Qtd: " . $row['quantity'] . "</p>
                    <p>" . $subtotal . "  €</p>
                    <form action='includes/removes_from_cart.inc.php' method='post'>
                        <input type='hidden' name='moveis_id' value='" . $row['moveis_id'] . "'>
                        <button type='submit' name='submit' class='alterar-botao'>Remover</button>
                    </form>
                </a>
          </div>";
                                 
}
echo "</div>
</td>
</tr>
</tbody>
</table>
</div>
<br><p id='margem-10'>Total: " . $total . " €</p>";
?>
