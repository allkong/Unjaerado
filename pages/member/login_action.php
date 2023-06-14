<?php
session_start();

$connect = mysqli_connect("127.0.0.1", "root", "password", "unjaerado") or die("connect failed");

$id = $_POST['id'];
$pw = $_POST['pw'];

// 아이디 존재하는지 검사
$query = "select * from member where id='$id'";
$result = $connect->query($query);


// 아이디가 있다면 비밀번호 검사
if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    // 비밀번호가 맞다면 세션 생성
    if ($row['password'] == $pw) {    // password 평문비교 취약
        $_SESSION['userid'] = $id;
        if (isset($_SESSION['userid'])) {
            header("Location: http://localhost/zero-waste/home");
            exit();
         } else {
        echo "session failed";
        }
    } else { ?> <script>
        alert("아이디 또는 비밀번호를 확인해주세요.");
        history.back(); // 이전페이지(login.php)로 돌아가기
    </script> <?php }
    } else { ?> <script>
        alert("아이디 또는 비밀번호를 확인해주세요.");
        history.back();
    </script>
    <?php
    }
?>