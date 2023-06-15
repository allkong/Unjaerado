<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="pages/styles.css">
    <meta charset='utf-8'>

    <style>
        .read_table {
            border: 1px solid #444444;
            margin: 35px 0px 0px 448px;
        }

        .read_title {
            height: 45px;
            font-size: 23.5px;
            text-align: center;
            background-color: #ababab;
            color: white;
            width: 1000px;
        }

        .read_id {
            text-align: center;
            background-color: #EEEEEE;
            width: 30px;
            height: 33px;
        }

        .read_id2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_hit {
            background-color: #EEEEEE;
            width: 30px;
            text-align: center;
            height: 33px;
        }

        .read_hit2 {
            background-color: white;
            width: 60px;
            height: 33px;
            padding-left: 10px;
        }

        .read_content {
            padding: 20px;
            border-top: 1px solid #444444;
            height: 500px;
        }

        .read_btn {
            width: 700px;
            height: 200px;
            text-align: center;
            margin: auto;
            margin-top: 40px;
        }

        .read_comment_input {
            width: 700px;
            height: 500px;
            text-align: center;
            margin: auto;
        }

        .read_text3 {
            font-weight: bold;
            float: left;
            margin-left: 20px;
        }

        .read_com_id {
            width: 100px;
        }

        .read_comment {
            width: 500px;
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
    $connect = mysqli_connect('127.0.0.1', 'root', 'password', 'unjaerado');
    $number = $_GET['number'];  // GET 방식 사용
    @session_start();
    $query = "select title, content, date, hit, id from board where number = $number";
    $result = $connect->query($query);
    $rows = mysqli_fetch_assoc($result);

    $hit = "update board set hit = hit + 1 where number = $number";
    $connect->query($hit);

    ?>

    <table class="read_table" align=center>
        <tr>
            <td colspan="4" class="read_title"><?php echo $rows['title'] ?></td>
        </tr>
        <tr>
            <td class="read_id">작성자</td>
            <td class="read_id2"><?php echo $rows['id'] ?></td>
            <td class="read_hit">조회수</td>
            <td class="read_hit2"><?php echo $rows['hit'] + 1 ?></td>
        </tr>


        <tr>
            <td colspan="4" class="read_content" valign="top">
                <?php echo $rows['content'] ?></td>
        </tr>
    </table>

    <div class="read_btn">
        <button class="com-button" onclick="location.href='community'">목록</button>&nbsp;&nbsp;
        <?php
        if (isset($_SESSION['userid']) and $_SESSION['userid'] == $rows['id']) { ?>
            <button class="com-button" onclick="location.href='modify?number=<?= $number ?>'">수정</button>&nbsp;&nbsp;
            <!-- 여기서부터 추가됨 -->
            <button class="com-button" a onclick="ask();">삭제</button>

            <script>
                function ask() {
                    if (confirm("게시글을 삭제하시겠습니까?")) {
                        window.location = "delete?number=<?= $number ?>"
                    }
                }
            </script>
            <!-- 여기까지 -->
        <?php } ?>

    </div>
</body>

</html>