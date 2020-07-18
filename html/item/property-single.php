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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


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
                        <h1><?php

                            echo $row['item_title'];

                            $imgurl = $row['imgurl'];

                            echo '<p class="mb-5"><strong class="text-white">' . number_format($row['item_price']) . '₩</strong></p>';

                            ?></h1>


                    </div>
                </div>
            </div>

            <a href="#property-details" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
        </div>



        <div class="site-section" id="property-details">
            <div class="container">
                <div class="row">

                    <div class="col-lg-7">
                        <div class="owl-carousel slide-one-item with-dots">
                            <div><img src="<?= $imgurl ?>" alt="Image" class="img-fluid" style="height:500px"></div>
                            <div><img src="<?= $imgurl ?>" alt="Image" class="img-fluid" style="height:500px"></div>
                            <div><img src="<?= $imgurl ?>" alt="Image" class="img-fluid" style="height:500px"></div>

                        </div>

                        <div style="margin-top:30px">
                            <input id="fix"type="button" onclick="fix()" style="padding: .2rem 1rem; font-size:1rem; line-height:1.3;" class="btn btn-outline-dark btn-lg" value="수정" />
                            <input id="del"type="button" onclick="del()" style="padding: .2rem 1rem; font-size:1rem; line-height:1.3;" class="btn btn-outline-dark btn-lg" value="삭제" />
                        </div>
                    </div>

                    <div class="col-lg-5 pl-lg-5 ml-auto">
                        <div class="mb-5">
                            <h3 class="text-black mb-4">상품 설명</h3>
                            <?= $row['item_description']; ?>
                            <a style="display: block; width: 100%; font-size: 18px; padding: 8px; color:white;" class="btn btn-dark" onclick = "item_buy()">구매하기</a>
                            <a style="display: block; width: 100%; font-size: 18px; padding: 8px; margin-top:20px;" class="btn btn-light" onclick = "cart_item()">장바구니 담기</a>
                        </div>
                        <div class="mb-5">
                        </div>
                    </div>
                </div>
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

        // 삭제
        function del() {
            
            swal({
            title: "정말 삭제 하시겠습니까?",
            text: "게시글은 복구 할 수 없습니다.",
            icon: "warning",
            dangerMode: true,
            })
            .then(willDelete => {
                if (willDelete) {
                swal("삭제 성공!", "삭제 되었습니다!", "success");
                var form = document.createElement("form");

            form.setAttribute("charset", "UTF-8");

            form.setAttribute("method", "Post"); //Post 방식

            form.setAttribute("action", "../item_delete.php"); //요청 보낼 주소



            var hiddenField = document.createElement("input");

            hiddenField.setAttribute("type", "hidden");

            hiddenField.setAttribute("name", "item");

            hiddenField.setAttribute("value", <?= $_GET['item'] ?>);

            form.appendChild(hiddenField);

            document.body.appendChild(form);

            form.submit();
            }
            });


            
        }

        // 수정
        function fix() {
            var form = document.createElement("form");

            form.setAttribute("charset", "UTF-8");

            form.setAttribute("method", "Post"); //Post 방식

            form.setAttribute("action", "../item_fix.php"); //요청 보낼 주소



            var hiddenField = document.createElement("input");

            hiddenField.setAttribute("type", "hidden");

            hiddenField.setAttribute("name", "item");

            hiddenField.setAttribute("value", <?= $_GET['item'] ?>);

            form.appendChild(hiddenField);

            document.body.appendChild(form);

            form.submit();

        }

        // 장바구니 추가하기 메소드
        function cart_item() {

            var check = "<?=$_SESSION['user_id']?>";
            if(!check){


                Swal.fire({
                icon: 'error',
                title: '로그인',
                text: '로그인 하신후 이용해주세요!'
                })

                location.href="../login.php";

                
            }else{

                $.ajax({
            type: "POST",
            url: "./item_cart.php",
            async:false,
            data: {
                user_id : "<?=$_SESSION['user_id']?>",
                img_url : "<?=$imgurl?>",
                item_name : "<?=$row['item_title']?>",
                item_price : "<?=$row['item_price']?>",
                item_quantity : "1"
            },
            dataType: "text",
            error: function() {
                alert('통신실패!!');
            },
            success: function(res) {
                if(res === "수량증가"){
                    Swal.fire(
                        '수량 추가!',
                        '장바구니에 같은 물건이 있어 수량을 추가 하였습니다!',
                        'success'
                        )
                }else{
                    Swal.fire(
                        '상품 추가!',
                        '상품을 장바구니에 추가 하였습니다!',
                        'success'
                        )
                }

            }
        });
                
            }
        }

        function item_buy() {
            var check = "<?=$_SESSION['user_id']?>";
            if(!check){

                Swal.fire({
                icon: 'error',
                title: '로그인',
                text: '로그인 하신후 이용해주세요!'
                })

                location.href="../login.php";

            }else{
                var form=document.createElement("form");
                form.name='tempPost';
                form.method='post';
                form.action="../cart/checkout.php";
                
                var input = document.createElement("input");
                input.type="hidden";
                input.name='item_price';
                input.value= "<?=number_format($row['item_price'])?> 원";
                $(form).append(input);

                var input2 = document.createElement("input");
                input2.type="hidden";
                input2.name='item_name';
                input2.value= "<?=$row['item_title']?>";
                $(form).append(input2);
                
                document.body.appendChild(form);
                form.submit();
            }

        }
    </script>

</body>

</html>