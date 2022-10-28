<?php
    include "../connect/connect.php";
    
    $shopItemBrand = $_POST["shopItemBrand"];
    $shopItemItemName = $_POST["shopItemItemName"];
    $shopItemItemTopEx = $_POST["shopItemItemTopEx"];
    $shopItemItemLink01 = $_POST["shopItemItemLink01"];
    $shopItemItemLink02 = $_POST['shopItemItemLink02'];
    $shopItemItemLink03 = $_POST["shopItemItemLink03"];
    $shopItemItemLink04 = $_POST['shopItemItemLink04'];
    $shopItemBotEx01 = $_POST['shopItemBotEx01'];
    $shopItemBotEx02 = $_POST['shopItemBotEx02'];
    $shopItemBotEx03 = $_POST['shopItemBotEx03'];
    $shopItemBotEx04 = $_POST['shopItemBotEx04'];
    $shopItemBotEx05 = $_POSTs['shopItemBotEx05'];
    $shopItemImgFile = $_FILES['shopItemImgFile'];
    $shopImgSize = $_FILES['shopItemImgFile']['size'];
    $shopItemImgType = $_FILES['shopItemImgFile']['type'];
    $shopItemImgName = $_FILES['shopItemImgFile']['name'];
    $shopItemImgTmp = $_FILES['shopItemImgFile']['tmp_name'];

    $fileTypeExtension = explode("/", $shopItemImgType);
    $fileType = $fileTypeExtension[0];      //image
    $fileExtension = $fileTypeExtension[1]; //png

    //이미지 타입 확인
    if($fileType == "image"){
        if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
            $petShopItemImgDir = "../asset/img/petshopItem/";
            $petShopItemImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
            // echo "이미지 파일이 맞네요!";
            $sql = "INSERT INTO petshopItem SET shopItemBrand = '{$shopItemBrand}', shopItemItemName = '{$shopItemItemName}' , shopItemItemTopEx = '{$shopItemItemTopEx}',
                shopItemItemLink01 = '{$shopItemItemLink01}', shopItemItemLink02 = '{$shopItemItemLink02}', shopItemItemLink03 = '{$shopItemItemLink03}',
                shopItemItemLink04 = '{$shopItemItemLink04}', shopItemBotEx01 = '{$shopItemBotEx01}', shopItemBotEx02 = '{$shopItemBotEx02}',
                shopItemBotEx03 = '{$shopItemBotEx03}', shopItemBotEx04 = '{$shopItemBotEx04}', shopItemBotEx05 = '{$shopItemBotEx05}',
                ";
        }
    }
    echo $sql;

    $result = $connect -> query($sql);
    $result = move_uploaded_file($shopItemImgTmp, $petShopItemImgDir.$petShopItemImgName);


    // Header("Location: main.php");    

?>