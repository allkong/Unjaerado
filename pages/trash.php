<!DOCTYPE html>
<html>
<head>
    <title>언제라도</title>
    <link rel="stylesheet" type="text/css" href="pages/styles.css">
    <meta charset="utf-8">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="header-area"></div>
    <div class="sub-bg">
        <p class="sub-title">쓰레기 검색</p>
    </div>
    <div style="margin: 50px 470px 50px 470px">
        <form method="post" class="search">
            <input type="text" name="search" class="search-input" placeholder="쓰레기 입력">
            <input type="submit" id="search-img" value="">
        </form>

        <?php
        $search_term = '';
        $message = '';

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
                $message = $result['choices'][0]['message']['content'];
            } else {
                echo "<p>검색어를 입력하세요.</p>";
            }
        }
        ?>

        <div class="responsive-wrapper minutes-wrap">
            <?php if (!empty($search_term) && !empty($message)) { ?>
                <div class="minutes-detail">
                    <div class="detail-header">
                        <div class="circle-btn">
                            <div class="red-c"></div>
                            <div class="yellow-c"></div>
                            <div class="green-c"></div>
                        </div>
                    </div>
                    <div class="detail-title">
                        <p class="detail-title-txt">
                            <?php echo "<h2>" . $search_term . " 버리는 법</h2>"; ?>
                        </p>
                    </div>
                    <div class="detail-container">
                        <div class="detail-content">
                            <p class="msg-card"><?php echo nl2br($message); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
