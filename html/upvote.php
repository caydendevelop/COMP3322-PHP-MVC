<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
  include("config.php");

  $userID=$_SESSION['userID'];
  $qID=$_POST['upvote'];
  
  //搜尋資料庫資料
  $sql = "SELECT qUp FROM qTable where qID = '$qID'";
  $result = mysqli_query($link, $sql);  // $link from config.php
  $row = @mysqli_fetch_row($result);

  // $json_qUp = json_encode($row[5]); // change result of row[5] to json format

  if(empty($row['qUp']))
  {
    $json_qUp = json_encode($userID);
    $query=" UPDATE qTable SET qUp = '$json_qUp'  WHERE qID = '$qID' ";//向数据库插入表单传来的值的sql
    $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
  } 
  else 
  {
    $php_qUp = json_decode($row['qUp']);
    if (($key = array_search($userID, $php_qUp)) !== false) // 已like
    {
      unset($php_qUp[$key]); // delete from array
      // echo "<p>".count($php_qUp)."</p>";
      $json_qUp = json_encode($php_qUp); // php -> json

      $query=" UPDATE qTable SET qUp = '$json_qUp'  WHERE qID = '$para' ";//向数据库插入表单传来的值
      $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
    } 
    else // 未like
    { 
      array_push($php_qUp, $userID);
      $json_qUp = json_encode($php_qUp);

      $query=" UPDATE qTable SET qUp = '$json_qUp'  WHERE qID = '$para' ";//向数据库插入表单传来的值的sql
      $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
    }
  }



  if (!$result){
    die('Error: ' .mysqli_error($link));
  }else{
    echo count($php_qUp);
}
  // mysqli_free_result($result);
  mysqli_close($link);    