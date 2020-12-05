<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php 

include("config.php");

  $qID = $_POST['ansQID'];
  
  //delete the ans
  $query1="DELETE FROM ansTable WHERE ansQID = '$qID' ";
  $result1 = mysqli_query($link, $query1) or die ('Failed to query '.mysqli_error($link));
  if (!$result1){
    die('Error: ' . mysqli_error($link));
  }else{
      echo "1 Success!";
  }

  // delete the question
  $query2="DELETE FROM qTable WHERE qID = '$qID' ";
  $result2 = mysqli_query($link, $query2) or die ('Failed to query '.mysqli_error($link));
  
  if (!$result2){
      die('Error: ' . mysqli_error($link));
  }else{
      echo "2 Success!";
      echo '<meta http-equiv=REFRESH CONTENT=1;url=MainPage.php>';
  }

  // mysqli_free_result($result);
  mysqli_close($link);    
  // }

?>