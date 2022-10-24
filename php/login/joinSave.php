<!DOCTYPE html>
<html lang="en">
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
                    <img src="../assets/img/join_bg01.svg" alt="#">
                </div>
                <div class="desc">
                    회원가입 축하드립니다.<br>
<?php
    include "../connect/connect.php";

    $youName = $_POST['youName'];
    $youEmail = $_POST['youEmail'];
    $youNickName = $_POST['youNickName'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youPhone = $_POST['youPhone'];
    $regTime = time();

    // echo $ $youName, $youEmail, $youNickName, $youPass, $youPhone, $regTime;

    // $sql = "INSERT INTO myMember(youName, youEmail, youNickName, youPass, youPhone, regTime) VALUES('$youName', '$youEmail', '$youNickName', '$youPass', '$youPhone', '$regTime')";

    // $result = $connect -> query($sql);

    // if($result) {
    //     echo "INSERT INTO TRUE";
    // } else {
    //     echo "INSERT INTO FALSE";
    // }

    // 데이터 가져오기 --> 유효성 검사 --> 데이터 중복검사(x) --> 회원가입
    // 데이터 가져오기 --> 유효성 검사 --> 데이터 중복검사(o) --> 로그인

    // 메세지 출력
    function msg($alert) {
        echo "<p class='alert'>($alert)</p>";
    }

    // 메일 유효성 검사
    // $checkEmail = filter_var($youEmail, FILTER_VALIDATE_EMAIL);

    // if($checkEmail == false) {
    //     msg("이메일이 중복되었습니다.");
    //     exit;
    // }

    // 메일 유효성 검사(정규식)
    // $checkEmail = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $youEmail);

    // if($checkEmail == false) {
    //     msg("이메일이 중복되었습니다.");
    //     exit;
    // }

    // 비밀번호 검사
    if($youPass !== $youPassC) {
        msg("비밀번호가 일치하지 않습니다. <br> 다시 한 번 확인해 주세요.");
        exit;
    }

    // 비밀번호 암호화
    // $youPass = sha1($youPass);

    // 이름 검사
    $checkName = preg_match("/^[가-힣]{1,}$/", $youName);

    if($checkName == false) {
        msg("이름이 정확하지 않습니다.<br>한글로만 적어주세요.");
        exit;
    }

    // 휴대폰 번호 검사
    $checkName = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);

    if($checkName == false) {
        msg("번호가 정확하지 않습니다.<br>정확한 번호(000-0000-0000)로 재입력 해주세요.");
        exit;
    }

    // 이메일 중복검사
    $isEmailCheck = false;

    $sql = "SELECT youEmail FROM myMember WHERE youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    if($result) {
        $count = $result -> num_rows;

        if($count == 0) {
            // 회원가입
            $isEmailCheck = true;
        } else {
            // 로그인 유도
            msg("중복된 이메일입니다.");
            exit;
        }
    } else {
        msg("에러발생 - 관리자에게 문의하세요.");
        exit;
    }

    // 핸드폰 중복 검사
    $isPhoneCheck = false;

    $sql = "SELECT youPhone FROM myMember WHERE youPhone = '$youPhone'";
    $result = $connect -> query($sql);

    if($result) {
        $count = $result -> num_rows;

        if($count == 0) {
            // 회원가입
            $isPhoneCheck = true;
        } else {
            // 로그인 유도
            msg("중복된 전화번호입니다.");
            exit;
        }
    } else {
        msg("에러발생 - 관리자에게 문의하세요.");
        exit;
    }

    // 회원가입
    if($isEmailCheck == true && $isPhoneCheck == true) {
        $sql = "INSERT INTO myMember(youName, youEmail, youNickName, youPass, youPhone, regTime) VALUES('$youName', '$youEmail', '$youNickName', '$youPass', '$youPhone', '$regTime')";
        $result = $connect -> query($sql);
        
        if($result) {
            msg("회원가입을 축하합니다.<br><a href='../main/main.php'>Go to main</a>");
            exit;
        } else {
            msg("에러발생 - 관리자에게 문의하세요.");
            exit;
        }
    } else {
        msg("이메일 또는 핸드폰 번호가 중복됩니다.");
        exit;
    }
?>
                </div>
                <a class="btn" href="main.html">Go to Main</a>
            </div>
        </section>
    </main>

    <!-- footer -->
    <?php include "../include/footer.php" ?>
</body>
</html>