<?php
    include "../connect/connect.php";
    include "../connect/session.php";
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
        <section id="blogSearch" class="container">
            <h2>개ㅐㅐㅐ....발 블ㄹ...고르</h2>
            <div class="blog__search">
                <form action="blogSearch.php">
                    <legend>블로그 서치</legend>
                    <label for="searchKeyword"></label>
                    <input type="text" id="searchKeyword" name="searchKeyword" placeholder="검색어를 입력해주세요.">
                    <button class="btn">검색</button>
                </form>
            </div>
        </section>
    </main>

    <section id="card" class="container">
        <h2>Javascript Topic</h2>
        <a href="blogWrite.php" style="float:right; margin-top:20px;">글쓰기</a>
        <div class="card__inner">
<?php
    $sql = "SELECT * FROM myBlog WHERE blogDelete = 0 ORDER BY myBlogID DESC";
    $result = $connect -> query($sql);

    foreach($result as $blog ) { ?>
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
    </section>

    <!-- footer -->
    <?php include "../include/footer.php" ?>
</body>
</html>