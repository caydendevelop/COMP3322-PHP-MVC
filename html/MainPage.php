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
    <a href='./MainPage.php'><button class="topNavButton">Ques</button></a>
    <a href='./MainPage.php'><button class="topNavButton">Home</button></a>
    <button class="topNavButton">Hot</button>
    <input type="text" class="navSearch" name="submitSearch" id="navSearch" onkeyup="navSearch(this.value)"/>
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
 
    <input class="leftNavButton" type="submit" name="submitAlgorithm" id="buttonAlgorithm" value="Algorithm" onclick="algorithmFilter()"/>
    <input class="leftNavButton" type="submit" name="submitML" id="buttonML" value="Machine Learning" onclick="MLFilter()"/>
    <input class="leftNavButton" type="submit" name="submitSystem" id="buttonSystem" value="System"  onclick="SystemFilter()"/>
    <input class="leftNavButton" type="submit" name="submitJavascript" id="buttonJavascript" value="Javascript"  onclick="JavascriptFilter()"/>
    
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
              <a href='./NewQuestionPage.php'><h2>What is your Question?</h2></a>
            </div>";
      }

      print"<div id='cardContainer'>";

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
      print"</div>";
    ?>

  </main>
  <script>
    function navSearch(str){
      let cardContainer = document.getElementById('cardContainer');
      cardContainer.innerHTML = "";
        
      var xmlhttp = new XMLHttpRequest();
          
      xmlhttp.open("POST", "MainPageFunction.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("navSearch="+str);

      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var mesgs = document.getElementById("cardContainer");
          mesgs.innerHTML = xmlhttp.responseText;
        }
      }
      // if (str.length==0) {
      //   document.getElementById("navSearch").innerHTML="";
      //   document.getElementById("navSearch").style.border="0px";
      //   return;
      // }
      // var xmlhttp=new XMLHttpRequest();
      // xmlhttp.onreadystatechange=function() {
      //   if (this.readyState==4 && this.status==200) {
      //     document.getElementById("navSearch").innerHTML=this.responseText;
      //     document.getElementById("navSearch").style.border="1px solid #A5ACB2";
      //   }
      // }
      // xmlhttp.open("POST", "MainPageFunction.php", true);
      // xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      // xmlhttp.send(`search=`str``);
    }


    function algorithmFilter(){
      let cardContainer = document.getElementById('cardContainer');
      cardContainer.innerHTML = "";
        
      var xmlhttp = new XMLHttpRequest();
          
      xmlhttp.open("POST", "MainPageFunction.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("filter=Algorithm");

      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var mesgs = document.getElementById("cardContainer");
          mesgs.innerHTML = xmlhttp.responseText;
        }
      }
    }

    function MLFilter(){
      let cardContainer = document.getElementById('cardContainer');
      cardContainer.innerHTML = "";
        
      var xmlhttp = new XMLHttpRequest();
          
      xmlhttp.open("POST", "MainPageFunction.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("filter=ML");

      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var mesgs = document.getElementById("cardContainer");
          mesgs.innerHTML = xmlhttp.responseText;
        }
      }
    }

    function SystemFilter(){
      let cardContainer = document.getElementById('cardContainer');
      cardContainer.innerHTML = "";
        
      var xmlhttp = new XMLHttpRequest();
          
      xmlhttp.open("POST", "MainPageFunction.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("filter=System");

      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var mesgs = document.getElementById("cardContainer");
          mesgs.innerHTML = xmlhttp.responseText;
        }
      }
    }

    function JavascriptFilter(){
      let cardContainer = document.getElementById('cardContainer');
      cardContainer.innerHTML = "";
        
      var xmlhttp = new XMLHttpRequest();
          
      xmlhttp.open("POST", "MainPageFunction.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("filter=Javascript");

      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var mesgs = document.getElementById("cardContainer");
          mesgs.innerHTML = xmlhttp.responseText;
        }
      }
    }
    
    
  </script>
</body>
</html>
