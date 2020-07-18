<?php
    $conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');
    $sql = "UPDATE user_tb SET permission = '{$_POST['permission']}' WHERE id = '{$_POST['id']}'";
    mysqli_query($conn,$sql);
?>
