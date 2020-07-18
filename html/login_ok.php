<?php
session_start();
$user_id = $_POST['uid'];
$_SESSION['user_id'] = $user_id;

$conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');
$sql = "INSERT INTO total_visit_user (id,date) VALUES('$user_id','".date("Y-m-d H:i:s")."')";

mysqli_query($conn,$sql);

?>
<script>
    history.go(-2);
</script>
