<?php
    $host = "localhost";
    $user = "leesh0505";
    $pass = "gkrtks12!";
    $db = "leesh0505";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    // if(mysqli_connect_errno()){
    //     echo "Database Connect False";
    // } else {
    //     echo "Database Connect True";
    // }


?>