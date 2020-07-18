<?php
    $conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');
    $item_cart_del_sql = "delete from item_cart where user_id = '{$_POST['user_id']}' AND img_url = '{$_POST['img_url']}'";
    mysqli_query($conn, $item_cart_del_sql);
?>