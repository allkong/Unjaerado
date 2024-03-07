<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<header>
  <div>
    <div class="head-wrap">
      <div class="head-table">
        <div class="head-title">
          <a href="home" class="logo-img"><img src="img/logoimg.png" alt="logo" width="158.535211268"></img></a>
        </div>
        <div class="nav-center">
          <button class="nav-button"><a href="product">제품소개</a></button>
          <button class="nav-button"><a href="trash">쓰레기검색</a></button>
          <button class="nav-button"><a href="community">게시판</a></button>
          <?php
          if (isset($_SESSION['userid'])) {
            echo '<button class="nav-button"><a href="calendar">챌린지</a></button>';
          } else {
            echo '<button class="nav-button" onclick="alert(\'로그인이 필요합니다.\')"><a href="member">챌린지</a></button>';
          }
          ?>
        </div>
        <div class="nav-right">
          <?php
            @session_start(); 
            if (isset($_SESSION['userid'])) { ?> <b><?php echo $_SESSION['userid']; ?></b>님 반갑습니다
            <button class="nav-button"><a href="logout">로그아웃</a></button>
          <?php } else { ?>
            <button class="nav-button"><a href="member">시작하기</a></button>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</header>

<link rel="stylesheet" type="text/css" href="header.css">
