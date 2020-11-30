<?php 

include("config.php");

    $userID=$_POST['userID'];
    $userName=$_POST['userName'];
    $userEmail=$_POST['userEmail'];
    $userPassword=md5($_POST['userPassword']); //md5() for encryption

    //搜尋資料庫資料
    $sql = "SELECT * FROM userTable where userEmail = '$userEmail'";
    $result = mysqli_query($link, $sql);  // $link from config.php
    $row = @mysqli_fetch_row($result);

    if($userEmail != null  && $row[2] == $userEmail)
    {
      echo "Dulplicated user's email address";
    }
    else
    {
        $userID = uniqid();
        $query="INSERT INTO userTable (userID,userName,userEmail,userPassword) VALUES ('$userID','$userName','$userEmail','$userPassword')";//向数据库插入表单传来的值的sql
        $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
        
        if (!$result){
            die('Error: ' . mysqli_error($link));
        }else{
            echo "Success!";
            echo '<meta http-equiv=REFRESH CONTENT=1;url=MainPage.php>';
        }

        // mysqli_free_result($result);
        mysqli_close($link);    
    }

?>