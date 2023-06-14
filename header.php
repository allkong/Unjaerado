<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<header>
  <div>
    <div class="head-wrap">
      <div class="head-table">
        <div class="head-title">
          <img src="img/logoimg.png" alt="logo" width="158.535211268" class="logo-img"></img>
        </div>
        <div class="navbar">
          <div class="nav-button">
            <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) { ?>
              <button class="nav-button-right"><a href="logout.php">로그아웃</a></button>
            <?php } else { ?>
              <button class="nav-button-right"><a href="login.php">로그인</a></button>
              <button class="nav-button-right">회원가입</button>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div>
    <!-- 이어서 작성 -->
  </div>
</header>

<link rel="stylesheet" type="text/css" href="header.css">
