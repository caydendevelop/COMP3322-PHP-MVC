<?php 
    $conn=mysqli_connect('127.0.0.1', 'root', 'mySQL@2021', 'project') or die ('Error! '.mysqli_connect_error($conn));

    $uid=$_POST['uid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pwd=md5($_POST['pwd']); //md5() for encryption

    $query="INSERT INTO userTable (uid,name,email,pwd) VALUES ('$uid','$name','$email','$pwd')";//向数据库插入表单传来的值的sql
    $result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
    
    if (!$result){
        die('Error: ' . mysqli_error($conn));
    }else{
        echo "Success!";
    }

    // mysqli_free_result($result);
    mysqli_close($conn);    

?>