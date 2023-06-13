<!DOCTYPE html>
<html>
<head>
    <title>언제라도</title>
    <link rel="stylesheet" type="text/css" href="pages/styles.css">
    <meta charset="utf-8">
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>분리수거 검색</h1>
    <form method="post">
        <input type="text" name="search" placeholder="쓰레기 검색">
        <input type="submit" value="검색">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["search"])) {
            // ChatGPT API 호출
            $api_key = getenv('API_KEY');
            $search_term = $_POST["search"];

            $url = "https://api.openai.com/v1/chat/completions";
            $headers = array(
                "Content-Type: application/json",
                "Authorization: Bearer " . $api_key
            );
            $data = array(
                "messages" => array(
                    array("role" => "system", "content" => "어떻게 버려? " . $search_term)
                ),
                "model" => "gpt-3.5-turbo"
            );

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);
            curl_close($ch);

            // API 응답 처리
            $result = json_decode($response, true);
            // var_dump($response);


            $message = $result['choices'][0]['message']['content'];

            // 결과 출력
            echo "<h2>쓰레기 정보</h2>";
            echo "<p class='msg-card'>" . nl2br($message) . "</p>";
        } else {
            echo "<p>검색어를 입력하세요.</p>";
        }
    }
    ?>
</body>
</html>