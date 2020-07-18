<?php
$check_id = $_GET['a'];
$conn = mysqli_connect('localhost', 'shin', 'Tlsdlswo!1', 'user_db');

$sql =  "SELECT * FROM user_tb WHERE id = '$check_id'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
if ($row['id'] === $check_id) {
    echo "이미 존재하는 아이디입니다";
} else {
    echo "사용가능한 아이디입니다";
}
?> 