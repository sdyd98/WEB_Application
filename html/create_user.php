<?php

    // post 방식으로 아이디와 비밀번호를 받는다
    // Post 방식에 key 값은 Tag 에 name 값이다.
    $user_id = $_POST['sign_id'];
    $user_pw = $_POST['sign_pw'];

    // mysql 연결 부분 ( mysql 의 아이디와 비밀번호를 적어야 한다 !)
    $conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');


    
    // 쿼리문
    $sql = "INSERT INTO user_tb (id, password) VALUES('$user_id','$user_pw')";

    // 오늘 가입한 테이블
    $sql2 = "INSERT INTO today_user (id, ip) VALUES('$user_id','{$_SERVER['REMOTE_ADDR']}')";


    // 쿼리문 보냄
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sql2);

    // 이동할 위치
    header('Location:index.php');

?>
