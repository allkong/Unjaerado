<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>언제라도</title>
  <link rel="favicon" href="img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="pages/member/member.css">
  <meta charset="utf-8">
</head>
<body>
    <?php include 'header.php'; ?>
    <div id="main-img">
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form method="post" action="pages/member/register_action.php">
                    <h1>Create Account</h1>
                    <p style="padding: 10px 0 23px 0px;">or use your email for registration</p>
                    <input name="id" placeholder="ID" type="text" class="member-input" />
                    <input name="pw" placeholder="Password" type="password" class="member-input" />
                    <input type="submit" class="member-button" style="margin-top: 20px;" value="SIGN UP" />
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form method="post" action="pages/member/login_action.php">
                    <h1>Sign in</h1>
                    <p style="padding: 10px 0 23px 0px;">use your account</p>
                    <input name="id" placeholder="ID" type="text" class="member-input" />
                    <input name="pw" placeholder="Password" type="password" class="member-input" />
                    <input type="submit" class="member-button" style="margin-top: 20px;" value="SIGN IN" />
                </form>
            </div>
            <!-- 이동하기 -->
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p class="member-text">To keep connected with us<br>please login with your personal info</p>
                        <button class="member-button ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p class="member-text">Enter your personal details<br>and start journey with us</p>
                        <button class="member-button ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <script type="text/javascript" src="pages/member/member.js"></script>
</body>
</html>
