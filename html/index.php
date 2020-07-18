<?php
session_start();

$conn = mysqli_connect('localhost', 'shin', 'Tlsdlswo!1', 'user_db');

// 로그찍기
function Console_log($data)
{
    echo "<script>console.log( 'PHP_Console: " . $data . "' );</script>";
}

if(isset($_COOKIE["visit_bool"])){

}else{
    setcookie("visit_bool", "true", time() + 3600, "/");
    date_default_timezone_set('Asia/Seoul');
    $sql = "INSERT INTO today_visit (client_ip,visit_date,refer) VALUES('{$_SERVER['REMOTE_ADDR']}','".date("Y-m-d H:i:s")."','{$_SERVER['HTTP_REFERER']}')";
    $sql2 = "INSERT INTO total_visit (client_ip,date,refer) VALUES('{$_SERVER['REMOTE_ADDR']}','".date("Y-m-d H:i:s")."','{$_SERVER['HTTP_REFERER']}')";
    mysqli_query($conn,$sql);
    mysqli_query($conn,$sql2);

}

// 쿠키 삭제
//setcookie("cookie", "", 0, "/");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team Nova</title>
    <meta name="title" content="팀노바 신인재">
    <meta name="keywords" content="5기, 신인재, 팀노바">
    <meta name="description" content="5기 신인재 팀노바 php 작품.">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/one-page-wonder.min.css" rel="stylesheet">



    <style media="screen">
        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
        }


        /* 메인 화면 grid 설정 */
        .wrapper {
            display: grid;
            grid-template-columns: 50% 50%;
        }

        /* 메인 화면 오른쪽 이미지 */
        #main_image {
            height: 100vh;
            background-image: url(img/3main_image.jpg);
            background-position: center;
            background-size: cover;
        }

        /* 메인 화면 왼쪽 로고 이미지 */
        #logo_image {
            margin-top: 36%;
            margin-left: 11%;
            width: 330px;
            display: block;
        }

        /* 메인 화면 왼쪽 로고 텍스트 */
        #logo_text {
            color: #555555;
            font-size: 16px;
            font-weight: 300;
            margin-left: 12%;
            margin-top: 50px;
            font-family: 'Roboto', 'Noto Sans KR', 'Malgun Gothic', 'AppleSDGothicNeo', sans-serif;
        }

        /* 로고 텍스트 속 강조할 텍스트 */
        #logo_name {
            color: #000;
            font-weight: 400;
        }

        body {
            background: #fafafa;
        }

        .widget-area.blank {
            background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            -ms-box-shadow: none;
            -o-box-shadow: none;
            box-shadow: none;
        }

        body .no-padding {
            padding: 0;
        }

        .widget-area {
            background-color: #fff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            -moz-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            -ms-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            -o-box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            box-shadow: 0 0 16px rgba(0, 0, 0, 0.05);
            float: left;
            margin-top: 30px;
            padding: 25px 30px;
            position: relative;
            width: 100%;
        }

        .status-upload {
            background: none repeat scroll 0 0 #f5f5f5;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            float: left;
            width: 100%;
        }

        .status-upload form {
            float: left;
            width: 100%;
        }

        .status-upload form textarea {
            background: none repeat scroll 0 0 #fff;
            border: medium none;
            -webkit-border-radius: 4px 4px 0 0;
            -moz-border-radius: 4px 4px 0 0;
            -ms-border-radius: 4px 4px 0 0;
            -o-border-radius: 4px 4px 0 0;
            border-radius: 4px 4px 0 0;
            color: #777777;
            float: left;
            font-family: Lato;
            font-size: 14px;
            height: 142px;
            letter-spacing: 0.3px;
            padding: 20px;
            width: 100%;
            resize: vertical;
            outline: none;
            border: 1px solid #F2F2F2;
        }

        .status-upload ul {
            float: left;
            list-style: none outside none;
            margin: 0;
            padding: 0 0 0 15px;
            width: auto;
        }

        .status-upload ul>li {
            float: left;
        }

        .status-upload ul>li>a {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            color: #777777;
            float: left;
            font-size: 14px;
            height: 30px;
            line-height: 30px;
            margin: 10px 0 10px 10px;
            text-align: center;
            -webkit-transition: all 0.4s ease 0s;
            -moz-transition: all 0.4s ease 0s;
            -ms-transition: all 0.4s ease 0s;
            -o-transition: all 0.4s ease 0s;
            transition: all 0.4s ease 0s;
            width: 30px;
            cursor: pointer;
        }

        .status-upload ul>li>a:hover {
            background: none repeat scroll 0 0 #606060;
            color: #fff;
        }

        .status-upload form button {
            border: medium none;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            -ms-border-radius: 4px;
            -o-border-radius: 4px;
            border-radius: 4px;
            color: #fff;
            float: right;
            font-family: Lato;
            font-size: 14px;
            letter-spacing: 0.3px;
            margin-right: 9px;
            margin-top: 9px;
            padding: 6px 15px;
        }

        .dropdown>a>span.green:before {
            border-left-color: #2dcb73;
        }

        .status-upload form button>i {
            margin-right: 7px;
        }

        .img-fluid {
            height: 270px;
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
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Team Nova</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">홈</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#carouselExampleControls">카테고리</a>
                        <ul>
                            <li><a href="item/listings1.php?category=1">상품 카테고리1</a></li>
                            <li><a href="item/listings1.php?category=2">상품 카테고리2</a></li>
                            <li><a href="item/listings1.php?category=3">상품 카테고리3</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" id="item_write">
                        <a class="nav-link js-scroll-trigger" href="write.php">글쓰기</a>
                    </li>

                    <?php
                    $check = $_SESSION['user_id'];
                    if(isset($check)){
                        echo '<li class="nav-item"> <a class="nav-link js-scroll-trigger" onclick="test_node()">채팅</a> </li>';
                    }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="./item/location.php">회사정보</a>
                    </li>                    

                    <li class="nav-item">
                        <?php
                        $check = $_SESSION['user_id'];
                        // 로그인 되었을때
                            if (isset($check)) {
                                if( $check === "admin"){
                                    echo "<a class='nav-link js-scroll-trigger' href='admin/index.php' style='margin-top:1px; text-transform:none'>" . $check . "</a>";                                
                                }else{
                                    echo "<a class='nav-link js-scroll-trigger' href='user/buyinfo.php' style='margin-top:1px; text-transform:none'>" . $check . "</a>";
                                }
                            } else {
                                echo "<a class='nav-link js-scroll-trigger' href='login.php'>로그인</a>";
                            };
                        ?>
                    </li>
                    <li class="nav-item" id="user_logout">
                        <a class="nav-link js-scroll-trigger" href="logout.php">로그아웃</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- grid 배열을 이용한 이미지 정렬 -->
    <div class="wrapper" id="services">
        <div style="background: white">
            <img src="img/dlogo.PNG" id="logo_image">
            <p id="logo_text">PHP 5주차<br />팀노바 5기 <span id="logo_name"> 신인재 <br /></span></p>
        </div>
        <div id="main_image" class="btn"></div>
    </div>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <!-- 이안에서 for 3번돌고 6번 돌아야함 -->
            <?php

            $category_name = ['카테고리1', '카테고리2', '카테고리3'];

            $category_active = '카테고리1';


            for ($i = 0; $i < count($category_name); $i++) {

                // 카테고리별 게시글 불러오기 sql
                $sql = "SELECT * FROM item_tb WHERE category_name = '$category_name[$i]' ORDER BY item_num DESC LIMIT 6";

                // 쿼리문에 대한 결과
                $result = mysqli_query($conn, $sql);

                $list = '';

                // while 문으로 조지니까 됬다 ( 모든 정보를 다 가져옴 $row 안에 다있음 연관배열로 조지기 )
                while ($row = mysqli_fetch_array($result)) {
                    $category_num = preg_replace("/[^0-9]*/s","",$row['category_name']);
                    $list = $list . '<!-- 게시글 시작 -->
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link" href="item/property-single.php?category='.$category_num.'&item=' . $row['item_num'] . '">
                <div class="portfolio-hover">
                  <div class="portfolio-hover-content">
                    <i class="fas fa-plus fa-3x"></i>
                  </div>
                </div>
                <img class="img-fluid" src="' . $row['imgurl'] . '" alt="">
              </a>
              <div class="portfolio-caption">
                <h4>' . $row['item_title'] . '</h4>
                <p class="text-muted">'.number_format($row['item_price']).' ₩</p>
              </div>
            </div>
            <!-- 게시글 끝 -->';


                }

                // 전체틀 배열 크기만큼 찍기

                // 만약 내가 정해논 카테고리 이름이라면 atcive 붙이고 아니면 안붙임
                if ($category_active === $category_name[$i]) {
                    $active_tag = '<div class="carousel-item active">';
                } else {
                    $active_tag = '<div class="carousel-item">';
                }
                echo $active_tag .
                    '<section class="bg-light page-section" id="portfolio">
    				        <div class="container">

                     <div class="row">

                       <div class="col-lg-12 text-center">
                         <h2 class="section-heading text-uppercase">' . $category_name[$i] . '</h2>
                          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                        </div>
                     </div>

                     <div class="row">
                          ' . $list . '
                     </div>

                  </div>
                 </section>
                </div>';
            }
            ?>
        </div>
        <!-- 캐러셀 버튼 부분  -->
        <a class="carousel-control-prev " href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Footer -->
    <footer class="py-5 bg-black">
        <div class="container">
            <a style="display:block;" class="m-0 text-center text-white small" href= "./item/location.php">Team Nova &copy; 5기 신인재</a>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

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

        function test_node(){
            var form=document.createElement("form");
            form.name='tempPost';
            form.method='post';
            form.action="http://teamshin.shop:8080";
            
            var input = document.createElement("input");
            input.type="hidden";
            input.name='email';
            input.value= "<?=$_SESSION['user_id']?>";
            $(form).append(input);
            document.body.appendChild(form);
            form.submit();
        }


    </script>

</body>

</html>
