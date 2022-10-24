<!-- header -->
<header id="header">
        <div class="header__inner container">
            <div class="left">
                <ul>
                    <li><a href="#" class="star"></a></li>
                </ul>
            </div>
            <h1><a href="../main/main.php">KDB</a></h1>
            <div class="right">
                <ul>
                    <?php if(isset($_SESSION['myMemberID'])) { ?>
                        <li><a href="#" class="black"><?=$_SESSION['youName']?>님 환영합니다.</a></li>
                        <li><a href="../login/logout.php">로그아웃</a></li>
                    <?php } else { ?>
                        <li><a href="#" class="loginBtn">Login</a></li>
                        <li><a href="../login/join.php">Sign up</a></li>
                    <?php } ?>
                </ul>
            </div>
            <nav class="nav">
                <ul>
                    <li><a href="../login/join.php"><span>Sign up</span></a></li>
                    <li><a href="../board/board.php"><span>게시판</span></a></li>
                    <li><a href="../blog/blog.php"><span>블로그</span></a></li>
                    <li><a href="#"><span>My</span></a></li>
                </ul>
            </nav>
        </div>
    </header>