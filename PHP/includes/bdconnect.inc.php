<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "araustico";

// Create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

//
if(!$conn){
    die("Falha de ligação: ". mysqli_connect_error());
}