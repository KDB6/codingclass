<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    
    $category = $_GET['category'];

    $categorySql = "SELECT * FROM myBlog WHERE blogDelete = 0 AND blogCategory = '$category' ORDER BY myBlogID DESC LIMIT 10";
    $categoryResult = $connect -> query($categorySql);
    $categoryInfo = $categoryResult -> fetch_array(MYSQLI_ASSOC);
    $categoryCount = $categoryResult -> num_rows;
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>블로그</title>

    <?php include "../include/link.php" ?>
    </head>
    <body>
    <!-- skip -->
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">콘텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>

    <!-- header -->
    <?php include "../include/header.php" ?>

    <!-- main -->
    <main id="main">
        <section id="blog" class="container">
            <div class="blog__inner">
                <div class="blog__title">
                    <h2><?=$categoryInfo['blogCategory']?></h2>
                    <p><?=$categoryInfo['blogCategory']?>와 관련된 글이 <?=$categoryCount?> 있습니다.</p>
                </div>

                <!-- blog__contents -->
                <div class="blog__contents">
                    <div class="blog__contents__card">
                        <div class="card__inner horizon">

<?php foreach($categoryResult as $blog ) { ?>
        <div class="card">
            <figure>
                <img src="../assets/img/blog/<?=$blog['blogImgFile']?>" alt="#">
                <a href="blogView.php?blogID=<?=$blog['myBlogID']?>" class="go" title="컨텐츠 바로가기">
                </a>
                <span class="cate"><?=$blog['blogCategory']?></span>
            </figure>
            <div>
                <a href="blogView.php?blogID=<?=$blog['myBlogID']?>">
                    <h3><?=$blog['blogTitle']?></h3>
                    <p><?=$blog['blogContents']?></p>
                </a>
            </div>
        </div>
<?php   } ?>

                        </div>
                    </div>
                </div>

                <!-- blog__aside -->
                <div class="blog__aside">
                    <div class="blog__aside__intro">
                        <div class="img">
                            <img src="../assets/img/banner_bg01.jpg" alt="#">
                        </div>
                        <p class="intro">
                            게 맛을 알아?
                        </p>
                    </div>
                    <div class="blog__aside__cate">
                        <h3>카테고리</h3>
                        <?php include "../include/category.php"?>
                    </div>
                    <div class="blog__aside__new">
                        <h3>최신글</h3>
                        <ul>
                            <?php include "../include/blogNew.php"?>
                        </ul>
                    </div>
                    <div class="blog__aside__pop">
                        <h3>인기글</h3>
                        <ul>
                            <?php include "../include/blogNew.php"?>
                        </ul>
                    </div>
                    <div class="blog__aside__comment">
                        <h3>최신 댓글</h3>
                        <ul>
                            <li><a href="#">apple</a></li>
                            <li><a href="#">쌤쏭</a></li>
                            <li><a href="#">toss</a></li>
                            <li><a href="#">naver</a></li>
                        </ul>
                    </div>
                    <div class="blog__aside__ad"></div>
                </div>

                <!-- blog__relation -->
                <div class="blog__relation"></div>
            </div>
        </section>
    </main>

    <!-- footer -->
    <?php include "../include/footer.php" ?>
</body>
</html>