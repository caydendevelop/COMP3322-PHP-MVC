<?php session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  if( isset($_SESSION['userEmail']) ){
    include("config.php");

    $userID=$_SESSION['userID'];
    $qID=$_POST['upvote'];
    
    //搜尋資料庫資料
    $sql = "SELECT qUp FROM qTable where qID = '$qID'";
    $result = mysqli_query($link, $sql);  // $link from config.php
    $row = mysqli_fetch_array($result);

    // $json_qUp = json_encode($row[5]); // change result of row[5] to json format

    if(empty($row['qUp']))
    {
      $json_qUp = json_encode($userID);
      $query=" UPDATE qTable SET qUp = '$json_qUp' WHERE qID = '$qID' ";//向数据库插入表单传来的值的sql
      $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
    } 
    else 
    { 
      $php_qUp = json_decode($row['qUp'],true);
      if (($key = array_search($userID, $php_qUp)) !== false) // 已like
      {
        unset($php_qUp[$key]); // delete from array
        $json_qUp = json_encode($php_qUp); // php -> json
        $query=" UPDATE qTable SET qUp = '$json_qUp'  WHERE qID = '$qID' ";//向数据库插入表单传来的值
        $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
      } 
      else // 未like
      { 
        array_push($php_qUp, $userID);
        $json_qUp = json_encode($php_qUp);
        $query=" UPDATE qTable SET qUp = '$json_qUp'  WHERE qID = '$qID' ";//向数据库插入表单传来的值的sql
        $result = mysqli_query($link, $query) or die ('Failed to query '.mysqli_error($link));
      }
    }

    if (!$result){
      die('Error: ' .mysqli_error($link));
    }else{
      echo "Upvote (".count($php_qUp).")";
    }
    // mysqli_free_result($result);
  mysqli_close($link);    
  } else {
    echo 'You have not signin!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=LoginPage.php>';
  }
  