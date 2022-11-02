<?php
    $host = "localhost";
    $user = "ipkg72102";
    $pw = "kdb7913!";
    $db = "ipkg72102";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf8");
    if(mysqli_connect_errno()){
        echo "database connect false";
    } else {
        echo "database connect true";
    }
?>