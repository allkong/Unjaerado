<?php
session_start();
// 세션 제거
session_destroy();

// 로그인 상태 업데이트
$_SESSION['loggedIn'] = false;

// 현재 페이지로 리다이렉션
header('Location: home');
exit();
?>
