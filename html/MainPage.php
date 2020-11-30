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
    ?>

    <?php
      if($_SESSION['user_logged_in'] === true) {
        echo"<div class='card'>
              <h3>$_SESSION[userName]</h3>
              <h2>What is your Question?</h2>
            </div>";
      }
    ?>

    <div class="card">
      <h4>Javascript</h4>
      
      <div class="leftSpan">
        <h3>userName</h3>
        <h5>time</h5>
      </div>

      <div class="rightSpan">
        <h3>questionTitle</h3>
        <p>sahfjasdhfjdlkafhdlkajfhdljkahfdlka;f kjsdhfjk dskljkljfdskf dksf ds dk dshkjf hsdaklf</p>
      </div>

      <div>
        <button>Upvote</button>
        <button>Answer</button>
      </div>

    </div>


  </main>
    

</body>
</html>