<?php

if(isset($_POST['submit'])){
    //echo "está a funcionar";

    $moveisId= $_POST['moveisId'];

require_once 'functions.php';
require_once 'bdconnect.inc.php';

    if(empty($moveisId)){
        header("location: ../index.php?error=noID");
    exit();
    }

    deleteMoveis($conn, $moveisId);
//echo "ola"; die();  

}else{
    header("location: ../index.php");
    exit();
}