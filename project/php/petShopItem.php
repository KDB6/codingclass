<?php
    include "../connect/connect.php";
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
    <link rel="stylesheet" href="../asset/css/petShop/petShopInfo.css">
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

    <!-- petShopInfo -->
    <section id="petShopInfo">
        <div class="petShopInfo__inner container">
            <div class="itemImg">
                <figure>
                    <img src="../asset/img/shopItem.jpg" alt="상품사진">
                </figure>
            </div>
            <div class="itemInfo">
                <div class="itemInfo_name">
                    <h3 class="butler800">Brand</h3>
                    <h2 class="butler800">DOG CUSHION</h2>
                    <p>반려견에게 아늑함을 전해주세요.</p>
                    <h4>78,000원</h4>
                </div>
                <div class="itemInfo__review">
                    <div class="star">
                        <img src="../asset/img/star.svg" alt="별점">
                    </div>
                    <h3>Review 3건</h3>
                </div>
                <div class="itemInfo__link">
                    <h2>Link</h2>
                    <p><em></em><a href="#">https://www.petitem.com/</a></p>
                    <p><a href="#">https://www.petitem.com/</a></p>
                    <p><a href="#">https://www.petitem.com/</a></p>
                    <p><a href="#">https://www.petitem.com/</a></p> 
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
                    <li><a href="#">Review</a></li>
                </ul>
            </div>
            <div class="Explanation__info">
                    <div class="Explanation__img">
                        <div class="Explanation__desc">
                            <h3 class="butler800">Brand</h3>
                            <h2 class="butler800">DOG CUSHION</h2>
                            <h4>반려견에게 아늑함을 전해주세요.</h4>
                            <p>반려견들을 위한 푹신한 새로운 쿠션을 출시했습니다.</p>
                        </div>
                    </div>
                    <div class="Explanation__more">
                        <h2>이 담요는 아이들이 덮고 자기에 부드러운 담요입니다.</h2>
                        <h2>침대, 쇼파, 자동차 등 어디에서나 유용하게 사용할 수 있습니다.</h2>
                        <h3>Size S <em>45 x 65</em></h3>
                        <h3>Size M <em>60 x 80</em></h3>
                        <h3>Size L <em>100 x 120</em></h3>
                        <p>재질 : Viscose, polyester</p>
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