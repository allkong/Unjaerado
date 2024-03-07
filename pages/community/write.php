<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="pages/styles.css">
    <meta charset='utf-8'>
    <style>
        tbody {
            margin: 52px 0 45px 507px;
        }
        table.table2 {
            border-collapse: separate;
            border-spacing: 1px;
            text-align: left;
            line-height: 1.5;
            border-top: 1px solid #ccc;
            margin: 20px 10px;
        }

        table.table2 tr {
            width: 50px;
            padding: 10px;
            font-weight: bold;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }

        table.table2 td {
            width: 100px;
            padding: 10px;
            vertical-align: top;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="header-area"></div>
    <div class="sub-bg">
        <p class="sub-title">게시판</p>
    </div>
    <?php
    @session_start();
    if (!isset($_SESSION['userid'])) {
    ?>

        <script>
            alert("로그인이 필요합니다.");

            <?php header("Location: http://localhost/zero-waste/member");
            exit(); ?>
        </script>
        
    <?php
    }
    ?>

    <form method="post" action="pages/community/write_action.php">
        <!-- method를 get -> post로 바꿔야됨!! -->
        <table style="padding: 50px 0 60px 565px;" align=center width=auto border=0 cellpadding=2>
            <tr>
                <td style="height:40; float:center; background-color:#ababab">
                    <p style="font-size:25px; text-align:center; color:white; margin-top:15px; margin-bottom:15px">게시글 작성하기</p>
                </td>
            </tr>
            <tr>
                <td bgcolor=white>
                    <table class="table2">
                        <tr>
                            <td>작성자</td>
                            <td><input type="hidden" name="name" value="<?= $_SESSION['userid'] ?>"><?= $_SESSION['userid'] ?></td>
                        </tr>

                        <tr>
                            <td>제목</td>
                            <td><input type="text" name="title" size=87></td>
                        </tr>

                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" cols=75 rows=15></textarea></td>
                        </tr>
                        <!-- 비밀번호 입력란 제거 -->
                    </table>

                    <center>
                        <input style="height:26px; width:47px; font-size:16px;" type="submit" class="com-button" value="작성">
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>