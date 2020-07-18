<?php session_start();
$conn = mysqli_connect('localhost', 'shin', 'Tlsdlswo!1', 'user_db');
date_default_timezone_set('Asia/Seoul');
$buy_sql = "INSERT INTO buy_item (id,item_title,item_price) VALUES('{$_SESSION['user_id']}','{$_POST['item_name']}','{$_POST['item_price']}')";
mysqli_query($conn, $buy_sql);
$sql = "DELETE FROM item_cart WHERE user_id = '{$_SESSION['user_id']}'";
mysqli_query($conn, $sql);
?>