// server.js

// express 모듈 불러오기 
var express = require('express');
// app Object를 초기화
var app = express();
// http 에 express 연결
var http = require('http').Server(app); //1
// socket io 불러오기
var io = require('socket.io')(http);    //1

var mysql = require('mysql');

var bodyParser = require('body-parser');

var chat_log = '';

var chat_user = '';
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended : true}));

var id_test = "익명";

// mysql 접속 설정
var connection = mysql.createConnection({
  host: 'localhost',
  post: 3306,
  user: 'shin',
  password: 'Tlsdlswo!1',
  database: 'user_db'
});

app.post('/', function(req,res){   
  
    // mysql 연결
    // connection.connect();

    //파일 다운로드 이파일이 켜진다
    res.sendFile(__dirname + '/client.html');
    id_test = req.body.email;
  });


// // client 요청했을때  응답
// app.get('/',function(req, res){  //2
  
// });

var count=1;
// client 웹사이트 접속시 connection 이벤트 발생
// io.on = 서버에 전달된 이벤트 인식 해서 함수 실행시키는 이벤트 리스너
// function 매개변수에는 접속한 사용자의 socket이 들어감
io.on('connection', function(socket){ //3
  console.log('user connected: ', socket.id);  //3-1
  var name = id_test;                 //3-1
  io.to(socket.id).emit('change name',name);   //3-1


      // 쿼리 전송
      connection.query('insert into chat_user_tb(id,socket_id)values("'+id_test+'","'+socket.id+'")', function (err, rows, fields) {

      });

      // 쿼리 전송
  connection.query('select id from chat_user_tb', function (err, rows, fields) {
    if (!err) {
      chat_user ='';
      for(var i = 0; i<rows.length; i++){
        chat_user += rows[i].id+"\n";
      }
      console.log(chat_user);
    } else {
        console.log('query error : ' + err);
        res.send(err);
    }

    io.emit('user list', chat_user);
    io.emit('chat_log_file',chat_log);
});

  // 접속해제 이벤트 리스너
  socket.on('disconnect', function(){ //3-2
    console.log('user disconnected: ', socket.id);

    // 쿼리 전송
    connection.query('delete from chat_user_tb where socket_id ="'+socket.id+'"', function (err, rows, fields) {
    });

    // 쿼리 전송
  connection.query('select id from chat_user_tb', function (err, rows, fields) {
    if (!err) {
      chat_user ='';
      for(var i = 0; i<rows.length; i++){
        chat_user += rows[i].id+"\n";
      }
      console.log(chat_user);
    } else {
        console.log('query error : ' + err);
        res.send(err);
    }

    io.emit('user list', chat_user);
});

    

  });

  // 채팅 보낼때 이벤트 리스너
  socket.on('send message', function(name,text){ //3-3
    var msg = name + ' : ' + text;
    chat_log = chat_log + (msg + "\n");
    console.log(chat_log);
    io.emit('receive message', msg);
  });
});

http.listen(8080, function(){ //4
  console.log('server on!');
});