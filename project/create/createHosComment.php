<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE HosComment (";
    $sql .= "HosCommentID int(10) unsigned NOT NULL auto_increment,";
    $sql .= "myMemberID int(10) unsigned NOT NULL,";
    $sql .= "HosID int(10) unsigned NOT NULL,";
    $sql .= "commentName varchar(30) NOT NULL,";
    $sql .= "commentMsg varchar(255) NOT NULL,";
    $sql .= "commentPass varchar(20) NOT NULL,";
    $sql .= "commentDelete int(10) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (HosCommentID)";
    $sql .= ") charset=utf8;";

    $connect -> query($sql);   
        
    
?>