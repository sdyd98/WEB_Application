<?php session_start();

// 로그찍기
function Console_log($data)
{
    echo "<script>console.log( 'PHP_Console: " . $data . "' );</script>";
}

// url에 page 변수가 있다면 
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} 
// 없다면 1을 설정
else {
    $page = 1;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>html test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Free-Template.co" />

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

    <style media="screen">
        .site-section {
            width: 1400px;
            margin: 0 auto;
        }

        .col-md-9 {
            margin: 0 auto;
        }

        .img-fluid {
            height: 350px;
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

        .ftco-media-1>.ftco-media-1-inner:after {
            background: rgb(0, 0, 0, 0.8);
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
                                echo "<a class='nav-link js-scroll-trigger' style='text-transform:none' href='user_profile.php'>" . $check . "</a>";
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


        <div class="site-blocks-cover overlay" style="background-image: url(images/hero_1.jpg);" data-aos="fade" id="home-section">


            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6 mt-lg-5 text-center">
                        <h1>상품 카테고리<?= $_GET['category'] ?></h1>
                        <p class="mb-5">상품 카테고리 설명</p>

                    </div>
                </div>
            </div>

            <a href="#listings-section" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
        </div>


        <!-- 상품 시작  -->
        <div class="site-section" id="listings-section">
            <div class="col-md-9 order-2 order-md-1">
                <div class="row large-gutters">

                    <?php
                    // 연결 
                    $conn = mysqli_connect('localhost', 'shin', 'Tlsdlswo!1', 'user_db');
                    // url에 해당하는 카테고리 컬럼을 다 가져옴
                    $sql = "SELECT * FROM item_tb WHERE category_name = '카테고리" . $_GET['category'] . "'";

                    $list = '';

                    $data2 = mysqli_query($conn, $sql);

                    // 해당 카테고리 아이템 전체 갯수 
                    $item_num = mysqli_num_rows($data2);

                    // 보여주기 시작할 아이템에 번호
                    $Start_num = ($page - 1) * 6;

                    // 몇개 가져올지
                    $End_num = 6;

                    // 보여줄 아이템 가져옴
                    $sql2 = "SELECT * FROM item_tb WHERE category_name = '카테고리" . $_GET['category'] . "' ORDER BY item_num DESC limit $Start_num,$End_num";

                    // 쿼리문 날림 
                    $result = mysqli_query($conn, $sql2);



                    // 쿼리문에 결과를 토대로 while문 작동
                    while ($row = mysqli_fetch_array($result)) {

                        $category_num = preg_replace("/[^0-9]*/s", "", $row['category_name']);
                        $list = $list . ' <div class="col-md-6 col-lg-4 mb-5 mb-lg-5 ">
                                            <div class="ftco-media-1">
                                                <div class="ftco-media-1-inner">
                                                    <a href="property-single.php?category=' . $category_num . '&item=' . $row['item_num'] . '" class="d-inline-block mb-4"><img src="' . $row['imgurl'] . '" alt="Image" class="img-fluid"></a>
                                                    <div class="ftco-media-details">
                                                        <h3>' . $row['item_title'] . '</h3>
                                                    <p>' . number_format($row['item_price']) . ' ₩</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                    }
                    echo $list;
                    ?>
                </div>
            </div>
        </div>

        <!-- 페이징  -->
        <div class="row mt-4">
            <div class="col-md-9">

                <div class="custom-pagination text-center" style="margin-bottom:50px">
                
                    <?php

                    // 나눌 페이지 수
                    $split_page = 5;

                    // 현재 페이지
                    $this_page = $page;


                    // 페이지 위치 찾기 (몫이 페이지 블럭에 위치를 알려줌)
                    $page_block = floor($this_page/$split_page);

                    // 만약 나머지가 0이라면 
                    if($this_page%$split_page === 0){
                        $page_block = $page_block - 1;
                    }

                    // 전체 페이지수
                    $block = ceil($item_num / 6);

                    if(($block - ($page_block+1)*5) > 0){
                        $End_page_num = 5;    
                    }else{
                        $End_page_num = $block%5;
                    }
                    
                    if($page_block*5 != "0"){
                        echo '<a style="margin-right:15px" href="https://teamshin.shop/item/listings1.php?category=' . $_GET["category"] . '&page=' . (($page_block*5) - 1) . '"> 이전 </a>';
                    }
                    
                    // 페이지 시작점 
                    for ($i =($page_block*5); $i < ($page_block*5)+$End_page_num; $i++) {
                        echo '<a style="margin-right:15px" href="https://teamshin.shop/item/listings1.php?category=' . $_GET["category"] . '&page=' . ($i + 1) . '">' . ($i + 1) . '</a>';
                    }

                    if($block > ($page_block*5)+$End_page_num){
                        echo '<a style="margin-right:15px" href="https://teamshin.shop/item/listings1.php?category=' . $_GET["category"] . '&page=' . (($page_block*5)+$End_page_num + 1) . '"> 다음 </a>';
                        
                    }
                    
                    ?>

                </div>

            </div>
        </div>
    </div>



    <!-- <div class="site-section" id="properties-section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-7 text-left">
                    <h2 class="section-title mb-3">다른 상품</h2>
                </div>
                <div class="col-md-5 text-left text-md-right">
                    <div class="custom-nav1">
                        <a href="#" class="custom-prev1">이전</a><span class="mx-3">/</span><a href="#" class="custom-next1">다음</a>
                    </div>
                </div>
            </div>

            <div class="owl-carousel nonloop-block-13 mb-5">

                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item1.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품1.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item2.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품2.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>

                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item3.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품3.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item4.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품4.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item5.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품5.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item6.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품6.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item7.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품7.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item8.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품8.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item9.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품9.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item10.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품10.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item11.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품11.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item12.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품12.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item13.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품13.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item14.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품14.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item15.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품15.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item16.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품16.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item17.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품17.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>


                <div class="ftco-media-1">
                    <div class="ftco-media-1-inner">
                        <a href="property-single.php" class="d-inline-block mb-4"><img src="../img/furniture/item18.jpg" alt="Image" class="img-fluid"></a>
                        <div class="ftco-media-details">
                            <h3>상품18.</h3>
                            <p>상품 설명</p>
                            <strong>$20,000,000</strong>
                        </div>

                    </div>
                </div>



            </div>

        </div>
    </div> -->


    <!-- Footer -->
    <footer class="py-5 bg-black">
        <div class="container">
            <p class="m-0 text-center text-white small">Team Nova &copy; 5기 신인재</p>
        </div>
        <!-- /.container -->
    </footer>



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
        var test = '<?= $_SESSION['user_id'] ?>';
        if (!test) {
            $('#item_write').hide();
            $('#user_logout').hide();
        } else {
            $('#item_write').show();
            $('#user_logout').show();
        }
    </script>

</body>

</html>