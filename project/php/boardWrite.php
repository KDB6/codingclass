<?php
    include "../connect/connect.php";
    include "../connect/session.php";


    $myMemberID = $_SESSION['myMemberID'];

    $mySql = "SELECT * FROM myMember WHERE myMemberID = {$myMemberID}";
    $myResult = $connect -> query($mySql);

    $myInfo = $myResult -> fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 글 쓰기</title>

    <link rel="stylesheet" href="../asset/css/reset.css">
    <link rel="stylesheet" href="../asset/css/common.css">
    <link rel="stylesheet" href="../asset/css/font.css">
    
    <link rel="stylesheet" href="../asset/css/board/boardLoginBanner.css">
    <link rel="stylesheet" href="../asset/css/board/boardImageType.css">
    <link rel="stylesheet" href="../asset/css/board/boardWriteModify.css">
    <!-- <link rel="stylesheet" href="../asset/css/footer.css"> -->

    <style>
        .boardTitle {
            font-size: 24px;
            color: #757575;
        }
        .customer {
            cursor: pointer;
        }
        #footer {
            margin-top: 78px;
        }
        .footer__inner {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #d3d3d3;
            padding: 20px 0 !important;
        }
        .footer__left > h2 {
            color: #A0A0A0;
            margin-bottom: 20px;
            font-size: 12px;
        }
        .footer__left ul {
            margin-bottom: 30px;
        }
        .footer__left ul li {
            color: #757575;
            font-size: 12px;
        }
        .footer__left h3 {
            color: #757575;
            font-size: 12px;
        }
        .footer__left > p {
            margin-top: 30px;
            color: #757575;
            font-size: 12px;
        }

        .footer__right {
            padding-top: 223px;
        }
        .footer__right ul li {
            padding: 10px;
            display: inline;
            color: #757575;
            font-size: 12px;
        }
    </style>
</head>

<!-- header -->
<?php include "../include/header.php"?>
<!-- //header -->

<body>

    <!-- boardLoginBanner -->
    <section id="boardLoginBanner" class="loginBanner">
        <h2 class="blind">loginBanner</h2>
        <div class="lB__inner">
            <figure class="MyprofileL">
                <img src="../asset/img/profile/<?=$myInfo['youImgFile']?>" alt="프로필사진">
                    <figcaption><?=$_SESSION['youName']?>님 어서오세요!</figcaption>
                <a href="../php/logout.php">LOGOUT</a>
            </figure>
            <div class="Myprofile">
                <ul>
                    <li>가입일 : <?=date('Y-m-d', $myInfo['regTime'] )?></li>
                    <li><a href="#">나의 정보</a></li>
                    <li><a href="#">나의 반려견</a></li>
                    <li>나의 글 : 00개</li>
                    <li>댓글 수 : 00개</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- //boardLoginBanner -->

    <!-- boardImageType -->
    <section id="boardImageType" class="imageType">
        <div class="imageType__inner">
            <h2>COMMUNITY</h2>
            <p>좋은 글로 여러 정보를 나눠주세요!</p>
        </div>
    </section>
    <!-- //boardImageType -->

    <!-- boardWrite -->
    <section id="boardWrite">
        <div class="board__wrap container">
            <form action="boardWriteSave.php" name="boardWrite" method="post">
                <legend class="ir">게시판 영역입니다.</legend>
                <div class="border_titleBox">
                    <div class="titleBox">
                        <label class="boardTitle" for="boardTitle">제목 : </label>
                        <input type="text" name="boardTitle" id="boardTitle" maxlength="30" required>
                    </div>
                    <div class="border_titleCate">
                        <div class="selectBox">
                            <label for="boardCate"></label>
                            <select name="boardCate" id="boardCate">
                                <option value="카테고리1">카테고리1</option>
                                <option value="카테고리2">카테고리2</option>
                                <option value="카테고리3">카테고리3</option>
                            </select>
                        </div>
                        <!-- <div class="imgAttachBox">
                            <label for="boardImg">Image</label>
                            <input type="file" name="boardImg" id="boardImg" accept=".jpg, .jpeg, .png, .gif, .webp" placeholder="jpg, jpeg, png, gif, webp 파일만 첨부해주세요.">
                        </div> -->
                    </div>
                </div>
                <div class="board_writeBox">
                    <label for="boardContents" class="ir">내용</label>
                    <textarea name="boardContents" id="boardContents" placeholder="글을 작성해주세요." required></textarea>
                </div>
                <div class="board_btn">
                    <button type="submit" value="저장하기">작성 완료</button>
                    <span>|</span>
                    <span><a href="board.php">취소</a></span>
                </div>
            </form>
        </div>        
    </section>
    <!-- //boardWrite -->

</body>

    <footer id="footer">
        <div class="footer__inner  container">
            <div class="footer__left">
                <h2>winimal animal service</h2>
                <ul>
                    <li>010-1234-5678</li>
                    <li>Mon-Fri / 09 : 00am ~ 17 : 00pm</li>
                    <li>점심시간 12 : 00am ~ 14 : 00pm</li>
                    <li>토요일, 일요일, 공휴일 휴무</li>
                </ul>
    
                <h2>winimal information service</h2>
    
                <h3>국민은행 : 854126-02-555666  예금주 : 위니멀</h3>
                <h3>wnimal@naver.com</h3>

                <p>사업자등록번호.000-00-00000  통신판매업신고.2022-경기시흥-0111호  개인정보관리책임. 누군가</p>
            </div>

            <div class="footer__right">
                <ul>
                    <li class="customer">문의하기</li>
                    <li>Privacy Policy</li>
                    <li>Agreement</li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        const customer = document.querySelector(".customer");

        customer.addEventListener("click", (e) => {
            e.preventDefault();
            alert("전화해주세요..ㅎㅎ")
        })
    </script>

</html>