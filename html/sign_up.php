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
            <h2 class="card-title text-center" style="color:#113366;">회원가입</h2>
        </div>

        <div class="card-body">
            <!--회원 가입 폼 -->
            <form class="form-signin" action="create_user.php" method="POST" onsubmit="return check_id()">
                <h5 class="form-signin-heading">회원가입 정보를 입력하세요</h5>
                <label for="inputEmail" class="sr-only">Your ID</label>
                <input type="text" name="sign_id" id="uid" class="form-control" placeholder="Your ID" required autofocus><BR>
                <input onclick="input()" type="button" value="중복 검사">
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="sign_pw" id="upw1" class="form-control test" placeholder="Password" required><br>

                <label for="inputPassword" class="sr-only">Check Password</label>
                <input type="password" id="upw2" class="form-control test" placeholder="Check Password" required><br>

                <div class="alert alert-success" id="alert-success">비밀번호가 일치합니다.</div>
                <div class="alert alert-danger" id="alert-danger">비밀번호가 일치하지 않습니다.</div>

                <input id="btn-Yes" class="btn btn-lg btn-primary btn-block" type="submit" value="회원 가입">
            </form>

        </div>
    </div>

    <script type="text/javascript">
        var check = false;

        // 비밀번호 실시간 체크 jquery
        $(function() {
            $("#alert-success").hide();
            $("#alert-danger").hide();
            $(".test").keyup(function() {
                var pwd1 = $("#upw1").val();
                var pwd2 = $("#upw2").val();
                if (pwd1 != "" || pwd2 != "") {
                    if (pwd1 == pwd2) {
                        $("#alert-success").show();
                        $("#alert-danger").hide();
                        $("#btn-Yes").removeAttr("disabled");
                    } else {
                        $("#alert-success").hide();
                        $("#alert-danger").show();
                        $("#btn-Yes").attr("disabled", "disabled");
                    }
                }
            });
        });

        // 메소드 이름 때문에 안됐음
        // onsubmit 이 수행할 메소드
        function check_id() {
            if (check === false) {
                alert("중복 확인을 해주세요.");
                return false;
            } else {
                alert("회원가입을 축하드립니다 !");
                return true;
            }
        }

        // 중복 검사
        function input() {

            var input = document.getElementById("uid").value;

            // 공백이 아닐경우에만 실행
            if (input !== "") {
                $.ajax({
                    type: "GET",
                    url: "check.php",
                    data: {
                        a: input
                    },
                    dataType: "text",
                    error: function() {
                        alert('통신실패!!');
                    },
                    success: function(res) {
                        alert(res);
                        if (res == "이미 존재하는 아이디입니다 ") {
                            check = false;
                            console.log(check);
                        } else {
                            check = true;
                            console.log(check);
                        }
                    }
                });
            }
            // 공백일 경우
            else {
                alert("아이디를 입력해주세요.");
            }
        }
    </script>

</body>

</html>