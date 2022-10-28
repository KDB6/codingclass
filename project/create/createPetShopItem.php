<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE petShopItem (";
    $sql .=     "petShopItemID int(10) unsigned auto_increment,";
    $sql .=     "shopItemBrand varchar(50) NOT NULL,";
    $sql .=     "shopItemItemName varchar(50) NOT NULL,";
    $sql .=     "shopItemItemTopEx varchar(50) NOT NULL,";
    $sql .=     "shopItemItemLink01 longtext NOT NULL,";
    $sql .=     "shopItemItemLink02 longtext NOT NULL,";
    $sql .=     "shopItemItemLink03 longtext NOT NULL,";
    $sql .=     "shopItemItemLink04 longtext NOT NULL,";
    $sql .=     "shopItemBotEx01 varchar(200) DEFAULT NULL,";
    $sql .=     "shopItemBotEx02 varchar(200) DEFAULT NULL,";
    $sql .=     "shopItemBotEx03 varchar(200) DEFAULT NULL,";
    $sql .=     "shopItemBotEx04 varchar(200) DEFAULT NULL,";
    $sql .=     "shopItemBotEx05 varchar(200) DEFAULT NULL,";
    $sql .=     "PRIMARY KEY (petShopItemID)";
    $sql .=     ") charset=utf8;";

    $connect -> query($sql);
?>  