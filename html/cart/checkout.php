<?php session_start();
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
    <title>Amado - Furniture Ecommerce Template | Checkout</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

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
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    

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
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>상품 주문</h2>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="first_name" value="" placeholder="성" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="last_name" value="" placeholder="이름" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" placeholder="이메일" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="sample6_address" placeholder="주소" value="" onclick = "sample6_execDaumPostcode()">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="sample6_extraAddress" placeholder="참고주소" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="sample6_detailAddress" placeholder="상세주소" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="sample6_postcode" placeholder="우편번호" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="phone_number" placeholder="휴대폰 번호" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="주문시 요청사항""></textarea>
                                    </div>

                                </div>
                            </form>
                                                    
                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>결제 금액</h5>
                            <ul class="summary-table">
                                <li><span>상품명:</span> <span><?=$_POST['item_name']?></span></li>
                                <li><span>상품금액:</span> <span><?=$_POST['item_price']?></span></li>
                                <li><span>배달료:</span> <span>Free</span></li>
                                <li><span>총액:</span> <span><?=$_POST['item_price']?></span></li>
                            </ul>

                            <div class="cart-btn mt-100">
                                <button style="display: block; width: 100%; font-size: 18px; padding: 8px;" class="btn btn-dark" onclick = "buy_item()">결제하기</button>
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

    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>

    <!-- 부트페이 -->
    <script src="https://cdn.bootpay.co.kr/js/bootpay-3.0.2.min.js" type="application/javascript"></script>

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


        
    function sample6_execDaumPostcode() {
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById("sample6_extraAddress").value = extraAddr;
                
                } else {
                    document.getElementById("sample6_extraAddress").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample6_postcode').value = data.zonecode;
                document.getElementById("sample6_address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("sample6_detailAddress").focus();
            }
        }).open();
    }

    // 결제 php 코드가 그냥 읽힘
    function buy_item() {
            BootPay.request({
                price: '<?=$_POST['item_price'] ?>', //실제 결제되는 가격
                application_id: "5dbe58be5ade160037569d2b",
                name: '<?=$_POST['item_name'] ?>', //결제창에서 보여질 이름
                pg: '',
                method: '', //결제수단, 입력하지 않으면 결제수단 선택부터 화면이 시작합니다.
                show_agree_window: 0, // 부트페이 정보 동의 창 보이기 여부
                items: [{
                    item_name: '<?=$_POST['item_name']?>', //상품명
                    qty: 1, //수량
                    unique: '123', //해당 상품을 구분짓는 primary key
                    price: 1000, //상품 단가
                    cat1: 'TOP', // 대표 상품의 카테고리 상, 50글자 이내
                    cat2: '티셔츠', // 대표 상품의 카테고리 중, 50글자 이내
                    cat3: '라운드 티', // 대표상품의 카테고리 하, 50글자 이내
                }],
                user_info: {
                    username: '사용자 이름',
                    email: '사용자 이메일',
                    addr: '사용자 주소',
                    phone: '010-1234-4567'
                },
                order_id: '고유order_id_1234', //고유 주문번호로, 생성하신 값을 보내주셔야 합니다.
                params: {
                    callback1: '그대로 콜백받을 변수 1',
                    callback2: '그대로 콜백받을 변수 2',
                    customvar1234: '변수명도 마음대로'
                },
                account_expire_at: '2018-05-25', // 가상계좌 입금기간 제한 ( yyyy-mm-dd 포멧으로 입력해주세요. 가상계좌만 적용됩니다. )
                extra: {
                    start_at: '2019-05-10', // 정기 결제 시작일 - 시작일을 지정하지 않으면 그 날 당일로부터 결제가 가능한 Billing key 지급
                    end_at: '2022-05-10', // 정기결제 만료일 -  기간 없음 - 무제한
                    vbank_result: 1, // 가상계좌 사용시 사용, 가상계좌 결과창을 볼지(1), 말지(0), 미설정시 봄(1)
                    quota: '0,2,3' // 결제금액이 5만원 이상시 할부개월 허용범위를 설정할 수 있음, [0(일시불), 2개월, 3개월] 허용, 미설정시 12개월까지 허용
                }
            }).error(function(data) {
                //결제 진행시 에러가 발생하면 수행됩니다.
                console.log(data);
            }).cancel(function(data) {
                //결제가 취소되면 수행됩니다.

            }).ready(function(data) {
                // 가상계좌 입금 계좌번호가 발급되면 호출되는 함수입니다.
                console.log(data);
            }).confirm(function(data) {
                //결제가 실행되기 전에 수행되며, 주로 재고를 확인하는 로직이 들어갑니다.
                //주의 - 카드 수기결제일 경우 이 부분이 실행되지 않습니다.
                console.log(data);
                var enable = true; // 재고 수량 관리 로직 혹은 다른 처리
                if (enable) {
                    BootPay.transactionConfirm(data); // 조건이 맞으면 승인 처리를 한다.

                } else {
                    BootPay.removePaymentWindow(); // 조건이 맞지 않으면 결제 창을 닫고 결제를 승인하지 않는다.
                }
            }).close(function(data) {
                // 결제창이 닫힐때 수행됩니다. (성공,실패,취소에 상관없이 모두 수행됨)
            }).done(function(data) {
                //결제가 정상적으로 완료되면 수행됩니다
                //비즈니스 로직을 수행하기 전에 결제 유효성 검증을 하시길 추천합니다.
                // alert("결제가 완료되었습니다.");
            
                $.ajax({
                    type: "POST",
                    url: "../item/item_buy.php",
                    async:false,
                    data: {
                        item_name : "<?=$_POST['item_name']?>",
                        item_price : "<?=$_POST['item_price']?>"
                    },
                    dataType: "text",
                    error: function() {
                        alert('통신실패!!');
                    },
                    success: function(res) {
                        alert('결제 완료!!');
                        location.href = "../index.php"

                    }
                });


            });
        }

    </script>




</body>

</html>