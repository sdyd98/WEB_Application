<?php
    $conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');
    $sql = "DELETE FROM today_visit";
    mysqli_query($conn,$sql);
?>