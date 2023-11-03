<?php
    $host="localhost";
    $name="root";
    $pw="";
    $db_select="jangsu";

    $con = mysqli_connect("$host","$name","$pw","$db_select");
    $con->set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "데이터베이스 접속 실패<br>";
        echo mysqli_connect_errno();
    }
    // else{
    //     echo "데이터베이스 접속 성공<br>";
    // }
    mysqli_select_db($con,$db_select);
?>