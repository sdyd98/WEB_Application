< !DOCTYPE html>
    <html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <title>test</title>
        <style media="screen">
            * {
                padding: 0;
                margin: 0;
            }

            /* 캔버스 클래스 CSS 설정 */
            canvas {
                /*  캔버스의 색 */
                background: #eee;
                /* 블럭 처리 */
                /* 한줄 다먹음 match parent */
                display: block;
                /* 좌우 여백을 정확히 나누어 정렬한다 */
                margin: 0 auto;
            }
        </style>
    </head>

    <body>
        < !-- 캔버스 생성 --><canvas id="myCanvas" width="480" height="320"></canvas>
            < !-- 자바 스크립트 시작 -->
                <script type="text/javascript">
                    // myCanvas 접근하고 싶은 class
                    var canvas = document.getElementById("myCanvas");
                    //  getContext() 메서드를 사용하여 드로잉 컨텍스트에 엑세스
                    var ctx = canvas.getContext("2d");

                    var rightPressed = false;
                    var leftPressed = false;

                    // 벽돌 설정
                    var brickRowCount = 3;
                    var brickColumnCount = 5;
                    var brickWidth = 75;
                    var brickHeight = 20;
                    var brickPadding = 10;
                    var brickOffsetTop = 30;
                    var brickOffsetLeft = 30;

                    // 스코어
                    var score = 0;




                    // 벽돌 생성
                    var bricks = [];

                    for (var c = 0; c < brickColumnCount; c++) {
                        bricks[c] = [];

                        for (var r = 0; r < brickRowCount; r++) {
                            bricks[c][r] = {
                                x: 0,
                                y: 0,
                                status: 1
                            }

                            ;
                        }
                    }

                    function drawBricks() {
                        for (var c = 0; c < brickColumnCount; c++) {
                            for (var r = 0; r < brickRowCount; r++) {
                                if (bricks[c][r].status == 1) {
                                    // 벽돌들 위치 설정
                                    var brickX = (c * (brickWidth + brickPadding)) + brickOffsetLeft;
                                    var brickY = (r * (brickHeight + brickPadding)) + brickOffsetTop;

                                    bricks[c][r].x = brickX;
                                    bricks[c][r].y = brickY;
                                    ctx.beginPath();
                                    ctx.rect(brickX, brickY, brickWidth, brickHeight);
                                    ctx.fillStyle = "#0095DD";
                                    ctx.fill();
                                    ctx.closePath();
                                }
                            }
                        }
                    }


                    <
                    !--패들 부분-- >
                    var paddleHeight = 10;
                    var paddleWidth = 75;
                    var paddleX = (canvas.width - paddleWidth) / 2;


                    //공 의 radius
                    var ballRadius = 10;


                    //공1 시작점
                    var x = canvas.width / 2;
                    var y = canvas.height - 30;

                    //공의 이동거리 10 m 당
                    var dx = 2;
                    var dy = -2;

                    // 패들 그리기
                    function drawPaddle() {
                        ctx.beginPath();
                        ctx.rect(paddleX, canvas.height - paddleHeight, paddleWidth, paddleHeight);
                        ctx.fillStyle = "#0095DD";
                        ctx.fill();
                        ctx.closePath();
                    }

                    // 공그리기 1
                    function drawBall1() {
                        ctx.beginPath();
                        ctx.arc(x, y, ballRadius, 0, Math.PI * 2);
                        ctx.fillStyle = "#0095DD";
                        ctx.fill();
                        ctx.closePath();
                    }

                    // 공그리기 2
                    function drawBall2() {
                        ctx.beginPath();
                        ctx.arc(x2, y2, ballRadius, 0, Math.PI * 2);
                        ctx.fillStyle = "#0095DD";
                        ctx.fill();
                        ctx.closePath();
                    }

                    function draw() {
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        drawBricks();
                        drawBall1();
                        drawPaddle();
                        drawScore();
                        collisionDetection();

                        // if (y + dy > canvas.height - ballRadius || y + dy < ballRadius) {
                        //   dy = -dy;
                        // }

                        // 윗벽은 튕기고 아랫벽은 alert 창과 페이지 리로드
                        if (y + dy < ballRadius) {
                            dy = -dy;
                        } else if (y + dy > canvas.height - ballRadius) {

                            // 공이 패들에 닿았을때
                            if (x > paddleX && x < paddleX + paddleWidth) {

                                dy += 0.5;
                                dy = -dy;
                            } else {
                                alert("GAME OVER");
                                document.location.reload();
                                clearInterval(interval);
                            }
                        }


                        if (x + dx > canvas.width - ballRadius || x + dx < ballRadius) {
                            dx = -dx;
                        }

                        if (rightPressed && paddleX < canvas.width - paddleWidth) {
                            paddleX += 7;
                        } else if (leftPressed && paddleX > 0) {
                            paddleX -= 7;
                        }

                        x += dx;
                        y += dy;


                    }



                    function keyDownHandler(e) {
                        if (e.keyCode == 39) {
                            rightPressed = true;
                        } else if (e.keyCode == 37) {
                            leftPressed = true;
                        }
                    }

                    function keyUpHandler(e) {
                        if (e.keyCode == 39) {
                            rightPressed = false;
                        } else if (e.keyCode == 37) {
                            leftPressed = false;
                        }
                    }

                    function collisionDetection() {
                        for (var c = 0; c < brickColumnCount; c++) {
                            for (var r = 0; r < brickRowCount; r++) {
                                var b = bricks[c][r];

                                if (b.status == 1) {
                                    if (x > b.x && x < b.x + brickWidth && y > b.y && y < b.y + brickHeight) {
                                        dy = -dy;
                                        b.status = 0;
                                        score++;

                                        if (score == brickRowCount * brickColumnCount) {
                                            alert("게임 성공!") document.location.reload();
                                            clearInterval(interval);
                                        }
                                    }
                                }

                            }
                        }
                    }

                    function drawScore() {
                        ctx.font = "16px Arial";
                        ctx.fillStyle = "#0095DD";
                        ctx.fillText("Score: " + score, 8, 20);
                    }

                    document.addEventListener("keydown", keyDownHandler, false);
                    document.addEventListener("keyup", keyUpHandler, false);
                    //주기적으로 실행
                    var interval = setInterval(draw, 10);
                </script>
    </body>

    </html>
