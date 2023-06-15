<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="pages/styles.css">
    <meta charset='utf-8'>
    <style>
        table {
            border-top: 1px solid #444444;
            border-collapse: collapse;
            margin: 52px 0 45px 507px;
        }

        tr {
            border-bottom: 1px solid #444444;
            padding: 10px;
        }

        td {
            border-bottom: 1px solid #efefef;
            padding: 10px;
        }

        table .even {
            background: #efefef;
        }

        .text {
            text-align: center;
            padding-top: 20px;
            color: #000000
        }

        .text:hover {
            text-decoration: underline;
        }

    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="header-area"></div>
    <div class="sub-bg">
        <p class="sub-title">제로웨이스트 제품소개</p>
    </div>
    <?php
    $connect = mysqli_connect('127.0.0.1', 'root', 'password', 'unjaerado') or die("connect failed");
    $query = "select * from board order by number desc";    //역순 출력
    $result = mysqli_query($connect, $query);
    // $result = $connect->query($query);
    $total = mysqli_num_rows($result);  //result set의 총 레코드(행) 수 반환

    // @session_start();
    ?>
    <div class=text>
        <button style="cursor: hand" onClick="location.href='write'" class="com-button">글쓰기</button>
    </div>

    <table>
        <thead>
            <tr>
                <td width="50">번호</td>
                <td width="500">제목</td>
                <td width="100">작성자</td>
                <td width="200">날짜</td>
                <td width="70">조회수</td>
            </tr>
        </thead>

        <tbody>
            <?php
            while ($rows = mysqli_fetch_assoc($result)) {   //result set에서 레코드(행)를 1개씩 리턴
                if ($total % 2 == 0) {
            ?>
            
                    <tr class="even">
                        <!--배경색 진하게-->
                    <?php } else {
                    ?>
                    <tr>
                        <!--배경색 그냥-->
                    <?php } ?>
                    <td width="50"><?php echo $total ?></td>
                    <td width="500">
                        <a href="read?number=<?php echo $rows['number'] ?>">
                            <?php echo $rows['title'] ?>
                    </td>
                    <td width="100"><?php echo $rows['id'] ?></td>
                    <td width="200"><?php echo $rows['date'] ?></td>
                    <td width="50"><?php echo $rows['hit'] ?></td>
                    </tr>
                <?php
                $total--;
            }
                ?>
        </tbody>
    </table>
</body>

</html>