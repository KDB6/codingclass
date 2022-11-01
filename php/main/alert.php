<?php
    if(!isset($_SEESION['myMemberID'])) {
        // 로그인 페이지 이동
        Header("Location: ../main/alert.php");

        echo "로그인을 먼저 해주세요.";
    }
?>