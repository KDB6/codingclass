<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 보기</title>

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

        <!-- board -->
        <section id="board" class="container">
            <h2>게시판 보기 영역</h2>
            <div class="board__inner">
                <div class="board__title">
                    <h3>게시판</h3>
                    <p>웹디자이너, 웹퍼블리셔, 프론트엔드 개발자를 위한 게시판입니다.</p>
                </div>
                <div class="board__view">
                 <table>
                    <colgroup>
                        <col style="width: 20%;">
                        <col style="width: 80%;">
                    </colgroup>
                    <tbody>
<?php
    $myBoardID = $_GET['myBoardID'];

    // echo $myBoardID;

    $sql = "UPDATE myBoard SET boardView = boardView + 1 WHERE myBoardID = {$myBoardID}";
    $connect -> query($sql);

    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myBoard b JOIN myMember m ON(m.myMemberID = b.myMemberID) WHERE b.myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);

    if($result) {
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($info);
        // echo "</pre>";

        echo "<tr><th>제목</th><td>".$info['boardTitle']."</td></tr>";
        echo "<tr><th>등록자</th><td>".$info['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td>".date('Y-m-d H:i', $info['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td>".$info['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td class='height'>".$info['boardContents']."</td></tr>";
    }
?>

                        <!-- <tr>
                            <th>제목</th>
                            <td>게시판 제목입니다.</td>
                        </tr>
                        <tr>
                            <th>등록자</th>
                            <td>KDB</td>
                        </tr>
                        <tr>
                            <th>등록일</th>
                            <td>2022-01-01</td>
                        </tr>
                        <tr>
                            <th>조회수</th>
                            <td>424</td>
                        </tr>
                        <tr>
                            <th>내용</th>
                            <td class="height">
                                어떤 일이라도 노력하고 즐기면 그 결과는 빛을 바란다고 생각합니다.<br>
                                신입의 열정과 도전정신을 깊숙히 새기며 배움에 있어 겸손함을 유지하며,<br>
                                세부적인 곳까지 파고드는 개발자가 되겠습니다.
                            </td>
                        </tr> -->
                    </tbody>
                 </table>
                </div>
                <div class="board_btn">
                    <a href="boardModify.php?myBoardID=<?=$myBoardID?>">수정하기</a>
                    <a href="boardRemove.php?myBoardID=<?=$myBoardID?>" onclick="alert('삭제하실겁니까?')">삭제하기</a>
                    <a href="board.php?myBoardID=<?=$myBoardID?>">목록보기</a>
                </div>
            </div>
        </section>

    </main>

    <!-- footer -->
    <?php include "../include/footer.php" ?>
</body>
</html>