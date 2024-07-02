<?php

if(isset($_POST['submit'])){
    //echo "está a funcionar";

    $nome= $_POST['nome'];
    $email= $_POST['email'];
    $uid= $_POST['uid'];
    $pwd= $_POST['pwd'];
    $pwdRepeat= $_POST['pwdrepeat'];
    $dom=$_POST['usuario'];

  

require_once 'functions.php';
require_once 'bdconnect.inc.php';


if(emptyInputRegisto($nome, $email, $uid, $pwd, $pwdRepeat)!== false){
    header("location: ../registo.php?error=emptyinput");
    echo "olá1";
    exit();
}

if(pwdMatch($pwd, $pwdRepeat)!== false){
    header("location: ../registo.php?error=passnotmatch");
    echo "olá2";
    exit();
}

if(invalidUid($uid)!== false){
    header("location: ../registo.php?error=invalidUid");
    echo "olá3";
    exit();
}

if(invalidEmail($email)!== false){
    header("location: ../registo.php?error=invalidEmail");
    echo "olá4";
    exit();
}

if(uidExists($conn, $uid, $email)!== false){
    header("location: ../registo.php?error=userEmailTaken");
    echo "olá5";
    exit();
}

createUser($conn, $nome, $email, $uid, $pwd, $dom);
//echo "ola"; die();  

}else{
    header("location: ../registo.php");
    exit();
}