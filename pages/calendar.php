<!-- calendar.html -->
<!DOCTYPE html>
<html>
<head>
    <title>Calendar Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        table {
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid black;
        }
    </style>
    <script>
        function selectDate(element) {
            var selectedDate = element.getAttribute('data-date');
            document.getElementById('selectedDate').innerHTML = selectedDate;
            document.getElementById('uploadDate').value = selectedDate;
        }

        function uploadImage() {
            var uploadDate = document.getElementById('uploadDate').value;
            var formData = new FormData(document.getElementById('uploadForm'));
            formData.append('date', uploadDate);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // 이미지 업로드 성공 시 처리할 내용
                    console.log(xhr.responseText);
                    var imagePath = xhr.responseText;
                    var uploadedImage = document.createElement('img');
                    uploadedImage.src = imagePath;
                    document.getElementById('uploadedImage').appendChild(uploadedImage);
                    location.reload();  // 페이지 새로고침
                } else {
                    // 이미지 업로드 실패 시 처리할 내용
                    console.error(xhr.responseText);
                }
            };
            xhr.send(formData);
        }

        function changeMonth(action) {
            var currentDate = new Date();
            var currentYear = currentDate.getFullYear();
            var currentMonth = currentDate.getMonth() + 1;

            var year = currentYear;
            var month = currentMonth;

            if (action === 'prev') {
                month--;
                if (month === 0) {
                    month = 12;
                    year--;
                }
            } else if (action === 'next') {
                month++;
                if (month === 13) {
                    month = 1;
                    year++;
                }
            }

            // 변경된 월을 URL에 추가하여 페이지 새로고침
            var url = window.location.href;
            if (url.indexOf('?') > -1) {
                url = url.replace(/month=\d+/, 'month=' + month);
            } else {
                url += '?month=' + month;
            }
            url = url.replace(/year=\d+/, 'year=' + year);
            window.location.href = url;
        }
    </script>
</head>
<body>
    <?php include 'header.php'; ?>

    <?php
    $uploadDirectory = "uploads/";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["date"])) {
        $date = date("Y-m-d", strtotime($_POST["date"]));
        $uploadedFile = $_FILES["image"]["tmp_name"];
        $imagePath = $uploadDirectory . $date . ".jpg";

        if (move_uploaded_file($uploadedFile, $imagePath)) {
            // 이미지 업로드 성공
            echo $imagePath;
        } else {
            // 이미지 업로드 실패
            echo "Error uploading image.";
        }
    }

    // 현재 연도와 월 가져오기
    $currentYear = date("Y");
    $currentMonth = date("n");

    // URL에서 월 파라미터 가져오기
    $month = isset($_GET['month']) ? intval($_GET['month']) : $currentMonth;
    $year = isset($_GET['year']) ? intval($_GET['year']) : $currentYear;

    // 이전 월, 다음 월 계산
    $prev_month = $month - 1;
    $next_month = $month + 1;
    $prev_year = $year;
    $next_year = $year;
    if ($prev_month == 0) {
        $prev_month = 12;
        $prev_year = $year - 1;
    }
    if ($next_month == 13) {
        $next_month = 1;
        $next_year = $year + 1;
    }

    // 달력 출력
    echo "<h2>{$year}년 {$month}월</h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>일</th>";
    echo "<th>월</th>";
    echo "<th>화</th>";
    echo "<th>수</th>";
    echo "<th>목</th>";
    echo "<th>금</th>";
    echo "<th>토</th>";
    echo "</tr>";

    // 달력 첫째 주 시작 위치 계산
    $first_day = date("w", mktime(0, 0, 0, $month, 1, $year));
    $day_count = 1;

    // 달력 출력 - 첫째 주
    echo "<tr>";
    for ($i = 0; $i < 7; $i++) {
        if ($i < $first_day) {
            echo "<td></td>";
        } else {
            $currentDate = sprintf("%04d-%02d-%02d", $year, $month, $day_count);
            $imagePath = $uploadDirectory . $currentDate . ".jpg";
            if (file_exists($imagePath)) {
                echo "<td><img src='{$imagePath}' alt='Calendar Image'></td>";
            } else {
                echo "<td data-date='{$currentDate}' onclick='selectDate(this)'>{$day_count}</td>";
            }
            $day_count++;
        }
    }
    echo "</tr>";

    // 달력 출력 - 나머지 주
    while ($day_count <= date("t", mktime(0, 0, 0, $month, 1, $year))) {
        echo "<tr>";
        for ($i = 0; $i < 7; $i++) {
            if ($day_count > date("t", mktime(0, 0, 0, $month, 1, $year))) {
                echo "<td></td>";
            } else {
                $currentDate = sprintf("%04d-%02d-%02d", $year, $month, $day_count);
                $imagePath = $uploadDirectory . $currentDate . ".jpg";
                if (file_exists($imagePath)) {
                    echo "<td><img src='{$imagePath}' alt='Calendar Image'></td>";
                } else {
                    echo "<td data-date='{$currentDate}' onclick='selectDate(this)'>{$day_count}</td>";
                }
                $day_count++;
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>

    <form id="uploadForm" enctype="multipart/form-data">
        <label for="uploadDate">날짜:</label>
        <input type="date" name="uploadDate" id="uploadDate" readonly>
        <br>
        <label for="image">이미지 업로드:</label>
        <input type="file" name="image" id="image">
        <br>
        <input type="button" value="업로드" onclick="uploadImage()">
    </form>

    <div id="selectedDate"></div>
    <div id="uploadedImage"></div>

    <!-- 이전 월, 다음 월 버튼 -->
    <button onclick="changeMonth('prev')">이전 월</button>
    <button onclick="changeMonth('next')">다음 월</button>
</body>
</html>
