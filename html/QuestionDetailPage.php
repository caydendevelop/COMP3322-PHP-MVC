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
      print "I am qID: '$para'";
      
      $sql = "SELECT * FROM qTable WHERE qID = '$para' ORDER BY qID DESC";; // Last entry First out :)
      $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

      //Display the Questions from qTable
      if(mysqli_num_rows($result) > 0)
      {
        while($row = mysqli_fetch_array($result)) 
        {
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
      
    

        // if($_SESSION['userName'] == )
        // <button style="float: right;">Delete</button>
        // <button style="float: right;">Edit</button>
    ?>
  </div>

    <!-- <h5>Javascript</h5>
    <h3 style="display: inline-block;">userName</h3>
    <h5 style="display: inline-block;">time</h5>
    <h3>questionTitle</h3>
    <p>sahfjasdhfjdlkafhdlkajfhdljkahfdlka;f kjsdhfjk dskljkljfdskf dksf ds dk dshkjf hsdaklf</p> -->
  </div>

  <!-- <div class="answerCard">
    <div>
      <button>Upvote</button>
      <button style="float: right;">Edit</button>
      <button style="float: right;">Delete</button>
    </div>

    <h3 style="display: inline-block;">userName</h3>
    <h5 style="display: inline-block;">time</h5>
    <p>sahfjasdhfjdlkafhdlkajfhdljkahfdlka;f kjsdhfjk dskljkljfdskf dksf ds dk dshkjf hsdaklf</p>
  </div>

  <div class="answerCard">
    <h3>userName</h3>
    <h2>Post your new answer.</h2>
     
    <textarea name="answerContent" style="width:35em; height:8em;"></textarea>
    <div>
      <button >Submit</button>
      <button >Cancel</button>
    </div> 
  </div>  -->
</body>
</html>


<!-- 

      //連接資料庫
      //只要此頁面上有用到連接MySQL就要include它
      include("config.php");

      $qID = $_POST['redirectQID'];
      //搜尋資料庫資料
      $sql = "SELECT * FROM qTable WHERE qID = $qID ORDER BY qID DESC"; // Last entry First out :)
      $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result
      
      //Display the Questions from qTable
      if(mysqli_num_rows($result) > 0)
      {
        while($row = mysqli_fetch_array($result)) 
        {
          echo "<div class='card'>
                  <h4>".$row['qSpace']."</h4>
                  <div class='leftSpan'>
                    <span style='display:none'>qCreatorID: ".$row['qCreatorID']."</span>
                    <h3>".$row['qCreatorName']."</h3>
                    <h5>".$row['qTime']."</h5>
                  </div>
            
                  <div class='rightSpan' id=".$row['qID'].">                    
                    <h3 onclick='redirectQuestion(this)'>".$row['qTitle']."</h3>
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
    

        // if($_SESSION['userName'] == )
        // <button style="float: right;">Delete</button>
        // <button style="float: right;">Edit</button>
     -->