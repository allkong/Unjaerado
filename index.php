<?php

function handleRoute($url) {
    switch ($url) {
        default:
            include 'pages/home.php';
            break;
        case 'product':
            include 'pages/product.php'; 
            break;
        case 'trash':
            include 'pages/trash.php'; 
            break;
        case 'community':
            include 'pages/community.php'; 
            break;
        case 'challenge':
            include 'pages/challenge.php';
            break;
    }
}

// URL 파라미터에서 요청된 경로 가져오기
$url = isset($_GET['url']) ? $_GET['url'] : '';

// 라우팅 처리할 함수를 호출합
handleRoute($url);
