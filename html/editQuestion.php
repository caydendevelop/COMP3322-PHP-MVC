<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 

include("config.php");

  
  $qID = $_POST['qID'];
  $qTitle = $_POST['qTitle'];
  $qSpace = $_POST['qSpace'];
  $qContent = $_POST['qContent'];
  
  $query="UPDATE qTable SET qTitle = '$qTitle', qSpace = '$qSpace', qContent = '$qContent' WHERE qID = '$qID' ";
  // $query="INSERT INTO qTable (qID, qSpace, qTitle, qContent, qAnswer, qUp, qTime, qCreatorID, qCreatorName) VALUES ('$qID', '$qSpace', '$qTitle', '$qContent', '$qAnswer',  '$qUp ', '$qTime', '$qCreatorID', '$qCreatorName')";//向数据库插入表单传来的值的sql
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