<?php
session_start();

$conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');

if(!isset($_SESSION['user_id'])){
  header("Location:../index.php");
}else{
  $check_permission = "select permission from user_tb where id = '{$_SESSION['user_id']}'";
  $check_result = mysqli_fetch_row(mysqli_query($conn, $check_permission));

  if($check_result[0] !== "root"){
    header("Location:../index.php");
  }
}

  $sql = "SELECT * FROM today_visit";
  $sql2 = "SELECT * FROM today_user";
  $sql3 = "SELECT * FROM item_tb";
  $sql4 = "SELECT * FROM total_visit";
  $sql5 = "select item_title from view_item group by item_title having count(*) = (select max(mycount) from (select item_title, count(*) as mycount from view_item group by item_title) as result)";
  $sql6 = "SELECT * FROM view_item";
  $sql7 = "select max(mycount) from (select item_title, count(*) as mycount from view_item group by item_title) as result";

  $sql8 = "select id from total_visit_user group by id having count(*) = (select max(mycount) from (select id, count(*) as mycount from total_visit_user group by id) as result)";
  $sql9 = "select max(mycount) from (select id, count(*) as mycount from total_visit_user group by id) as result";
  $sql10 = "select * from total_visit_user";

  $sql11 = "select sum(item_price) from buy_item";

  $sql12 = "select count(*) as cnt from buy_item";

  $sql13 = "select id from buy_item group by id having count(*) = (select max(mycount) from (select id, count(*) as mycount from buy_item group by id) as result)";
  $sql14 = "select max(mycount) from (select id, count(*) as mycount from buy_item group by id) as result";
  $sql15 = "select * from buy_item";

  $sql16 = "select item_title from buy_item group by item_title having count(*) = (select max(mycount) from (select item_title, count(*) as mycount from buy_item group by item_title) as result)";
  $sql17 = "select max(mycount) from (select item_title, count(*) as mycount from buy_item group by item_title) as result";



  $today_visiter = mysqli_num_rows(mysqli_query($conn, $sql));
  $today_user = mysqli_num_rows(mysqli_query($conn, $sql2));
  $total_item = mysqli_num_rows(mysqli_query($conn, $sql3));
  $total_visiter = mysqli_num_rows(mysqli_query($conn, $sql4));
  $top_view_item_title = mysqli_fetch_array(mysqli_query($conn,$sql5));
  $top_view_item_count = mysqli_fetch_array(mysqli_query($conn,$sql7));
  $total_item_view = mysqli_num_rows(mysqli_query($conn, $sql6));

  $total_visit_user_name = mysqli_fetch_array(mysqli_query($conn,$sql8));
  $total_visit_user_count = mysqli_fetch_array(mysqli_query($conn,$sql9));
  $total_visit_user = mysqli_num_rows(mysqli_query($conn, $sql10));

  $total_money = mysqli_fetch_array(mysqli_query($conn,$sql11));

  $total_sell = mysqli_fetch_array(mysqli_query($conn,$sql12));

  $best_client = mysqli_fetch_array((mysqli_query($conn,$sql13)));
  $total_buy_count = mysqli_num_rows(mysqli_query($conn,$sql15));
  $best_client_count = mysqli_fetch_array(mysqli_query($conn,$sql14));

  $best_item_title = mysqli_fetch_array((mysqli_query($conn,$sql16)));
  $best_item_count = mysqli_fetch_array((mysqli_query($conn,$sql17)));
  $total_sell_item = mysqli_num_rows(mysqli_query($conn,$sql15));

  $best_sell_item_persent = round(($best_item_count['max(mycount)']/$total_sell_item)*100,1);

  $total_visit_user_persent = round(($total_visit_user_count['max(mycount)']/$total_visit_user)*100,1);

  $top_view_item_persent =  round(($top_view_item_count['max(mycount)']/$total_item_view)*100,1);

  $best_client_persent = round(($best_client_count['max(mycount)']/$total_buy_count)*100,1);





?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>관리자 페이지</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.html"><i class="large material-icons">track_changes</i> <strong>TeamNova</strong></a>

		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">
				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b>root</b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
<li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
</li>
</ul>
<ul id="dropdown2" class="dropdown-content w250">
  <li>
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
</ul>
<ul id="dropdown3" class="dropdown-content dropdown-tasks w250">
<li>
		<a href="#">
			<div>
				<p>
					<strong>Task 1</strong>
					<span class="pull-right text-muted">60% Complete</span>
				</p>
				<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
						<span class="sr-only">60% Complete (success)</span>
					</div>
				</div>
			</div>
		</a>
	</li>
	<li class="divider"></li>
	<li>
		<a href="#">
			<div>
				<p>
					<strong>Task 2</strong>
					<span class="pull-right text-muted">28% Complete</span>
				</p>
				<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
						<span class="sr-only">28% Complete</span>
					</div>
				</div>
			</div>
		</a>
	</li>
	<li class="divider"></li>
	<li>
		<a href="#">
			<div>
				<p>
					<strong>Task 3</strong>
					<span class="pull-right text-muted">60% Complete</span>
				</p>
				<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
						<span class="sr-only">60% Complete (warning)</span>
					</div>
				</div>
			</div>
		</a>
	</li>
	<li class="divider"></li>
	<li>
		<a href="#">
			<div>
				<p>
					<strong>Task 4</strong>
					<span class="pull-right text-muted">85% Complete</span>
				</p>
				<div class="progress progress-striped active">
					<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
						<span class="sr-only">85% Complete (danger)</span>
					</div>
				</div>
			</div>
		</a>
	</li>
	<li class="divider"></li>
	<li>
</ul>
<ul id="dropdown4" class="dropdown-content dropdown-tasks w250 taskList">
  <li>
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</p>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</p>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the...</p>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
</ul>
	   <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu waves-effect waves-dark" href="index.php"><i class="fa fa-dashboard"></i> 관리</a>
                    </li>

                    <li>
                        <a href="table.php" class="waves-effect waves-dark"><i class="fa fa-table"></i> 회원 </a>
                    </li>


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

		<div id="page-wrapper" style = "min-height:900px;">
		  <div class="header">
                        <h1 class="page-header">

                        </h1>


		</div>
            <div id="page-inner" style="min-height:100%;">

			<div class="dashboard-cards">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">

						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image red">
						<i class="material-icons dp48">import_export</i>
						</div>
						<div class="card-stacked red">
						<div class="card-content">
						<h3><?=number_format($total_money['sum(item_price)'])?> 원</h3>
						</div>
						<div class="card-action">
						<strong>이번달 수익</strong>
						</div>
						</div>
						</div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">

						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image orange">
						<i class="material-icons dp48">shopping_cart</i>
						</div>
						<div class="card-stacked orange">
						<div class="card-content">
						<h3><?=$total_sell['cnt']?> 개</h3>
						</div>
						<div class="card-action">
						<strong>이번달 상품 판매량</strong>
						</div>
						</div>
						</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">

							<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image blue">
						<i class="material-icons dp48">equalizer</i>
						</div>
						<div class="card-stacked blue">
						<div class="card-content">
						<h3><?=$total_visiter?> 명</h3>
						</div>
						<div class="card-action">
						<strong>총 방문자 수</strong>
						</div>
						</div>
						</div>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">

					<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image green">
						<i class="material-icons dp48">supervisor_account</i>
						</div>
						<div class="card-stacked green">
						<div class="card-content">
						<h3><?=$today_visiter?> 명</h3>
						</div>
						<div class="card-action">
						<strong>일일 방문자 수</strong>
						</div>
						</div>
						</div>

                    </div>
                </div>
			   </div>
				<!-- /. ROW  -->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-7">
					<div class="cirStats">
						  	<div class="row">

								<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="card-panel text-center">
											<h4>가장 많이 본 상품<br> <p>상품 이름 : <?=$top_view_item_title['item_title']?></p></h4>
											<div class="easypiechart" id="easypiechart-blue" data-percent="<?=$top_view_item_persent?>" ><span class="percent"><?=$top_view_item_persent?>%</span>
											</div>
										</div>
								</div>

								<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="card-panel text-center">
											<h4>가장 많이 방문한 고객<br> <p><?=$total_visit_user_name['id']?> 님</p></h4>
											<div class="easypiechart" id="easypiechart-red" data-percent="<?=$total_visit_user_persent?>" ><span class="percent"><?=$total_visit_user_persent?>%</span>
											</div>
										</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="card-panel text-center">
											<h4>가장 많이 결제한 고객<br> <p><?=$best_client['id']?> 님</p> </h4>
											<div class="easypiechart" id="easypiechart-teal" data-percent="<?=$best_client_persent?>" ><span class="percent"><?=$best_client_persent?>%</span>
											</div>
										</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6">
										<div class="card-panel text-center">
											<h4>가장 많이 판매된 상품<br> <p><?=$best_item_title['item_title']?></p></h4>
											<div class="easypiechart" id="easypiechart-orange" data-percent="<?=$best_sell_item_persent?>" ><span class="percent"><?=$best_sell_item_persent?>%</span>
											</div>
										</div>
								</div>
							</div>
						</div>
						</div><!--/.row-->

						<div class="col-xs-12 col-sm-12 col-md-5">
						     <div class="row">
									<div class="col-xs-12">
									<div class="card">
										<div class="card-image donutpad">
										  <div id="morris-donut-chart"></div>
										</div>
										<div class="card-action">
										  <b><br><br>일일 지표</b>
										</div>
									</div>
								</div>
							 </div>
						</div><!--/.row-->



					</div>

				<div class="card">
					  <div id="morris-bar-chart"></div>
					</div>
                </div>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>

	<!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

	<script src="assets/materialize/js/materialize.min.js"></script>

    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>


	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>

	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>



	<script>
	(function ($) {
    "use strict";
    var mainApp = {

        initFunction: function () {
            /*MENU
            ------------------------------------*/
            $('#main-menu').metisMenu();

            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });





            /* MORRIS DONUT CHART
			----------------------------------------*/
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "상품 판매",
                    value: <?=$total_sell_item?>
                }, {
                    label: "회원 가입",
                    value: <?=$today_user?>
                }, {
                    label: "방문자",
                    value: <?=$today_visiter?>
                }],
				   colors: [
    '#A6A6A6','#414e63',
    '#e96562'
  ],
                resize: true
            });

            /* MORRIS AREA CHART
			----------------------------------------*/

            Morris.Area({
                element: 'morris-area-chart',
                data: [{
                    period: '2010 Q1',
                    iphone: 2666,
                    ipad: null,
                    itouch: 2647
                }, {
                    period: '2010 Q2',
                    iphone: 2778,
                    ipad: 2294,
                    itouch: 2441
                }, {
                    period: '2010 Q3',
                    iphone: 4912,
                    ipad: 1969,
                    itouch: 2501
                }, {
                    period: '2010 Q4',
                    iphone: 3767,
                    ipad: 3597,
                    itouch: 5689
                }, {
                    period: '2011 Q1',
                    iphone: 6810,
                    ipad: 1914,
                    itouch: 2293
                }, {
                    period: '2011 Q2',
                    iphone: 5670,
                    ipad: 4293,
                    itouch: 1881
                }, {
                    period: '2011 Q3',
                    iphone: 4820,
                    ipad: 3795,
                    itouch: 1588
                }, {
                    period: '2011 Q4',
                    iphone: 15073,
                    ipad: 5967,
                    itouch: 5175
                }, {
                    period: '2012 Q1',
                    iphone: 10687,
                    ipad: 4460,
                    itouch: 2028
                }, {
                    period: '2012 Q2',
                    iphone: 8432,
                    ipad: 5713,
                    itouch: 1791
                }],
                xkey: 'period',
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['iPhone', 'iPad', 'iPod Touch'],
                pointSize: 2,
                hideHover: 'auto',
				  pointFillColors:['#ffffff'],
				  pointStrokeColors: ['black'],
				  lineColors:['#A6A6A6','#414e63'],
                resize: true
            });

            /* MORRIS LINE CHART
			----------------------------------------*/
            Morris.Line({
                element: 'morris-line-chart',
                data: [
					  { y: '2014', a: 50, b: 90},
					  { y: '2015', a: 165,  b: 185},
					  { y: '2016', a: 150,  b: 130},
					  { y: '2017', a: 175,  b: 160},
					  { y: '2018', a: 80,  b: 65},
					  { y: '2019', a: 90,  b: 70},
					  { y: '2020', a: 100, b: 125},
					  { y: '2021', a: 155, b: 175},
					  { y: '2022', a: 80, b: 85},
					  { y: '2023', a: 145, b: 155},
					  { y: '2024', a: 160, b: 195}
				],


      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['Total Income', 'Total Outcome'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
      lineColors:['gray','#414e63']

            });


            $('.bar-chart').cssCharts({type:"bar"});
            $('.donut-chart').cssCharts({type:"donut"}).trigger('show-donut-chart');
            $('.line-chart').cssCharts({type:"line"});

            $('.pie-thychart').cssCharts({type:"pie"});


        },

        initialization: function () {
            mainApp.initFunction();

        }

    }
    // Initializing ///

    $(document).ready(function () {
		$(".dropdown-button").dropdown();
		$("#sideNav").click(function(){
			if($(this).hasClass('closed')){
				$('.navbar-side').animate({left: '0px'});
				$(this).removeClass('closed');
				$('#page-wrapper').animate({'margin-left' : '260px'});

			}
			else{
			    $(this).addClass('closed');
				$('.navbar-side').animate({left: '-260px'});
				$('#page-wrapper').animate({'margin-left' : '0px'});
			}
		});

        mainApp.initFunction();
    });

	$(".dropdown-button").dropdown();

}(jQuery));

	</script>


</body>

</html>
