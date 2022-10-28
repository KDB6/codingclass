<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE petShopMain (";
    $sql .=     "petShopID int(10) unsigned auto_increment,";
    $sql .=     "bestBrand varchar(50) NOT NULL,";
    $sql .=     "bestName varchar(50) NOT NULL,";
    $sql .=     "bestPrice varchar(50) NOT NULL,";
    $sql .=     "categoeyBrand varchar(150) DEFAULT NULL,";
    $sql .=     "categoryName varchar(50) DEFAULT NULL,";
    $sql .=     "categoryPrice varchar(500) DEFAULT NULL,";
    $sql .=     "shopImgFile varchar(100) DEFAULT NULL,";
    $sql .=     "PRIMARY KEY (petShopID)";
    $sql .=     ") charset=utf8;";

    $connect -> query($sql);
?>  