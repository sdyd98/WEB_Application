<?php session_start();
    $conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');
    $cart_list_sql = "SELECT * FROM item_cart WHERE user_id = '{$_SESSION['user_id']}'";
    $result  = mysqli_query($conn, $cart_list_sql);
    $list = '';

    $item_price_sql = "SELECT *, item_price*item_quantity AS 'result' FROM item_cart WHERE user_id = '{$_SESSION['user_id']}'";
    $item_price_result = mysqli_query($conn, $item_price_sql);

    $item_price_sum = 0;

    while($item_price_row = mysqli_fetch_array($item_price_result)){
        $item_price_sum = $item_price_sum + $item_price_row['result'];
    }

    $item_cart_name_sql = "SELECT * FROM item_cart WHERE user_id = '{$_SESSION['user_id']}'";
    $item_cart_name_result = mysqli_query($conn, $item_cart_name_sql);
    $item_cart_name_row = mysqli_num_rows($item_cart_name_result);

    $item_cart_first_name_sql = "select item_name from item_cart where user_id = 'syt98' limit 1";
    $item_cart_first_name_result = mysqli_query($conn, $item_cart_first_name_sql);
    $item_cart_first_name2 = mysqli_fetch_array($item_cart_first_name_result);

    if($item_cart_name_row > 1){
        $item_cart_first_name =  $item_cart_first_name2['item_name']." 외 ".($item_cart_name_row-1)."개";
    }else{
        $item_cart_first_name =  $item_cart_first_name2['item_name'];
    }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Cart</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Oswald:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    

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

<body>
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
                            <li><a href="../item/listings1.php?category=1">상품 카테고리1</a></li>
                            <li><a href="../item/listings1.php?category=2">상품 카테고리2</a></li>
                            <li><a href="../item/listings1.php?category=3">상품 카테고리3</a></li>
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
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>


        <div class="cart-table-area section-padding-100" style="margin: auto;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>장바구니</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>상품</th>
                                        <th>가격</th>
                                        <th>수량</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        $list = $list . '
                                        <tr>
                                            <td class="cart_product_img">
                                                <img src="'.$row["img_url"].'" style="height:100px; width:133px;" alt="Product">
                                            </td>
                                            <td class="cart_product_desc">
                                                <h5>'.$row["item_name"].'</h5>
                                            </td>
                                            <td class="price">
                                                <span>'.number_format($row["item_price"]).' 원</span>
                                            </td>
                                            <td class="qty">
                                                <div class="qty-btn d-flex">
                                                    <p>수량</p>
                                                    <div class="quantity">
                                                        <input type="number" class="qty-text"  oninput="maxLengthCheck(this)" id="'.$row['img_url'].'" step="1" min="1" max="999" maxlength="3" name="quantity" onclick = "quantity_click(\''.$_SESSION['user_id'].'\',\''.$row['img_url'].'\')" value="'.$row['item_quantity'].'">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="button" value ="삭제" class="btn btn-dark" onclick = "item_del(\''.$row['img_url'].'\')"/>
                                            </td>
                                        </tr>
                                        ';
                                    }

                                    echo $list;
                                ?>

                                
                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>상품 총액</h5>
                            <ul class="summary-table">
                                <li><span>상품가격:</span> <span id = "total_price1"><?=number_format($item_price_sum)?>원</span></li>
                                <li><span>배달비:</span> <span>Free</span></li>
                                <li><span>총액:</span> <span id = "total_price2"><?=number_format($item_price_sum)?>원</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <button style="display: block; width: 100%; font-size: 18px; padding: 8px;" class="btn btn-dark" onclick = "buy_item()">구매하기</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- Footer -->
    <footer class="py-5 bg-black">
            <div class="container">
                <p class="m-0 text-center text-white small">Team Nova &copy; 5기 신인재</p>
            </div>
            <!-- /.container -->
        </footer>

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    <script type="text/javascript">

        // var item_price = "<?=$item_price_sum?>";

        // 로그인이 안되어 있다면 버튼 숨기 ($_SESSION 변수가 알고있음)
        var test = '<?= $_SESSION['user_id'] ?>';
        if (!test) {
            $('#item_write').hide();
            $('#user_logout').hide();
        } else {
            $('#item_write').show();
            $('#user_logout').show();
        }
        //maxlength 체크
          function maxLengthCheck(object){
            if (object.value.length > object.maxLength){
                object.value = object.value.slice(0, object.maxLength);
            }   
        }

        function quantity_click(user_id, img_url){
            var input = document.getElementById(img_url).value;

            $.ajax({
                    type: "POST",
                    url: "./item_cart_update.php",
                    async:false,
                    data: {
                        user_id : user_id,
                        item_quantity : input,
                        img_url : img_url
                    },
                    dataType: "text",
                    error: function() {
                        
                    },
                    success: function(res) {
                        $('#total_price1').text(res);
                        $('#total_price2').text(res);
                        // item_price = res;
                    }
                });
        }

        function item_del(img_url){
            $.ajax({
                    type: "POST",
                    url: "./item_cart_del.php",
                    async:false,
                    data: {
                        user_id : "<?=$_SESSION['user_id']?>",
                        img_url : img_url
                    },
                    dataType: "text",
                    error: function() {
                        
                    },
                    success: function(res) {
                        // 페이지 새로고침
                        location.reload();
                    }
                });
        }

        function buy_item(){
            var check = $('#total_price1').text();
            if(check != "0원"){
            var form=document.createElement("form");
            form.name='tempPost';
            form.method='post';
            form.action="./checkout.php";
            
            var input = document.createElement("input");
            input.type="hidden";
            input.name='item_price';
            input.value= $('#total_price1').text();
            $(form).append(input);

            var input2 = document.createElement("input");
            input2.type="hidden";
            input2.name='item_name';
            input2.value= "<?=$item_cart_first_name?>";
            $(form).append(input2);
            
            document.body.appendChild(form);
            form.submit();
        }else{
            Swal.fire({
                icon: 'info',
                title: '장바구니',
                text: '장바구니가 비어있습니다!'
                })
        }

        }

 



    </script>

    

</body>

</html>