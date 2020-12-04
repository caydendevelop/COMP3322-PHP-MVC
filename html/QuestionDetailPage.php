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

  <div class="card">
    <div>
      <button>Upvote</button>
      
      <?php

      include("config.php");

      $para = $_POST['redirectQID'];
      // print "I am qID: '$para'";
      
      $sql = "SELECT * FROM qTable WHERE qID = '$para' ORDER BY qID DESC";; // Last entry First out :)
      $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

      //Display the Questions from qTable
      if(mysqli_num_rows($result) > 0)
      {
        while($row = mysqli_fetch_array($result)) 
        {

          if($_SESSION['userID'] == $row['qCreatorID']){
            echo "<button style='float: right;'>Delete</button>
                  <button style='float: right;'>Edit</button>";
          }
          echo "<div class='card'>
                  <h4>".$row['qSpace']."</h4>
                  <div class='leftSpan'>
                    <span style='display:none'>qCreatorID: ".$row['qCreatorID']."</span>
                    <h3>".$row['qCreatorName']."</h3>
                    <h5>".$row['qTime']."</h5>
                  </div>
            
                  <div class='rightSpan' id=".$row['qID'].">                    
                    <h3>".$row['qTitle']."</h3>
                    <p>".$row['qContent']."</p>
                  </div>
            
                </div>";
        }
      }
      print"</div>";
      
    ?>
  </div>

    <!-- <h5>Javascript</h5>
    <h3 style="display: inline-block;">userName</h3>
    <h5 style="display: inline-block;">time</h5>
    <h3>questionTitle</h3>
    <p>sahfjasdhfjdlkafhdlkajfhdljkahfdlka;f kjsdhfjk dskljkljfdskf dksf ds dk dshkjf hsdaklf</p> -->
  </div>

  
</body>
</html>




       
    