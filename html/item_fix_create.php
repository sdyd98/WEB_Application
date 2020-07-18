<?php
 session_start();

 // 이미지 파일명 랜덤으로 뽑아주는 메소드
 function generateRandomString($length = 10) {
     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $charactersLength = strlen($characters);
     $randomString = '';
     for ($i = 0; $i < $length; $i++) {
         $randomString .= $characters[rand(0, $charactersLength - 1)];
     }
     return $randomString;
 }

 // 파일을 저장할 디렉토리
 $target_dir = "./img/";

 // 파일 이름 설정
 $img_filename = generateRandomString();


 // strtolower 대문자를 소문자로 변환 하는 함수
 // pathinfo 파일 경로에 대한 정보를 반환d
 // PATHINFO_EXTENSION 옵션 확장자 출력
 // 결국 $imageFileType은 파일에 확장자를 가지고있음
 $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));

 // // 파일 이름 암호화 시키기
 // // base name() = 파일 이름과 확장자 추출
 // $hashed = base64_encode(hash('sha256', basename($_FILES["fileToUpload"]["name"]), true));


 // target_file = 저장될 위치와 저장될 파일의 이름
 $target_file = $target_dir . $img_filename .".".$imageFileType;

 //업로드 OK
 $uploadOk = 1;

 // 만약 submit이라는 키를 가진 값이 날라왔을때 값이 있다면
 if(isset($_POST["submit"])) {
     // 파일에 대한 정보 저장
     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

     // 파일이 이미지로 잘 왔다면
     if($check !== false) {
         echo "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
     }

     // 파일이 이미지가 아니라면
     else {
         echo "File is not an image.";
         $uploadOk = 0;
     }
 }

 // file_exists 파일이 있는지 없는지 확인하는 함수
 // 서버에 같은 이름의 파일이 있다면
 if (file_exists($target_file)) {
     echo "Sorry, file already exists.";
     $uploadOk = 0;
 }

 // Check file size
 // 파일 사이즈 제한
 if ($_FILES["fileToUpload"]["size"] > 5000000) {
     echo "Sorry, your file is too large.";
     $uploadOk = 0;
 }

 // Allow certain file formats
 // 다른 타입의 이미지라면
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
        }

 // Check if $uploadOk is set to 0 by an error
 // 위 조건중에 하나라도 걸렸다면 업로드 실패
 if ($uploadOk == 0) {
        
        // mysql에 연결 정보
        $conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');
         
         
        $sql = "SELECT * FROM item_tb WHERE item_num = '{$_POST['item']}'";

        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        $imgurl = $row['imgurl'];

        $sql = "
                  UPDATE item_tb SET
                  category_name = '{$_POST['taskOption']}',
                  item_title = '{$_POST['item_title']}',
                  item_description = '{$_POST['description']}',
                  imgurl = '$imgurl'
                  WHERE item_num = '{$_POST['item']}'";

         mysqli_query($conn,$sql);
         
         mysqli_close($conn);

         

 }
 // 다 통과 했다면
  else {
         // temp에 저장되어 있는 파일을 지정한 위치로 옮긴다 --> $target_file
     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
 		/*database에 업로드 정보를 기록하자.
 		- 파일이름(혹은 url)
 		- 파일사이즈
 		- 파일형식
 		*/
     // 이미지 파일 위치 url 저장
 		$imgurl = "https://teamshin.shop/img/". $img_filename . "." .$imageFileType;

     // 파일에 사이즈 저장 하는 변수
 		$size = $_FILES["fileToUpload"]["size"];

     // mysql에 연결 정보
 		$conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');

    $sql = "
    UPDATE item_tb SET
                  category_name = '{$_POST['taskOption']}',
                  item_title = '{$_POST['item_title']}',
                  item_description = '{$_POST['description']}',
                  imgurl = '$imgurl'
                  WHERE item_num = '{$_POST['item']}'";

 		mysqli_query($conn,$sql);

 		mysqli_close($conn);
 }
} 

header('Location:https://teamshin.shop/item/property-single.php?item='.$_POST['item'].'');

?>

