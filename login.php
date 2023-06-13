<?php
// 로그인 버튼을 클릭한 경우
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 사용자 정보 체크 예시
    if ($username === 'user' && $password === 'password') {
        session_start();
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
        header('Location: home.php');
        exit();
    } else {
        $errorMessage = '아이디 또는 비밀번호가 올바르지 않습니다.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>로그인</title>
</head>
<body>
    <h1>로그인</h1>
    <?php if (isset($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } ?>
    <form method="post" action="">
        <input type="text" name="username" placeholder="아이디" required>
        <input type="password" name="password" placeholder="비밀번호" required>
        <button type="submit">로그인</button>
    </form>
</body>
</html>
