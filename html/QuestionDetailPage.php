<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!DOCTYPE html>
<html>
<head>
  <title>QuestionDetailPage</title>
  <link rel="stylesheet" href="../css/QuestionDetailPage.css">
</head>
<body>
  <a href='./MainPage.php'><button class="backButton">back</button></a>

      <?php

      include("config.php");

      $qID = $_POST['redirectQID'];
      
      $sql = "SELECT * FROM qTable WHERE qID = '$qID' ORDER BY qID DESC";; // Last entry First out :)
      $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result
      print "<div class='card'>";
      //Display the Questions from qTable
      if(mysqli_num_rows($result) > 0)
      {
        
        $row = mysqli_fetch_array($result);
        $qTime = $row['qTime'];
        $qUp = json_decode($row['qUp']);
        echo "<button id='upBtn+".$row['qID']."' name='".$row['qID']."' onclick='upvote(this)'>Upvote (".count($qUp).")</button>";
        if($_SESSION['userID'] == $row['qCreatorID']){
          echo "<span style='float:right'>
                  <button onclick='editQuestion(this)' name='".$row['qID']."'>Edit</button>
                  <form action='./Delete.php' method='POST'>
                    <input type='hidden' name='ansQID' value=".$row['qID'].">
                    <input type='submit' name='delButton' value='Delete' />
                  </form>
                </span>";
        }
        
        echo "<div id='".$qID."' class='card'>
                <h4 id='space_".$qID."'>".$row['qSpace']."</h4>
                <div class='leftSpan'>
                  <span style='display:none'>qCreatorID: ".$row['qCreatorID']."</span>
                  <h3>".$row['qCreatorName']."</h3>
                  <h5>".$row['qTime']."</h5>
                </div>
          
                <div class='rightSpan' id=".$qID.">                    
                  <h3 id='title_".$qID."'>".$row['qTitle']."</h3>
                  <p id='content_".$qID."'>".$row['qContent']."</p>
                </div>
          
              </div>";
      
      
      }
      print"</div>";

      $sql2 = "SELECT * FROM ansTable WHERE ansQID = '$qID' ORDER BY ansID DESC";; // Last entry First out :)
      $result2 = mysqli_query($link, $sql2);  // $link from config.php , save the result to $result
      //Display the Questions from qTable
      if(mysqli_num_rows($result2) > 0)
      {
        while($row2 = mysqli_fetch_array($result2)) 
        {
          echo"<div class='answerCard'>
                <span>".$row2['ansUserName']."</span>
                <span>posted on ".$row2['ansTime']."</span>
                <br/><br/>
                <div class='ansDiv'>
                  ".$row2['ansContent']."
                </div>
              </div>";
        }
      }


      if($_SESSION['user_logged_in'] === true) {
        echo"<div class='answerCard'>
              <h3>$_SESSION[userName]</h3>
              <button id='postAnsLink' onclick='show()'><h2>Post your new answer.</h2></button>
              <div id='ansDiv' class='ansDiv noShow'>
                <form action='./answerFunction.php' method='POST'>
                  <input type='hidden' name='ansQID' value=".$row['qID'].">
                  <textarea name='ansContent' id='ansContent' style='width:35em; height:8em;' required></textarea>
                  <br/><br/>
                  <input type='submit' name='ansButton' id='ansButton' value='Submit' />
                </form>
                <button onclick='noShow()'>Cancel</button>
              </div>
            </div>";
      }
      
    print"</div>";
    ?>
  

    


  <script>
    let getAnsDiv = document.getElementById('ansDiv');
    let getpostAnsLink = document.getElementById('postAnsLink');
    let getansContent = document.getElementById('ansContent');

    function show(){
      getAnsDiv.classList.remove('noShow');
      getpostAnsLink.classList.add('noShow');
    }

    function noShow(){
      getAnsDiv.classList.add('noShow');
      getpostAnsLink.classList.remove('noShow');
      getansContent.value = '';
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

    function editQuestion(para){
      let qID = para.name;
      let questionCard = document.getElementById(qID);
      let questionTitle = document.getElementById('title_'+qID).innerHTML;
      let questionSpace = document.getElementById('space_'+qID).innerHTML;
      let questionContent = document.getElementById('content_'+qID).innerHTML;

      questionCard.innerHTML = "";
      let bodyContent = "";
      bodyContent += `<form action="./editQuestion.php" method="POST">                                  
                        <p>Title</p>
                        <input type="text" size="35" value=`+questionTitle+` name="qTitle" required/>
                      `;
      
      if(questionSpace == 'Algorithm'){
        bodyContent += `<p>Space</p>
                                      <input type="radio" name="qSpace" value="Algorithm" required checked>Algorithm
                                      <input type="radio" name="qSpace" value="Machine Learning">Machine Learning
                                      <input type="radio" name="qSpace" value="System">System
                                      <input type="radio" name="qSpace" value="Javascript">Javascript`
      } 
      else if(questionSpace == 'Machine Learning')
      {
        bodyContent += `<p>Space</p>
                                      <input type="radio" name="qSpace" value="Algorithm" required >Algorithm
                                      <input type="radio" name="qSpace" value="Machine Learning" checked>Machine Learning
                                      <input type="radio" name="qSpace" value="System">System
                                      <input type="radio" name="qSpace" value="Javascript">Javascript`
      } 
      else if(questionSpace == 'System')
      {
        bodyContent += `<p>Space</p>
                                      <input type="radio" name="qSpace" value="Algorithm" required >Algorithm
                                      <input type="radio" name="qSpace" value="Machine Learning">Machine Learning
                                      <input type="radio" name="qSpace" value="System" checked>System
                                      <input type="radio" name="qSpace" value="Javascript">Javascript`
      } 
      else if(questionSpace == 'Javascript')
      {
        bodyContent += `<p>Space</p>
                                      <input type="radio" name="qSpace" value="Algorithm" required >Algorithm
                                      <input type="radio" name="qSpace" value="Machine Learning">Machine Learning
                                      <input type="radio" name="qSpace" value="System">System
                                      <input type="radio" name="qSpace" value="Javascript" checked>Javascript`
      };
      bodyContent +=`<p>Content</p>
                                  <textarea name="qContent" style="width:35em; height:8em;" required>`+questionContent+`</textarea>
                                  <br/>
                                  <br/>
                                  <input type='hidden' name='qID' value=`+qID+`>
                                  <input type="submit" name="button" value="Submit" />
                              </form>
    `;
    questionCard.innerHTML += bodyContent;
    }
  </script>
</body>
</html>




       
    