<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    
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

    <main id="main">

        <!-- banner -->
        <section id="banner">
            <h2>회원가입 페이지</h2>
            <div class="banner__inner2 container">
                <div class="img">
                    <img src="../assets/img/banner_img01.svg" alt="#">
                </div>
                <div class="desc">
                    정보를 입력해주세요.
                </div>
            </div>
        </section>

        <section id="join" class="container">
            <h2>회원가입</h2>
            <div class="join__inner">
                <form action="joinSave.php" name="join" method="post">
                    <fieldset>
                        <legend>회원가입</legend>
                        <div class="join__box">
                        <div>
                            <label for="youName">이름</label>
                            <input type="text" id="youName" name="youName" placeholder="이름을 적어주세요." required>
                        </div>
                        <div>
                            <label for="youEmail">이메일</label>
                            <input type="text" id="youEmail" name="youEmail" placeholder="이메일을 적어주세요." required>
                        </div>
                        <div>
                            <label for="youNickName">닉네임</label>
                            <input type="text" id="youNickName" name="youNickName" placeholder="닉네임을 적어주세요." required>
                        </div>
                        <div>
                            <label for="youPass">비밀번호</label>
                            <input type="password" id="youPass" name="youPass" placeholder="비밀번호을 적어주세요." required>
                        </div>
                        <div>
                            <label for="youPassC">비밀번호 확인</label>
                            <input type="password" id="youPassC" name="youPassC" placeholder="재확인을 위한 비밀번호을 적어주세요." required>
                        </div>
                        <div>
                            <label for="youPhone">전화번호</label>
                            <input type="text" id="youPhone" name="youPhone" placeholder="전화번호를 적어주세요." required>
                        </div>
                        </div>
                        <button class="join__btn" type="submit">회원가입 완료</button>
                    </fieldset>
                </form>
            </div>
        </section>
        <!-- join -->

    </main>


    <!-- footer -->
    <?php include "../include/footer.php" ?>
</body>
</html>