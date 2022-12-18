<!-- CSS -->
<link rel="stylesheet" href="../html/assets/css/style.css">
<!-- META -->
<meta name="author" content="KDB6">
<meta name="description" content="PHP 사이트 만들기입니다.">
<meta name="keyword" content="사이트, 만들기, 튜토리얼, 웹스토리보이">
<meta name="robots" content="all">
<!-- ICON -->
<link rel="icon" href="../html/assets/img/icon_256.png" />
<link rel="shortcut icon" href="../html/assets/img/icon_256.png" />
<link rel="icon" type="image/png" sizes="256x256" href="../html/assets/img/icon_256.png" />
<link rel="icon" type="image/png" sizes="192x192" href="../html/assets/img/icon_192.png" />
<link rel="icon" type="image/png" sizes="32x32" href="../html/assets/img/icon_32.png" />
<link rel="icon" type="image/png" sizes="16x16" href="../html/assets/img/icon_16.png" />
3:19
<header id="header">
    <div class="header__inner container">
        <div class="left">
            <a href="../index.php" class="star"><span class="ir">메인으로</span></a>
        </div>
        <h1>
            <a href="../main/main.php">PHP BLOG</a>
        </h1>
        <div class="right">
            <?php if(isset($_SESSION['memberID'])){ ?>
                <ul>
                    <li><a href="../mypage/mypage.php" class="black"><?=$_SESSION['youName']?>님 환영합니다.</a></li>
                    <li><a href="../login/logout.php">로그아웃</a></li>
                </ul>
            <?php } else { ?>
                <ul>
                    <li><a href="../login/login.php">로그인</a></li>
                    <li><a href="../join/join.php">회원가입</a></li>
                </ul>
            <?php } ?>
        </div>
        <nav class="nav">
            <ul>
                <li><a href="../join/join.php"><span>회원가입</span></a></li>
                <li><a href="../login/login.php"><span>로그인</span></a></li>
                <li><a href="../board/board.php"><span>게시판</span></a></li>
                <li><a href="../blog/blog.php"><span>블로그</span></a></li>
            </ul>
        </nav>
    </div>
</header>