<?php
       $check_id = $_GET['Check_id'];
       $check_pw = $_GET['Check_pw'];
       $conn = mysqli_connect('localhost', 'shin', 'Tlsdlswo!1', 'user_db');
       $sql =  "SELECT * FROM user_tb WHERE id = '$check_id' AND password = '$check_pw'";
       $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_array($result);
       if($row['id'] === $check_id && $row['password'] === $check_pw){
          echo "로그인 성공";
       }else{
          echo "로그인 실패";
       }
