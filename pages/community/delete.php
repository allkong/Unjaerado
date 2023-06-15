<?php
$connect = mysqli_connect('127.0.0.1', 'root', 'pasword', 'unjaerado') or die("connect failed");
$number = $_GET['number'];

$query = "select id from board where number = $number";
$result = $connect->query($query);
$rows = mysqli_fetch_assoc($result);

$userid = $rows['id'];

@session_start();

$URL = "community";
?>

<?php
if (!isset($_SESSION['userid'])) {
?> <script>
        alert("������ �����ϴ�.");
        location.replace("<?php echo $URL ?>");
    </script>

<?php } else if ($_SESSION['userid'] == $userid) {
    $query1 = "delete from board where number = $number";
    $result1 = $connect->query($query1); ?>
    <script>
        alert("�Խñ��� �����Ǿ����ϴ�.");
        location.replace("<?php echo $URL ?>");
    </script>

<?php } else { ?>
    <script>
        alert("������ �����ϴ�.");
        location.replace("<?php echo $URL ?>");
    </script>
<?php }
?>