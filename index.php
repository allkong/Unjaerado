<?php

function handleRoute($url) {
    switch ($url) {
        case 'home':
            include 'pages/home.php';
            break;
        case 'member':
            include 'pages/member/member.php';
            break;
        case 'register':
            include 'pages/member/register.php';
            break;
        case 'logout':
            include 'pages/member/logout.php';
            break;
        case 'product':
            include 'pages/product.php'; 
            break;
        case 'trash':
            include 'pages/trash.php'; 
            break;
        case 'community':
            include 'pages/community/community.php'; 
            break;
        case 'write':
            include 'pages/community/write.php'; 
            break;
        case 'read':
            include 'pages/community/read.php'; 
            break;
        case 'modify':
            include 'pages/community/modify.php'; 
            break;
        case 'delete':
            include 'pages/community/delete.php'; 
            break;
        case 'calendar':
            include 'pages/calendar.php';
            break;
        case 'test':
            include 'pages/member/login_test.php';
            break;
    }
}

// URL 파라미터에서 요청된 경로 가져오기
$url = isset($_GET['url']) ? $_GET['url'] : '';

// 라우팅 처리할 함수 호출
handleRoute($url);
