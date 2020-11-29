<?php
    $server="127.0.0.1";//主机
    $db_username="root";//你的数据库用户名
    $db_password="mySQL@2021";//你的数据库密码

    $con = mysqli_connect($server,$db_username,$db_password);//链接数据库
    if(!$con){
        die("can't connect".mysqli_error());//如果链接失败输出错误
    }
    
    mysqli_select_db('project',$con);//选择数据库（我的是test）
?>
