<?php
    include "../connect/connect.php";


    $petMain = $_GET['page'];

    $petMainSql = "SELECT * FROM petShopMain WHERE petShopID = '{$petMain}'";
    $petMainResult = $connect -> query($petMainSql);

    $petMainInfo = $petMainResult -> fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>펫샵 메인 페이지</title>

    <link rel="stylesheet" href="../asset/css/common.css">
    <link rel="stylesheet" href="../asset/css/font.css">
    <link rel="stylesheet" href="../asset/css/reset.css">
    <link rel="stylesheet" href="../asset/css/butler.css">

    <link rel="stylesheet" href="../asset/css/petShop/shopSlider.css">
    <link rel="stylesheet" href="../asset/css/petShop/shopMini.css">
    <link rel="stylesheet" href="../asset/css/petShop/shopBest.css">
    <link rel="stylesheet" href="../asset/css/petShop/shopCategory.css">
    <link rel="stylesheet" href="../asset/css/petShop/shopItem.css">
</head>
<body>
    <!-- header -->
    <?php include "../include/header.php"?>
    <!-- //header -->
    
    <!-- shop slider -->
    <section id="shopSlider">
        <div class="shopSlider__wrap">
            <div class="shopSlider__img">
                <div class="shopSlider__inner">
                    <div class="shopSlider"><a href=""><img src="../asset/img/shopSlider01.jpg" alt="펫슬라이드01"></a>
                        <figcaption>
                            <h2 class="butler800">DOG CUSHION</h2>
                            <p>반려견에게 아늑함을 전해주세요.</p>
                        </figcaption>
                    </div>
                    <!-- <div class="slider"><img src="../../asset/img/shopSlider01.jpg" alt="펫슬라이드02"></div>
                    <div class="slider"><img src="../../asset/img/shopSlider01.jpg" alt="펫슬라이드03"></div>
                    <div class="slider"><img src="../../asset/img/shopSlider01.jpg" alt="펫슬라이드04"></div>
                    <div class="slider"><img src="../../asset/img/shopSlider01.jpg" alt="펫슬라이드05"></div> -->
                </div>
            </div>
            <div class="shopSlider__btn">
                <!-- <a href="#" class="prev">prev</a>
                <a href="#" class="next">next</a> -->
            </div>
            <div class="shopSlider__dot">
                <!-- <a href="#" class="dot active">image01</a>
                <a href="#" class="dot">image02</a>
                <a href="#" class="dot">image03</a>
                <a href="#" class="dot">image04</a>
                <a href="#" class="dot">image05</a> -->
            </div>
        </div>
    </section>
    <!-- //shop slider -->

    <!-- shopMini -->
    <section id="shopMini">
        <div class="shopMini__inner container">
            <div class="mini__img">
                <h2><a href="#">이런 상품은 어떠세요?</a></h2>
            </div>
        </div>
    </section>
     <!-- // shopMini -->

     <!-- shopBest -->
     <section id="shopBest">
        <div class="shopBest__inner container">
            <h2 class="butler800">BEST PICKS</h2>
            <div class="best__item">
                <div class="best__all">
                    <div class="best__img">
                        <a href="#"><img src="../../asset/img/bestImg01.jpg" alt="베스트01"></a>
                        <figcaption>
                            <h2><a href="#">강아지 선글라스 악세서리</a></h2>
                            <p>20,000원</p>
                        </figcaption>
                    </div>
                    <div class="best__img">
                        <a href="#"><img src="../../asset/img/bestImg02.jpg" alt="베스트02"></a>
                        <figcaption>
                            <h2><a href="#">린넨 침구</a></h2>
                            <p>175,000원</p>
                        </figcaption>
                    </div>
                    <div class="best__img">
                        <a href="#"><img src="../../asset/img/bestImg03.jpg" alt="베스트03"></a>
                        <figcaption>
                            <h2><a href="#">따뜻한 겨울 후드</a></h2>
                            <p>57,000원</p>
                        </figcaption>
                    </div>
                </div>
                <div class="best__all">
                    <div class="best__img">
                        <a href="#"><img src="../../asset/img/bestImg04.jpg" alt="베스트04"></a>
                        <figcaption>
                            <h2><a href="#">푹신푹신한 쿠션</a></h2>
                            <p>66,000원</p>
                        </figcaption>
                    </div>
                    <div class="best__img">
                        <a href="#"><img src="../../asset/img/bestImg05.jpg" alt="베스트05"></a>
                        <figcaption>
                            <h2><a href="">공놀이용 볼</a></h2>
                            <p>7,000원</p>
                        </figcaption>
                    </div>
                    <div class="best__img">
                        <a href="#"><img src="../../asset/img/bestImg06.jpg" alt="베스트06"></a>
                        <figcaption>
                            <h2><a href="#">가죽 목줄</a></h2>
                            <p>18,000원</p>
                        </figcaption>
                    </div>
                </div>
            </div>
        </div>
     </section>
     <!-- //shopBest -->

     <!-- shop category -->
     <section id="shopCategory">
        <div class="shopCate__inner container">
            <h2 class="butler800">CATEGORY</h2>
            <div class="shopCate">
                <ul>
                    <li><a href="#">의류 / 악세서리</a></li>
                    <li><a href="#">미용 / 케어</a></li>
                    <li><a href="#">배변 / 위생</a></li>
                    <li><a href="#">간식 / 영양제</a></li>
                    <li><a href="#">산책 / 놀이</a></li>
                    <li><a href="#">목욕</a></li>
                </ul>
            </div>
        </div>
     </section>
     <!-- // shop categoey -->

    <!-- shop item -->
    <section id="shopItem">
        <div class="shopItem__inner container">

        <?php
            if(isset($_GET['page'])){
                $page = (int) $_GET['page'];
            } else {
                $page = 1;
            }

            $viewNum = 9;
            $viewLimit = ($viewNum * $page) - $viewNum;


            $petMainSql .= " ORDER BY petShopID DESC LIMIT {$viewLimit}, {$viewNum}";
            $petMainResult = $connect -> query($petMainSql);


            $count = $petMainResult -> num_rows;

            if($petMainSql){
                $count = $petMainResult -> num_rows;

                if($count > 0 ){
                    for($i=1; $i <= $count; $i++){
                        $Hos = $petMainResult -> fetch_array(MYSQLI_ASSOC);
                        echo "<div class='item__all'>";
                        echo "<div class='item__img'>";
                        echo "<a href='petShopItem.php?page=".$petMainSql['petShopID']."'><img src='../asset/img/petshop/".$petMainSql['shopImgFile']."' alt=''></a>";
                        echo "<figcaption>";
                        echo "<h3 class='butler800'><a href='#'>".$petMainSql['categoeyBrand']."</a></h3>";
                        echo "<h2><a href='#'>".$petMainSql['categoryName']."</a></h2>";
                        echo "<p><a href='#'>".$petMainSql['categoryPrice']."</a></p>";
                        echo "</figcaption></div>";
                    }
                }
            }
        ?>

            <!-- <div class="item__all">
                <div class="item__img">
                    <a href="#"><img src="../../asset/img/item__top01.jpg" alt=""></a>
                    <figcaption>
                        <h3 class="butler800"><a href="#">Brand</a></h3>
                        <h2><a href="#">펫 용품</a></h2>
                        <p><a href="#">66,000원</a></p>
                    </figcaption>
                </div>
                <div class="item__img">
                    <a href="#"><img src="../../asset/img/item__top02.jpg" alt=""></a>
                    <figcaption>
                        <h3 class="butler800"><a href="#">Brand</a></h3>
                        <h2><a href="#">펫 용품</a></h2>
                        <p><a href="#">66,000원</a></p>
                    </figcaption>
                </div>
                <div class="item__img">
                    <a href="#"><img src="../../asset/img/item__top03.jpg" alt=""></a>
                    <figcaption>
                        <h3 class="butler800"><a href="#">Brand</a></h3>
                        <h2><a href="#">펫 용품</a></h2>
                        <p><a href="#">66,000원</a></p>
                    </figcaption>
                </div>
            </div> -->
        </div>
        <div class="petShop__pages">
            <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
            </ul>
        </div>
     </section>
     <!-- //shop item -->


    <!-- header -->
    <?php include "../include/footer.php"?>
    <!-- //header -->
</body>
</html>