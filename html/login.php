<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>회원가입</title>
    <!-- Bootstrap -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-latest.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style media="screen">
        @import url("https://fonts.googleapis.com/earlyaccess/nanumgothic.css");

        html {
            height: 100%;
        }

        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding-top: 80px;
            padding-bottom: 40px;
            font-family: "Nanum Gothic", arial, helvetica, sans-serif;
            background-repeat: no-repeat;
            background: url(img/login.jpg);
            background-position: center;
            background-size: cover;
        }

        .card {
            margin: 0 auto;
            /* Added */
            float: none;
            /* Added */
            margin-bottom: 10px;
            /* Added */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }

        .checkbox {
            display: inline;
        }

        .card-body a {
            text-decoration: none;
            float: right;
        }
    </style>
</head>

<body>
    <div class="card align-middle" style="width:20rem; border-radius:20px;">
        <div class="card-title" style="margin-top:30px;">
            <h2 class="card-title text-center" style="color:#113366;">로그인</h2>
        </div>
        <div class="card-body">
            <form class="form-signin" action="login_ok.php" method="post" onsubmit="return login_check()">
                <h5 class="form-signin-heading">로그인 정보를 입력하세요</h5>
                <label for="inputEmail" class="sr-only">Your ID</label>
                <input type="text" name="uid" id="uid" class="form-control" placeholder="Your ID" required autofocus><BR>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="upw" class="form-control" placeholder="Password" required><br>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> 아이디 저장
                    </label>
                </div>

                <input id="btn-Yes" class="btn btn-lg btn-primary btn-block" onclick="login()" type="submit" value="로 그 인">
            </form>

        </div>
    </div>

    <script type="text/javascript">
        var check = false;

        function login_check() {
            if (check === false) {
                alert("로그인 정보가 일치 하지 않습니다.");
                return false;
            } else {
                swal("로그인 성공!", "환영합니다!"+document.getElementById("uid").value+"님", "success")
                return true;
            }
        }

        function login() {
            var id = document.getElementById("uid").value;
            var pw = document.getElementById("upw").value;

            $.ajax({
                type: "GET",
                url: "login_check.php",
                data: {
                    Check_id: id,
                    Check_pw: pw
                },
                dataType: "text",
                async: false,
                error: function() {
                    alert('통신실패!!');
                },
                success: function(res) {
                    if (res === "로그인 성공") {
                        check = true;
                        console.log(check);
                    } else {
                        check = false;
                        console.log(check);
                    }
                }
            });
        }
    </script>

</body>

</html>