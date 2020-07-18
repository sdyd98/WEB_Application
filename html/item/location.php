<?php session_start();

$conn = mysqli_connect('localhost', 'shin', 'Tlsdlswo!1', 'user_db');

$sql = "SELECT * FROM item_tb WHERE item_num = '{$_GET['item']}'";


$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);

date_default_timezone_set('Asia/Seoul');
$sql2 = "INSERT INTO view_item (item_title,ip,date) VALUES('{$row[item_title]}','{$_SERVER['REMOTE_ADDR']}','" . date("Y-m-d H:i:s") . "')";

mysqli_query($conn, $sql2);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>item view</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

    <!-- 웹 타이틀 아이콘 설정 -->
    <link rel="shortcut icon" href="ftco-32x32.png">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">


    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../css/agency.min.css" rel="stylesheet">
    <link href="../css/one-page-wonder.min.css" rel="stylesheet">
    <link href="../css-buttons-master/styles/bootstrap.min.css" rel="stylesheet">
    <link href="../css-buttons-master/styles/buttons.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

                         
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwlNqAEil52XRPHmSVb4Luk18qQG9GqcM&sensor=false&language=en"></script> 
 
    <script> 
    function initialize() { 
        var myLatlng = new google.maps.LatLng(37.485717, 126.971969); // 좌표값
        var mapOptions = { 
            zoom: 14, // 지도 확대레벨 조정
            center: myLatlng, 
            mapTypeId: google.maps.MapTypeId.ROADMAP 
        } 
        var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions); 
        var marker = new google.maps.Marker({ 
        position: myLatlng, 
        map: map, 
        title: "서울특별시 동작구 사당동 1131-7" // 마커에 마우스를 올렸을때 간략하게 표기될 설명글
    }); 
    } 
    window.onload = initialize;
    </script>


    <style media="screen">
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

        #loadingImg
{
 position: absolute;
 width: 500px;
 height: 200px;
 left: 50%;
 top: 134%;
 margin-left: -250px;
 margin-top: -250px;
}

 
    </style>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>


        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container menubar">
                <a class="navbar-brand js-scroll-trigger" href="../index.php">Team Nova</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="../index.php">홈</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#carouselExampleControls">카테고리</a>
                            <ul>
                                <li><a href="listings1.php?category=1">상품 카테고리1</a></li>
                                <li><a href="listings1.php?category=2">상품 카테고리2</a></li>
                                <li><a href="listings1.php?category=3">상품 카테고리3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item" id="item_write">
                            <a class="nav-link js-scroll-trigger" href="../write.php">글쓰기</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="../item/location.php">회사정보</a>
                        </li>

                        <li class="nav-item">
                            <?php
                            $check = $_SESSION['user_id'];
                            // 로그인 되었을때
                            if (isset($check)) {
                                if( $check === "admin"){
                                    echo "<a class='nav-link js-scroll-trigger' href='../admin/index.php' style='margin-top:1px; text-transform:none'>" . $check . "</a>";                                
                                }else{
                                    echo "<a class='nav-link js-scroll-trigger' href='../user/buyinfo.php' style='margin-top:1px; text-transform:none'>" . $check . "</a>";
                                }
                            } else {
                                echo "<a class='nav-link js-scroll-trigger' href='../login.php'>로그인</a>";
                            };
                            ?>
                        </li>
                        <li class="nav-item" id="user_logout">
                            <a class="nav-link js-scroll-trigger" href="../logout.php">로그아웃</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-5 mx-auto mt-lg-5 text-center">
                        <h1>회사정보</h1>
                    </div>
                </div>
            </div>

            <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
        </div>



        <div class="site-section" id="property-details">
            <div class="container">
                <h2 style="margin-bottom:20px; display:block;">회사소개</h2>
                <p style="margin-bottom:80px; display:block;">저희 회사는 가구를 판매, 제작하는 회사입니다. <br/> tel: 010-1234-1234</p>
                <div class="row">
                <h2 style="margin-bottom:20px;">회사 위치</h2>
            <div id="map_canvas" style="width: 100%; height: 400px; margin:0px;"></div>
                </div>
                   <!--Form with header-->

                   <form method="post" style="margin-top:50px" data-email="sdyd98@gmail.com">
                   <h2 style = "margin-bottom:20px;">문의하기</h2>
                        <div class="card rounded-0">
                            <div class="card-header p-0">
                                <div class="bg-info text-white text-center py-2">
                                    <h3><i class="fa fa-envelope"></i> Contact </h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="이름" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="이메일" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea id="description" name="description" class="form-control" placeholder="문의사항" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="button" value="Send mail" class="btn btn-info btn-block rounded-0 py-2" onclick="send_mail()">
                                </div>
                            </div>

                        </div>
                    </form>
            </div>
        </div>

        
        <!-- Footer -->
        <footer class="py-5 bg-black">
            <div class="container">
                <p class="m-0 text-center text-white small">Team Nova &copy; 5기 신인재</p>
            </div>
            <!-- /.container -->
        </footer>

    </div> <!-- .site-wrap -->

    <a href="#top" class="gototop"><span class="icon-angle-double-up"></span></a>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/agency.min.js"></script>

    <script type="text/javascript">
        // 로그인이 안되어 있다면 버튼 숨기 ($_SESSION 변수가 알고있음)
        var user = '<?= $_SESSION['user_id'] ?>';

        var item_writer = '<?= $row['item_writer']?>';

        if (!user) {
            $('#item_write').hide();
            $('#user_logout').hide();
        } else {
            $('#item_write').show();
            $('#user_logout').show();
        }

        if(user !== item_writer){
            $('#fix').hide();
            $('#del').hide();
        }else{
            $('#fix').show();
            $('#del').show();
        }

        function send_mail(){
            LoadingWithMask();
            $.ajax({
                    type: "POST",
                    url: "https://script.google.com/macros/s/AKfycby_aIR5wBI3N90reveUwbvWoGe2PxGGvE_02T7tRsla_OfdSA/exec",
                    data: {
                        name:$('#name').val(),
                        email:$('#email').val(),
                        description:$('#description').val()
                    },
                    dataType: "text",
                    error: function() {
                        alert('통신실패!!');
                    },
                    success: function(res) {
                        closeLoadingWithMask();
                        alert('메일 전송 성공!');
                        $('#name').val('');
                        $('#email').val('');
                        $('#description').val('');
                        $('html').animate( { scrollTop : 0 }, 1000 )
                    }
                })
                }

        
        function LoadingWithMask() {
            //화면의 높이와 너비를 구합니다.
            var maskHeight = $(document).height();
            var maskWidth  = window.document.body.clientWidth;
     
            //화면에 출력할 마스크를 설정해줍니다.
            var mask       ="<div id='mask' style='position:absolute; z-index:9000; background-color:#000000; display:none; left:0; top:0;'></div>";
            var loadingImg ='';
      
            loadingImg +="<div id='loadingImg'>";
            loadingImg +="<img src='LoadingImg.gif' style='position: relative; display: block; margin: 0px auto;'/>";
            loadingImg +="</div>"; 
  
            //화면에 레이어 추가
            $('body')
                .append(mask)
                .append(loadingImg)
        
            //마스크의 높이와 너비를 화면 것으로 만들어 전체 화면을 채웁니다.
            $('#mask').css({
                    'width' : maskWidth
                    ,'height': maskHeight
                    ,'opacity' :'0.3'
            });
  
            //마스크 표시
            $('#mask').show();  
  
            //로딩중 이미지 표시
            $('#loadingImg').show();
            }

            function closeLoadingWithMask() {
                $('#mask, #loadingImg').hide();
                $('#mask, #loadingImg').remove(); 
            }





        
        
    </script>

</body>

</html>