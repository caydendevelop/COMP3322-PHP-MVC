<?php

while($row = mysqli_fetch_array($result)) 
{
  $qID = $row['qID'];
  $qUp = json_decode($row['qUp']);
  $qAnswer = json_decode($row['qAnswer']);
  echo "<div class='card' data-id='".count($qUp)."' id='".$qID."'>
          <h4>".$row['qSpace']."</h4>
          <div class='leftSpan'>
            <span style='display:none'>qCreatorID: ".$row['qCreatorID']."</span>
            <h3>".$row['qCreatorName']."</h3>
            <h5>".$row['qTime']."</h5>
          </div>
    
          <div class='rightSpan'>       
            <form action='QuestionDetailPage.php' method='POST'>  
              <input type='hidden' name='redirectQID' value=".$row['qID'].">
              <input class='cardTitle' type='submit' name='submit' value=".$row['qTitle'].">
            </form>
            <p class='paragraph'>".$row['qContent']."</p>                       
          </div>
    
          <div>
            <button id='upBtn+".$row['qID']."' name='".$row['qID']."' onclick='upvote(this)' >Upvote (".count($qUp).")</button>
            <button id='answerBtn+".$row['qID']."' name='".$row['qID']."' onclick='showAnswer(this)'>Answer (".count($qAnswer).")</button>
          </div>
      " ;
  $sql2 = "SELECT * FROM ansTable WHERE ansQID = '$qID' ORDER BY ansID DESC"; // Last entry First out :)
  $result2 = mysqli_query($link, $sql2);  // $link from config.php , save the result to $result
  //Display the Questions from qTable
  if(mysqli_num_rows($result2) > 0)
  {
    echo"<div class='ansContainer noShow' id='ans_".$qID."' stat='off'>";

    while($row2 = mysqli_fetch_array($result2)) 
    {
      echo"<div class='answerCard' >
            <span>".$row2['ansUserName']."</span>
            <span class='cardTime'>posted on ".$row2['ansTime']."</span>
            <br/><br/>
            <div class='ansDiv'>
              ".$row2['ansContent']."
            </div>
          </div>";
    }
    if($_SESSION['user_logged_in'] === true) {
      echo"<div class='answerCard'>
            <h3>$_SESSION[userName]</h3>
            <button onclick='showInput(this)' name='".$qID."'><h2>Post your new answer.</h2></button>
            <div id='ansDiv_".$qID."' class='ansDiv noShow' >
              <form action='./answerFunction.php' method='POST'>
                <input type='hidden' name='ansQID' value=".$row['qID'].">
                <textarea name='ansContent' id='ansContent_".$qID."' style='width:35em; height:8em;' required></textarea>
                <br/><br/>
                <input type='submit' name='ansButton' value='Submit' />
              </form>
              <button onclick='hideInput(this)' name='".$qID."'>Cancel</button>
            </div>
          </div>";
    }
    print "</div>";
  } 
  
  else 
  {
    echo"<div class='ansContainer noShow' id='ans_".$qID."'>";

    if($_SESSION['user_logged_in'] === true) {
      echo"<div class='answerCard'>
            <h3>$_SESSION[userName]</h3>
            <button onclick='showInput(this)' name='".$qID."'><h2>Post your new answer.</h2></button>
            <div id='ansDiv_".$qID."' class='ansDiv noShow' >
              <form action='./answerFunction.php' method='POST'>
                <input type='hidden' name='ansQID' value=".$row['qID'].">
                <textarea name='ansContent' id='ansContent_".$qID."' style='width:35em; height:8em;' required></textarea>
                <br/><br/>
                <input type='submit' name='ansButton' value='Submit' />
              </form>
              <button onclick='hideInput(this)' name='".$qID."'>Cancel</button>
            </div>
          </div>";
    }
    print "</div>";
  }

  print "</div>";
}


?>