<!--process.php-->
<?php
   $option = isset($_POST['taskOption']) ? $_POST['taskOption'] : false;
   if ($option) {
      echo $_POST['taskOption'];
   } else {
     echo "task option is required";
     exit;
   }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>

    </body>
</html>
