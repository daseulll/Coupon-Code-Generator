<?php
session_start();

// DB에 연결
$mysqli = mysqli_connect("localhost", "", "", "myUser");

if($mysqli){
    echo "MySQL 접속 성공";
}else{
    echo "MySQL 접속 실패";
}
echo phpversion();
