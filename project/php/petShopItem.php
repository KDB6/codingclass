<?php
    include "../connect/connect.php";

    $petShopID = $_GET['page'];

    $shopSql = "SELECT * FROM petShop WHERE petShopID = '{$petShopID}'";
    $shopResult = $connect -> query($shopSql);

    $shopInfo = $shopResult -> fetch_array(MYSQLI_ASSOC);
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

    <style>
        .petShopInfo__inner {
            margin-top: 10px;
            display: flex;
        }

        .itemInfo {
            padding-top: 60px;
        }

        .itemImg figure > img {
            width: 100%;
            height: 500px;
        }
        .itemInfo_name > h3 {
            font-size: 24px;
            color: #505050;
        }
        .itemInfo_name > h2 {
            font-size: 40px;
            color: #505050;
        }
        .itemInfo_name > p {
            font-size: 16px;
            color: #505050;
        }
        .itemInfo_name > h4 {
            margin-top: 15px;
            font-size: 20px;
            color: #6CC4B3;
        }

        .itemInfo__review {
            margin-top: 30px;
            width: 670px;
            border-top: 1px solid #cecece;
            border-bottom: 1px solid #cecece;
            display: flex;
            padding: 15px 0;    
        }
        .itemInfo__review > h3 {
            font-size: 16px;
            color: #505050;
            margin-left: 30px;
        }
        .star > img {
            width: 100px;
            height: 20px;
        }
        .itemInfo__link {
            margin-top: 30px;
        }
        .itemInfo__link > h2 {
            font-size: 16px;
            color: #505050;
            margin-bottom: 10px;
        }
        .itemInfo__link > p {
            font-size: 14px;
            color: #505050;
            margin-top: 1px;
        }
        .item__btn {
            display: flex;
            margin-top: 10px;
        }
        .item__btn > h2 {
            font-size: 16px;
            color: #6CC4B3 !;
            background: #F9FAFB;
            padding: 10px 126px;
        }
        .item__btn > h2 a{
            color: #6CC4B3;
        }
        .item__btn > h2:last-child {
            margin-left: 20px;
        }
    </style>
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

    <!-- petShopInfo -->
    <section id="petShopInfo">
        <div class="petShopInfo__inner container">
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
                    <h4><?=$shopInfo['shopItemSubEx']?></h4>
                </div>
                <div class="itemInfo__review">
                    <div class="star">
                        <img src="../asset/img/star.svg" alt="별점">
                    </div>
                    <!-- <h3>Review 3건</h3> -->
                </div>
                <div class="itemInfo__link">
                    <h2>Link</h2>
                    <p><em></em><?=$shopInfo['shopItemLink01']?></p>
                    <p><?=$shopInfo['shopItemLink02']?></p>
                    <p><?=$shopInfo['shopItemLink03']?></p>
                    <p><?=$shopInfo['shopItemLink04']?></p> 
                </div>
                <div class="item__btn">
                    <h2><a href="#">장바구니</a></h2>
                    <h2><a href="#">최저가 이동</a></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- //petShopInfo -->

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
                            <img src="../asset/img/petshop/<?=$shopInfo['shopImgFile']?>" alt="상품사진">
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