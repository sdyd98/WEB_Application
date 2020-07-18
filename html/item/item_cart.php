<?php
    // mysql에 연결
    $conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');

    // 해당 아이템이 장바구니에 있는지 확인
    $check_sql = "SELECT * from item_cart where user_id = '{$_POST['user_id']}' AND item_name = '{$_POST['item_name']}' AND img_url = '{$_POST['img_url']}'";

    $result = mysqli_query($conn, $check_sql);

    $row = mysqli_num_rows($result);

    // 만약 아이템이 있다면
    if($row == 1){
        echo "수량증가";

        // 장바구니에 아이템이 존제한다면 수량을 1증가
        $insert_item_quantity = "UPDATE item_cart SET item_quantity = item_quantity + 1 WHERE user_id = '{$_POST['user_id']}' AND item_name = '{$_POST['item_name']}' AND img_url = '{$_POST['img_url']}'";
        mysqli_query($conn, $insert_item_quantity);
    }else{
        echo "아이템추가";

        // 장바구니에 아이템을 추가할 sql문
        $insert_item_sql = "INSERT INTO item_cart(user_id,img_url,item_name,item_price,item_quantity) VALUES('{$_POST['user_id']}','{$_POST['img_url']}','{$_POST['item_name']}','{$_POST['item_price']}','{$_POST['item_quantity']}')";
        mysqli_query($conn, $insert_item_sql);
    }

    

?>