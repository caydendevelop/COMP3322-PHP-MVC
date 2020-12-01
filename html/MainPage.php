<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<head>
  <title>MainPage</title>
  <link rel="stylesheet" href="../css/MainPage.css">
</head>
<body>
  <nav class="navBar">
    <button class="topNavButton">Forum</button>
    <button class="topNavButton">Home</button>
    <button class="topNavButton">Hot</button>
    <input type="text" class="navSearch"/>

    <?php
      if($_SESSION['user_logged_in'] === true) {
        echo "<a href='./LogoutFunction.php'> <button class='topNavButton navAlignRight'>Log out</button></a>";
        //echo'<input type="submit" name="submit" class="topNavButton navAlignRight" id="LogoutButton" value="Log Out" action="./LogoutFunction.php"/>';
      }else{
        echo "<a href='./RegisterPage.php'><button class='topNavButton navAlignRight'>Register</button></a>
              <a href='./LoginPage.php'><button class='topNavButton navAlignRight'>Log in</button></a>";
      }
    ?>

  </nav>

  <div class="leftNav">
    <button class="leftNavButton ">Algorithm</button>
    <button class="leftNavButton ">Machine Learning</button>
    <button class="leftNavButton">System</button>
    <button class="leftNavButton">Javascript</button>
  </div>

  <main class="mainContainer">

    <?php

      if($_SESSION['user_logged_in'] === true) {
        echo"<div class='askButtonContainer'>
              <a href='./NewQuestionPage.php'><button class='askButton'>Ask Question</button></a>
            </div>";
      }
      if($_SESSION['user_logged_in'] === true) {
        echo"<div class='card'>
              <h3>$_SESSION[userName]</h3>
              <h2>What is your Question?</h2>
            </div>";
      }

      //連接資料庫
      //只要此頁面上有用到連接MySQL就要include它
      include("config.php");

      //搜尋資料庫資料
      $sql = "SELECT * FROM qTable ORDER BY qID DESC"; // Last entry First out :)
      $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result
      
      //Display the Questions from qTable
      if(mysqli_num_rows($result) > 0)
      {
        while($row = mysqli_fetch_array($result)) 
        {
          echo "<div class='card'>
                  <h4>".$row['qSpace']."</h4>
                  
                  <div class='leftSpan'>
                    <h3>".$row['qCreatorName']."</h3>
                    <h5>".$row['qTime']."</h5>
                  </div>
            
                  <div class='rightSpan'>
                    <h3>".$row['qTitle']."</h3>
                    <p>".$row['qContent']."</p>
                  </div>
            
                  <div>
                    <button>Upvote</button>
                    <button>Answer</button>
                  </div>
            
                </div>";
        }
      }

    ?>

  </main>
    
</body>
</html>
