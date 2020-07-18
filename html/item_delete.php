<?php
$conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');
$del_sql = "DELETE FROM item_tb WHERE item_num = '{$_POST['item']}'";
mysqli_query($conn, $del_sql);
header("location:index.php");
?>
