<?php
    $host = "localhost";
    $user = "piowm123";
    $pw = "dlwpsqjflwk0!";
    $db = "piowm123";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf8");
    if(mysqli_connect_errno()){
        echo "database connect false";
    } else {
        echo "database connect true";
    }
?>