<?php

if(isset($_POST['submit'])){
    //echo "está a funcionar";

    $moveisId= $_POST['moveisId'];
    $moveisCodigo= $_POST['moveisCodigo'];
    $moveisNome= $_POST['moveisNome'];
    $moveisCaract= $_POST['moveisCaract'];
    $moveisDisp= $_POST['moveisDisp'];
    $moveisValor= $_POST['moveisValor'];

require_once 'functions.php';
require_once 'bdconnect.inc.php';


if(emptyInputMoveis($moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp)!== false){
    header("location: ../inserirMoveis.php?error=emptyinput");
    exit();
}
    

    //echo $moveisCodigo; die();  
    insertMoveis($conn, $moveisValor, $moveisCodigo, $moveisNome, $moveisCaract, $moveisDisp);
    //echo "ola"; die();  

}else{
    header("location: ../index.php");
    exit();
}