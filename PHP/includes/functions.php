<?php

function listarMoveis($conn){
    $sql ="SELECT * FROM moveis";

    if($resultData = mysqli_query($conn, $sql)){
        return $resultData;
    }else{
        $result=false;
        return $result;
    }

}

function mostrarMoveis($conn, $Tipo){
    $sql ="SELECT * FROM moveis WHERE moveisTipo=$Tipo";

    if($resultData = mysqli_query($conn, $sql)){
        return $resultData;
    }else{
        $result=false;
        return $result;
    }

}

function favMoveis($conn){
    $sql ="SELECT * FROM moveis WHERE moveisFav=1";
    //Porque que funcionou desse jeito, e não igual estava em cima?
    if($resultData = mysqli_query($conn, $sql)){
        return $resultData;
    }else{
        $result=false;
        return $result;
    }

}

function detalheMoveis($conn, $id){
    $sql ="SELECT * FROM moveis WHERE moveisId = $id";
    $query= mysqli_query($conn, $sql);
    
    if($resultData = mysqli_fetch_assoc($query)){
        return $resultData;
    }else{
        $result=false;
        return $result;
    }
}

function emptyInputMoveis($moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp, $moveisTipo){
    $result=true;
    if(empty($moveisValor) || empty($moveisCodigo) || empty($moveisNome)|| empty($moveisCaract)|| empty($moveisDisp)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function insertMoveis($conn, $moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp){
    
    $sql = "INSERT INTO moveis (moveisValor, moveisCodigo, moveisNome, moveisCaract, moveisDisp) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);// prevenir MSQL injection com os prepared statments
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../inserirMoveis.php?error=stmtfailedUSER");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "sssss", $moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header ("location: ../inserirMoveis.php?error=updated");
    exit();
    }

function updateMoveis($conn, $moveisId, $moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp){
    
$sql = "UPDATE moveis SET moveisValor=?, moveisCodigo = ?, moveisNome = ?, moveisCaract = ?, moveisDisp =? WHERE moveisId =?;";
$stmt = mysqli_stmt_init($conn);// prevenir MSQL injection com os prepared statments

if(!mysqli_stmt_prepare($stmt, $sql)){
    header ("location: ../editarMoveis.php?error=stmtfailedUSER");
    exit();
}

mysqli_stmt_bind_param($stmt, "sssssi", $moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp, $moveisId);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header ("location: ../detalheMoveis.php?id=$moveisId&&error=updated");
exit();
}

function search($conn, $keywords){
    if (empty($keywords)) {
        return []; // Retorna array vazio se a string de busca estiver vazia
    }

    $search = mysqli_real_escape_string($conn, $keywords);

    $sql = "SELECT * FROM moveis WHERE moveisCodigo LIKE '%$keywords%' OR moveisNome LIKE '%$keywords%'";

    $resultData = mysqli_query($conn, $sql);

    if ($resultData) {
        // Verifica se há resultados
        if (mysqli_num_rows($resultData) > 0) {
            return $resultData;
        } else {
            return []; // Retorna array vazio se não houver resultados
        }
    } else {
        return false; // Retorna false em caso de erro na consulta
    }
}

function deleteMoveis($conn, $moveisId){

    $sql = "DELETE FROM moveis WHERE moveisId =?;";
    $stmt = mysqli_stmt_init($conn);// prevenir MSQL injection com os prepared statments
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../editarMovel.php?error=stmtfailedDELETE");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "i", $moveisId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header ("location: ../index.php?delete=Sucess");
    exit();
    
    }

function emptyInputRegisto($nome, $email,$uid, $pwd, $pwdRepeat){
    $result=true;
    if(empty($nome)|| empty($email) || empty($pwd) || empty($uid)|| empty($pwdRepeat)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat){
    $result=true;
    if($pwd !== $pwdRepeat){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidUid($uid){
    $result=true;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $uid)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){
    $result=true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function uidExists($conn, $uid, $email){

    $sql = "SELECT * FROM user WHERE userUid = ? OR userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);// prevenir MSQL injection com os prepared statments
    
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../registo.php?error=stmtfailedUid");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $uid, $email);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
}

function createUser($conn, $nome, $email, $uid, $pwd, $dom){

$sql = "INSERT INTO user (userName, userEmail, userUid, userPwd, userDom) Values(?,?,?,?,?);";
$stmt = mysqli_stmt_init($conn);// prevenir MSQL injection com os prepared statments

if(!mysqli_stmt_prepare($stmt, $sql)){
    header ("location: ../registo.php?error=stmtfailedUSER");
    exit();
}

$hasedPwd = password_hash($pwd, PASSWORD_DEFAULT);

mysqli_stmt_bind_param($stmt, "sssss", $nome, $email, $uid, $hasedPwd, $dom);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header ("location: ../registo.php?error=none");
exit();
}

function emptyInputLogin($uid, $pwd){
    $result=true;
    if(empty($pwd) || empty($uid)){
        $result=true;
    }else{
        $result=false;
    }
    return $result;
}

function loginUser($conn, $uid, $pwd){

    $uidExists = uidExists($conn, $uid, $uid);

    if($uidExists === false){
        header ("location: ../login.php?error=LoginErrado");
        exit();
    }

    //print_r($uidExists);
    //die();

    $pwdHased=$uidExists['userPwd'];
    $checkPwd = password_verify($pwd, $pwdHased); // esta função já faz o hash da password

    if($checkPwd === false){ 
        header ("location: ../login.php?error=LoginErrado");
        exit();
    }else if($checkPwd === true){ 
        session_start();
        //Porque aqui eu chamo o uidExists?
        $_SESSION["userId"] = $uidExists['userId'];
        $_SESSION["userName"] = $uidExists['userName'];
        $_SESSION["userDom"] = $uidExists['userDom'];
        header ("location: ../index.php");
        exit();
    }
}

function adicionarAoCarrinho($conn, $userId, $moveisId, $quantidade) {
    $sql = "INSERT INTO cart (userId, moveisId, quantidade) VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE quantidade = quantidade + VALUES(quantidade)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "iii", $userId, $moveisId, $quantidade);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


function removerDoCarrinho($conn, $userId, $moveisId) {
    $sql = "DELETE FROM cart WHERE userId = ? AND moveisId = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ii", $userId, $moveisId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function obterCarrinho($conn, $userId) {
    $sql = "SELECT c.moveisId, m.moveisNome, m.moveisValor, c.quantidade
            FROM cart c
            JOIN moveis m ON c.moveisId = m.moveisId
            WHERE c.userId = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $items = mysqli_fetch_all($resultData, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);

    return $items;
}






?>