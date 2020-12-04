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
  
  $query="INSERT INTO ansTable (ansID, ansQID, ansContent, ansUID, ansUserName) VALUES ('$ansID', '$ansQID', '$ansContent', '$ansUID', '$ansUserName')";//向数据库插入表单传来的值的sql
  $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
  
  if (!$result){
      die('Error: ' . mysqli_error($link));
  }else{
      echo "Success!";
      echo '<meta http-equiv=REFRESH CONTENT=1;url=QuestionDetailPage.php>';
  }

  $json_ansID = json_encode($ansID); // php -> json
  $query=" UPDATE qTable SET qAnswer = '$json_ansID' WHERE qID = '$ansQID' ";//向数据库插入表单传来的值
  $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
  if (!$result){
    die('Error: ' .mysqli_error($link));
  }else{
    echo "Success!";
  }

  // mysqli_free_result($result);
  mysqli_close($link);    
  // }

?>