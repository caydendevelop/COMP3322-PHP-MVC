<?php session_start(); 
// $_SESSION['Space'] = "original";
?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
<head>
  <title>MainPage</title>
  <link rel="stylesheet" href="../css/MainPage1.css">
</head>
<body>
  <nav class="navBar">
    <div class="leftColumn">
      <a href='./MainPage.php'><button class="topNavButton">Ques</button></a>
      <a href='./MainPage.php'><button class="topNavButton">Home</button></a>
      <button class="topNavButton" onclick="hot()">Hot</button>
    </div>
    <input type="text" class="navSearch" name="submitSearch" id="navSearch" onkeyup="navSearch(this.value)"/>
    <?php
      if($_SESSION['user_logged_in'] === true) {
        echo "<a href='./LogoutFunction.php'> <button class='topNavButton navAlignRight'>Log out</button></a>";
      }else{
        echo "<span class='navAlignRight'>
                <a href='./RegisterPage.php'><button class='topNavButton'>Register</button></a>
                <a href='./LoginPage.php'><button class='topNavButton'>Log in</button></a>
              </span>";
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
      
        echo"<div class='card' data-id='65534'>
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
        include("renderCard.php");
      }
      print"</div>";
    ?>

  </main>
  
  <script>
    let ansContainerChecker = 0; // No any ans is expanded

    function showAnswer(para){
      let qID = para.parentNode.parentNode.id;
      let answerContainer = document.getElementById('ans_'+qID);

      if (ansContainerChecker == 0){ // if no any ans is expanded
        answerContainer.classList.remove('noShow');
        answerContainer.setAttribute('stat', 'on');
        ansContainerChecker = 1; // Ans is expanded
      }
      else 
      { // if Ans is expanded

        if (answerContainer.getAttribute('stat') == 'on'){
          answerContainer.classList.add('noShow');
          answerContainer.setAttribute('stat', 'off');
          ansContainerChecker = 0;
        } 
        
        else 
        {
          let globalRange = document.getElementsByClassName('ansContainer');
          for(var i = 0; i < globalRange.length; i++) // change all ans to be non expanded
          {
            globalRange[i].classList.remove('noShow');
            globalRange[i].classList.add('noShow');
            globalRange[i].setAttribute('stat', 'off');
          }
          answerContainer.classList.remove('noShow');
          answerContainer.setAttribute('stat', 'on');
        } 
      }
    }

    function showInput(para){
      let ansDivID = document.getElementById('ansDiv_'+para.name)
      ansDivID.classList.remove('noShow');
    }

    function hideInput(para){
      let qID = para.name;
      para.parentNode.classList.add('noShow');
      document.getElementById('ansContent_'+qID).value ='';

    }

    function hot(){
      var aDiv = document.getElementsByClassName('card');
      var arr = [];
      for(var i=0;i<aDiv.length;i++)
      {
          arr.push(aDiv[i]);  //aDiv是元素的集合，并不是数组，所以不能直接用数组的baisort进行排序。
      }
      arr.sort(function(a,b){return b.getAttribute('data-id') - a.getAttribute('data-id')});
      for(var i=0;i<arr.length;i++)
      {
          let hi = document.getElementById('cardContainer')
          hi.appendChild(arr[i]); //将排好序的元素，重新塞到body里面显示。
      }
    }

    function upvote(para){
      
      var xmlhttp = new XMLHttpRequest();
          
      xmlhttp.open("POST", "upvote.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("upvote="+para.name);

      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          var upBtn = document.getElementById(para.id);
          upBtn.innerHTML = xmlhttp.responseText;
        }
      }
    }

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
