<?php
    include "../connect/connect.php";

    $shopID = $_GET['page'];

    $shopSql = "SELECT * FROM petShop WHERE petShopID = '{$petShopID}'";
    $ShopResult = $connect -> query($shopSql);

    $shopInfo = $ShopResult -> fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>펫샵 상세보기</title>

    <link rel="stylesheet" href="../asset/css/common.css">
    <link rel="stylesheet" href="../asset/css/font.css">
    <link rel="stylesheet" href="../asset/css/reset.css">
    <link rel="stylesheet" href="../asset/css/butler.css">

    <link rel="stylesheet" href="../asset/css/petShop/petShopItemCate.css">
    <link rel="stylesheet" href="../asset/css/petShop/shopInfo.css">
    <link rel="stylesheet" href="../asset/css/petShop/itemExplanation.css">
</head>
<body>
    <!-- header -->
    <?php include "../include/header.php"?>
    <!-- //header -->

    <!-- petShopItem category -->
    <section id="petShopItemCate">
        <div class="petShopItemCate__inner container">
            <ul class="itemCate">
                <li class="butler800 cateOne"><a href="#">CATEGORY</a></li>
                <li><a href="#">의류 / 악세서리</a></li>
                <li><a href="#">미용 / 케어</a></li>
                <li><a href="#">배변 / 위생</a></li>
                <li><a href="#">간식 / 영양제</a></li>
                <li><a href="3">산책 / 놀이</a></li>
                <li><a href="#">목욕</a></li>
            </ul>
        </div>
    </section>
    <!-- //petShopItem category -->

    <!-- shopInfo -->
    <section id="shopInfo">
        <div class="shopInfo__inner container">
            <div class="itemImg">
                <figure>
                <img src="../asset/img/petshop/<?=$shopInfo['shopImgFile']?>" alt="상품사진">
                </figure>
            </div>
            <div class="itemInfo">
                <div class="itemInfo_name">
                    <h3 class="butler800"><?=$shopInfo['shopBrand']?></h3>
                    <h2 class="butler800"><?=$shopInfo['shopItemName']?></h2>
                    <p><?=$shopInfo['shopItemMainEx']?></p>
                    <h4><?=$shopInfo['shopItemPrice']?></h4>
                </div>
                <div class="itemInfo__review">
                    <div class="star">
                        <img src="../asset/img/star.svg" alt="별점">
                    </div>
                    <!-- <h3>Review 3건</h3> -->
                </div>
                <div class="itemInfo__link">
                    <h2>Link</h2>
                    <p><a href="#"><?=$shopInfo['shopItemLink01']?></a></p>
                    <p><a href="#"><?=$shopInfo['shopItemLink02']?></a></p>
                    <p><a href="#"><?=$shopInfo['shopItemLink03']?></a></p>
                    <p><a href="#"><?=$shopInfo['shopItemLink04']?></a></p> 
                </div>
                <div class="item__btn">
                    <h2><a href="#">장바구니</a></h2>
                    <h2><a href="#">최저가 이동</a></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- //shopInfo -->

    <!-- itemExplanation -->
    <section id="itemExplanation">
        <div class="line"></div>
        <div class="itemExplanation__inner container">
            <div class="explanation__cate">
                <ul class="">
                    <li><a href="#">Information</a></li>
                    <li><a href="#">Link</a></li>
                    <!-- <li><a href="#">Review</a></li> -->
                </ul>
            </div>
            <div class="Explanation__info">
                    <div class="Explanation__img">
                        <div class="Explanation__desc">
                            <h3 class="butler800"><?=$shopInfo['shopBrand']?></h3>
                            <h2 class="butler800"><?=$shopInfo['shopItemName']?></h2>
                            <h4><?=$shopInfo['shopItemMainEx']?></h4>
                            <p><?=$shopInfo['shopItemSubEx']?></p>
                        </div>
                    </div>
                    <div class="Explanation__more">
                        <h2><?=$shopInfo['shopItemEx01']?></h2>
                        <h2><?=$shopInfo['shopItemEx02']?></h2>
                        <h3><?=$shopInfo['shopItemEx03']?></h3>
                        <p><?=$shopInfo['shopItemEx04']?></p>
                    </div>
                </figure>
            </div>
        </div>
    </section>
    <!-- //itemExplanation -->

    <!-- header -->
    <?php include "../include/footer.php"?>
    <!-- //header -->

    
</body>
</html>