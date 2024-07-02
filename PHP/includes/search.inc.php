<?php
function search($conn, $keywords) {
    $search = mysqli_real_escape_string($conn, $keywords);

    $sql = "SELECT * FROM moveis WHERE moveisCodigo LIKE '%$keywords%' OR moveisNome LIKE '%$keywords%'";

    if ($resultData = mysqli_query($conn, $sql)) {
        // Checar se há resultados
        if (mysqli_num_rows($resultData) > 0) {
            return $resultData;
        } else {
            return []; // Retornar array vazio se não houver resultados
        }
    } else {
        return false;
    }
}
?>