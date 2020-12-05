<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 

include("config.php");

  $ansID = uniqid();
  $ansQID = $_POST['ansQID'];
  $ansContent = $_POST['ansContent'];
  $ansUID = $_SESSION['userID'];
  $ansUserName = $_SESSION['userName'];
  $ansTime = date("Y-m-d",time());
  // insert to ansTable
  $query="INSERT INTO ansTable (ansID, ansQID, ansContent, ansUID, ansUserName, ansTime) VALUES ('$ansID', '$ansQID', '$ansContent', '$ansUID', '$ansUserName', '$ansTime')";//向数据库插入表单传来的值的sql
  $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
  

  // update to qTable 
  $query1 = "SELECT qAnswer FROM qTable WHERE qID = '$ansQID'";
  $result1 = mysqli_query($link, $query1);  // $link from config.php
  $row1 = mysqli_fetch_array($result1);

  $php_qAnswer = json_decode($row1['qAnswer'],true);
  array_push($php_qAnswer, $ansID);
  $json_qAnswer = json_encode($php_qAnswer); // php -> json

  $query2=" UPDATE qTable SET qAnswer = '$json_qAnswer' WHERE qID = '$ansQID' ";//向数据库插入表单传来的值
  $result2 = mysqli_query($link, $query2) or die ('Failed to query '.mysqli_error($link));
  if (!$result2){
    die('Error: ' .mysqli_error($link));
  }else{
    echo "Success!";
  }

  // mysqli_free_result($result);
  mysqli_close($link);    
  // }

?>