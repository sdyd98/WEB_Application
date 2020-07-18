<?php
  session_start();

  // 로그찍기
  function Console_log($data)
  {
      echo "<script>console.log( 'PHP_Console: " . $data . "' );</script>";
  }

  // 연결
  $conn = mysqli_connect('localhost','shin','Tlsdlswo!1','user_db');

  // 로그인 판별
  if(!isset($_SESSION['user_id'])){

    header("Location:../index.php");
  }else{

  }

  $sql = "SELECT * FROM buy_item WHERE id = '{$_SESSION['user_id']}' ORDER BY buy_date DESC";

  $result = mysqli_query($conn, $sql);

  $list = '';

  //$row = mysqli_fetch_array($result);

  while($row = mysqli_fetch_array($result)){

    $list = $list.'
    <tr>
    <td>'.$row['item_title'].'</td>
    <td>'.number_format($row['item_price']).'원</td>
    <td class="center">'.$row['buy_date'].'</td>
    </tr>';

  }
?>

﻿<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>구매 내역</title>

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
<body style="line-height:0">
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="../index.php"><i class="large material-icons">track_changes</i> <strong>TeamNova</strong></a>

		
            </div>

            <ul class="nav navbar-top-links navbar-right">
				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b><?= $_SESSION['user_id']?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>

		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">

<li><a href="#"><i class="fa fa-sign-out fa-fw"></i> 준비중 </a>
</li>
</ul>

        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#" class="active-menu waves-effect waves-dark"><i class="fa fa-table"></i> 구매 내역 </a>
                    </li>

                    <li>
                        <a href="../cart/cart.php" class="waves-effect waves-dark"><i class="fa fa-table"></i> 장바구니 </a>
                    </li>

                </ul>
            </div>
        </nav>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" style="min-height:1100px;">
		  <div class="header">
                        <h1 class="page-header">
                            구매 내역
                        </h1>


        </div>


            <div id="page-inner" style="min-height:100%">

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">

                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>상품명</th>
                                            <th>가격</th>
                                            <th class="center">구매일시</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?=$list?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->


                <!-- /. ROW  -->


    </div>
             <!-- /. PAGE INNER  -->
            </div>


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
	 <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });

    </script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>
