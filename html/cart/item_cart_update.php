<?php 
    $conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');
    $item_quantity_update_sql = "UPDATE item_cart SET item_quantity = '{$_POST['item_quantity']}' WHERE user_id = '{$_POST['user_id']}' AND img_url = '{$_POST['img_url']}'";
    mysqli_query($conn, $item_quantity_update_sql);

    $item_price_sql = "SELECT *, item_price*item_quantity AS 'result' FROM item_cart WHERE user_id = '{$_POST['user_id']}'";
    $item_price_result = mysqli_query($conn, $item_price_sql);

    $item_price_sum = 0;

    while($item_price_row = mysqli_fetch_array($item_price_result)){
        $item_price_sum = $item_price_sum + $item_price_row['result'];
    }

    echo number_format($item_price_sum)."원";

?>