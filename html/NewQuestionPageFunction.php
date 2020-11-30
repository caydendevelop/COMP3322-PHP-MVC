<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php 

include("config.php");

  $qID = uniqid();
  $qSpace = $_POST['qSpace'];
  $qTitle = $_POST['qTitle'];
  $qContent = $_POST['qContent'];
  $qTime = date("Y-m-d",time());
  $qCreatorID = $_SESSION['userID'];
  $qCreatorName = $_SESSION['userName'];


  //搜尋資料庫資料
  // $sql = "SELECT * FROM userTable where userEmail = '$userEmail'";
  // $result = mysqli_query($link, $sql);  // $link from config.php
  // $row = @mysqli_fetch_row($result);

  // if($userEmail != null  && $row[2] == $userEmail)
  // {
  //   echo "Dulplicated user's email address";
  // }
  // else
  // {
  
  $query="INSERT INTO qTable (qID, qSpace, qTitle, qContent, qTime, qCreatorID, qCreatorName) VALUES ('$qID', '$qSpace', '$qTitle', '$qContent', '$qTime', '$qCreatorID', '$qCreatorName')";//向数据库插入表单传来的值的sql
  $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
  
  if (!$result){
      die('Error: ' . mysqli_error($link));
  }else{
      echo "Success!";
      echo '<meta http-equiv=REFRESH CONTENT=1;url=MainPage.php>';
  }

  // mysqli_free_result($result);
  mysqli_close($link);    
  // }

?>