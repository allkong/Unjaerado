<?php
$connect = mysqli_connect("127.0.0.1", "root", "password", "unjaerado") or die("fail");

$id = $_POST['name'];                   //Writer
$title = $_POST['title'];               //Title
$content = $_POST['content'];           //Content
$date = date('Y-m-d H:i:s');            //Date

$URL = 'community';                   //return URL


$query = "INSERT INTO board (number, title, content, date, hit, id) 
        values(null,'$title', '$content', '$date', 0, '$id')";


$result = $connect->query($query);
if ($result) {
?> <script>
        alert("<?php echo "게시글 작성 성공" ?>");
        <?php header("Location: http://localhost/zero-waste/community");
        exit(); ?>
    </script>
<?php
} else {
    echo "게시글 작성 실패";
}

mysqli_close($connect);
?>