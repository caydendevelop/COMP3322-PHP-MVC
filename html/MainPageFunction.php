<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php

  //連接資料庫
  //只要此頁面上有用到連接MySQL就要include它
  include("config.php");

  if($_POST['navSearch'] != NULL) {
    $inputValue = $_POST['navSearch'];
   
    //搜尋資料庫資料
    $sql = "SELECT * FROM qTable WHERE qTitle LIKE '%$inputValue%' ORDER BY qID DESC"; // Last entry First out :)
    $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

    //Display the Questions from qTable
    if(mysqli_num_rows($result) > 0)
      {
        include("renderCard.php");
      }
  }

  if($_POST['filter'] =='Algorithm') {
    //搜尋資料庫資料
    $sql = "SELECT * FROM qTable WHERE qSpace = 'Algorithm' ORDER BY qID DESC"; // Last entry First out :)
    $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

    //Display the Questions from qTable
    if(mysqli_num_rows($result) > 0)
      {
        include("renderCard.php");
      }
  } elseif ($_POST['filter'] =='ML') 
  {
    //搜尋資料庫資料
    $sql = "SELECT * FROM qTable WHERE qSpace = 'Machine Learning' ORDER BY qID DESC"; // Last entry First out :)
    $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

    //Display the Questions from qTable
    if(mysqli_num_rows($result) > 0)
    {
      include("renderCard.php");
    }
  } elseif ($_POST['filter'] =='System') 
  {
    //搜尋資料庫資料
    $sql = "SELECT * FROM qTable WHERE qSpace = 'System' ORDER BY qID DESC"; // Last entry First out :)
    $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

    //Display the Questions from qTable
    if(mysqli_num_rows($result) > 0)
    {
      include("renderCard.php");
    }
  } elseif ($_POST['filter'] =='Javascript') 
  {
    //搜尋資料庫資料
    $sql = "SELECT * FROM qTable WHERE qSpace = 'Javascript' ORDER BY qID DESC"; // Last entry First out :)
    $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

    //Display the Questions from qTable
    if(mysqli_num_rows($result) > 0)
    {
      include("renderCard.php");
    }
  }

  
?>