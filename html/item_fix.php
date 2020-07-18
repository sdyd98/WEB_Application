<?php session_start();
$conn = mysqli_connect('localhost', 'shin', 'Tlsdlswo!1', 'user_db');
$sql = "SELECT * FROM item_tb WHERE item_num = '{$_POST['item']}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Insert title here</title>
    <style media="screen">
        body {}
    </style>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- include libraries(jQuery, bootstrap) -->
    <!-- summernote홈페이지에서 받은 summernote를 사용하기 위한 코드를 추가 -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js -->
    <!-- 이 css와 js는 로컬에 있는 것들을 링크시킨 것이다. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <!-- include summernote-ko-KR -->
    <!-- <script src="lang/summernote-ko-KR.js"></script> -->



    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style media="screen">
        .panel {

            margin: auto;
            margin-top: 20px;
        }

        #button {
            display: block;
            margin-top: 50px;
            text-align: center;
        }

        .edit_box {
            height: auto;
            width: 800px;
            margin: auto;
        }

        /* 메뉴바 드롭다운 */
        .menubar {
            /* border:none;
    border:0px;
    margin:0px;
    padding:0px; */
            font: 67.5% "Lucida Sans Unicode", "Bitstream Vera Sans", "Trebuchet Unicode MS", "Lucida Grande", Verdana, Helvetica, sans-serif;
            font-size: 14px;
            font-weight: bold;
        }

        .menubar ul {
            /* background: rgb(109,109,109); */
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .menubar li {
            float: left;
            padding: 0px;
        }

        .menubar li a {
            /* background: rgb(109,109,109); */
            color: #cccccc;
            display: block;
            font-weight: normal;
            padding: 0px 25px;
            text-align: center;
            text-decoration: none;
        }

        .menubar li a:hover,
        .menubar ul li:hover a {
            /* background: rgb(71,71,71); */
            color: #FFFFFF;
            text-decoration: none;
        }

        .menubar li ul {
            display: none;
            /* 평상시에는 드랍메뉴가 안보이게 하기 */
            height: auto;
            padding: 2px;
            margin: 0px;
            border: 0px;
            position: absolute;
            width: 200px;
            z-index: 200;
            /*top:1em;
    /*left:0;*/
        }

        .menubar li:hover ul {
            display: block;
            /* 마우스 커서 올리면 드랍메뉴 보이게 하기 */
        }

        .menubar li li {
            background: rgb(109, 109, 109);
            display: block;
            float: none;
            margin: 0px;
            padding: 0px;
            width: 200px;
        }

        .menubar li:hover li a {
            background: none;
        }

        .menubar li ul a {
            display: block;
            height: 50px;
            font-size: 12px;
            font-style: normal;
            margin: 0px;
            padding: 15px 20px 0px 15px;
            text-align: left;
        }

        .menubar li ul a:hover,
        .menubar li ul li:hover a {
            background: rgb(71, 71, 71);
            border: 0px;
            color: #ffffff;
            text-decoration: none;
        }

        .menubar p {
            clear: left;
        }
    </style>



</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container menubar">
            <a class="navbar-brand js-scroll-trigger" href="index.php">Team Nova</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="index.php">홈</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#">카테고리</a>
                        <ul>
                            <li><a href="item/listings1.html?category=1">상품 카테고리1</a></li>
                            <li><a href="item/listings2.html?category=2">상품 카테고리2</a></li>
                            <li><a href="item/listings3.html?category=3">상품 카테고리3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <?php
                        $check = $_SESSION['user_id'];
                        // 로그인 되었을때
                        if (isset($check)) {
                            echo "<a class='nav-link js-scroll-trigger' style='text-transform:none' href='user_profile.php'>" . $check . "</a>";
                        } else {
                            echo "<a class='nav-link js-scroll-trigger' href='login.php'>로그인</a>";
                        };
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        //id가 description인 것을 summernote 방식으로 적용하라는 의미이다.
        //높이와 넓이를 설정하지 않으면 화면이 작게 나오기때문에 설정해주어야 한다.
        $(function() {
            $("#description").summernote({
                height: 300,
                width: 800,
                focus: true,
                lang: 'ko-KR' // 기본 메뉴언어 US->KR로 변경


            });
        });
    </script>
    <form action="item_fix_create.php" method="post" enctype="multipart/form-data" onsubmit="return submit_check()">

        <div class="edit_box">
            <h4 style="margin-bottom:12px">게시판 선택</h4>

            <select id="taskOption" name="taskOption">
                <option>게시판 선택</option>
                <option>카테고리1</option>
                <option>카테고리2</option>
                <option>카테고리3</option>
            </select>

            <h4 style="margin-top:20px">제목 입력</h4>
            <input type="text" name="item_title" id="uid" class="form-control" placeholder="상품 이름을 입력하세요." required autofocus value="<?= $row['item_title'] ?>"><BR>

            <h4 style="margin-top:20px">가격 입력</h4>
            <input type="text" name="item_price" id="item_price" class="form-control" placeholder="가격을 입력하세요." value="<?= $row['item_price']?>"><BR>

            <h4>내용 입력</h4>
            <textarea id="description" name="description"><?= $row['item_description'] ?></textarea>

            <h4 style="margin-top: 50px;">상품 이미지 선택</h4>

            <img id="image" width="300px" src="<?= $row['imgurl'] ?>" />

            <input type="file" size=100 id="fileToUpload" name="fileToUpload" /><br>

            <input type="hidden" name="item" value="<?php echo "{$_POST['item']}" ?>">

        <span id="button">
              <button name="submit" id="btn-Yes" class="btn btn-lg btn-primary btn-block" type="submit">등록</button>
        </span>
        </div>

    </form>


    <script type="text/javascript">
        // 로그인이 안되어 있다면 버튼 숨기 ($_SESSION 변수가 알고있음)
        var test = '<?= $_SESSION['user_id'] ?>';
        if (!test) {
            $('#item_write').hide();
            $('#user_logout').hide();
        } else {
            $('#item_write').show();
            $('#user_logout').show();
        }

        $("#taskOption").val("<?= $row['category_name'] ?>").attr("selected", "selected");

        // 프리뷰 이미지
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function submit_check(){
            var check = true;
            if($('#taskOption').val() === "게시판 선택"){
                swal("등록 불가!", "카테고리를 선택해주세요", "warning");
                $('#taskOption').focus();
                check = false;
            }else{
                if(!$.isNumeric($('#item_price').val())){
                swal("등록 불가!", "가격에 숫자만 입력해주세요", "warning");
                $('#item_price').focus();
                check = false;
                }else{
                    var description_check = $('#description').val();
                    if($('#description').val() === "<p><br></p>" || !description_check){
                    swal("등록 불가!", "내용을 입력해주세요", "warning");
                    check = false;
                    }else{
                        swal("상품 수정!", "상품이 수정 되었습니다!", "success");
                    }
                }
            }
            return check;
        }



        $("#fileToUpload").change(function() {
            readURL(this);
        });
    </script>

</body>

</html>