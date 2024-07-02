<?php

if(isset($_POST['submit'])){
    //echo "está a funcionar";

    $uid= $_POST['uid'];
    $pwd= $_POST['pwd'];


require_once 'functions.php';
require_once 'bdconnect.inc.php';


if(emptyInputLogin($uid, $pwd)!== false){
    header("location: ../login.php?error=emptyinput");
    exit();
}


    loginUser($conn, $uid, $pwd);


}else{
    header("location: ../registo.php");
    exit();
}