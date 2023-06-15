<?php
$connect = mysqli_connect('127.0.0.1', 'root', 'password', 'unjaerado') or die("connect failed");

$number = $_POST['number'];
$title = $_POST['title'];
$content = $_POST['content'];

$date = date('Y-m-d H:i:s');

$query = "update board set title='$title', content='$content', date='$date' where number=$number";
$result = $connect->query($query);
if ($result) {
?>
    <script>
        alert("작성 완료");
        <?php header("Location: http://localhost/zero-waste/read?number=$number");
        exit(); ?>
    </script>
<?php } else {
    echo "작성 실패";
}
?>