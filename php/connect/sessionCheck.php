<?php
    if(!isset($_SESSION['myMemberID'])) {
        // 로그인 페이지 이동
        Header("Location: ../main/main.php");
    }
?>