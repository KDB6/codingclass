<?php
    include "../connect/connect.php";
    
    $bestBrand = $_POST["bestBrand"];
    $bestName = $_POST["bestName"];
    $bestPrice = $_POST["bestPrice"];
    $categoeyBrand = $_POST["categoeyBrand"];
    $categoryName = $_POST['categoryName'];
    $categoryPrice = $_POST["categoryPrice"];
    $shopImgFile = $_FILES['shopImgFile'];
    $shopImgSize = $_FILES['shopImgFile']['size'];
    $shopImgType = $_FILES['shopImgFile']['type'];
    $shopImgName = $_FILES['shopImgFile']['name'];
    $shopImgTmp = $_FILES['shopImgFile']['tmp_name'];

    $fileTypeExtension = explode("/", $shopImgType);
    $fileType = $fileTypeExtension[0];      //image
    $fileExtension = $fileTypeExtension[1]; //png

    //이미지 타입 확인
    if($fileType == "image"){
        if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
            $petShopImgDir = "../asset/img/petshop/";
            $petShopImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";
            // echo "이미지 파일이 맞네요!";
            $sql = "INSERT INTO petshop SET bestBrand = '{$bestBrand}', bestName = '{$bestName}' , bestPrice = '{$bestPrice}',
                categoeyBrand = '{$categoeyBrand}', categoryName = '{$categoryName}', categoryPrice = '{$categoryPrice}'
                ";
        }
    }
    echo $sql;

    $result = $connect -> query($sql);
    $result = move_uploaded_file($shopImgTmp, $petShopImgDir.$petShopImgName);


    // Header("Location: main.php");    

?>