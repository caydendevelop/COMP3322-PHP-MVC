<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
  // ob_start();
  
  //連接資料庫
  //只要此頁面上有用到連接MySQL就要include它
  include("config.php");

  if($_POST['navSearch'] != NULL) {
    $inputValue = $_POST['navSearch'];
    // $_SESSION['Space'] = $inputValue;
    //搜尋資料庫資料
    $sql = "SELECT * FROM qTable WHERE qTitle LIKE '%$inputValue%' ORDER BY qID DESC"; // Last entry First out :)
    $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

    //Display the Questions from qTable
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result)) 
        {
          $qUp = json_decode($row['qUp']);
          echo "<div class='card' data-id='".count($qUp)."'>
                  <h4>".$row['qSpace']."</h4>
                  <div class='leftSpan'>
                    <span style='display:none'>qCreatorID: ".$row['qCreatorID']."</span>
                    <h3>".$row['qCreatorName']."</h3>
                    <h5>".$row['qTime']."</h5>
                  </div>
            
                  <div class='rightSpan' id=".$row['qID']."> 
                    <form action='QuestionDetailPage.php' method='POST'>  
                      <input type='hidden' name='redirectQID' value=".$row['qID'].">
                      <input type='submit' name='submit' value=".$row['qTitle'].">
                    </form>
                    <p>".$row['qContent']."</p>
                  </div>
            
                  <div>
                    <button id='upBtn+".$row['qID']."' name='".$row['qID']."' onclick='upvote(this)' '>Upvote (".count($qUp).")</button>
                    <button>Answer</button>
                  </div>
            
                </div>";
        }
    }
  }



  if($_POST['filter'] =='Algorithm') {
    //搜尋資料庫資料
    // $inputValue = $_POST['filter'];
    // $_SESSION['Space'] = $inputValue;
    $sql = "SELECT * FROM qTable WHERE qSpace = 'Algorithm' ORDER BY qID DESC"; // Last entry First out :)
    $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

    //Display the Questions from qTable
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result)) 
        {
          $qUp = json_decode($row['qUp']);
          echo "<div class='card' data-id='".count($qUp)."'>
                  <h4>".$row['qSpace']."</h4>
                  <div class='leftSpan'>
                    <span style='display:none'>qCreatorID: ".$row['qCreatorID']."</span>
                    <h3>".$row['qCreatorName']."</h3>
                    <h5>".$row['qTime']."</h5>
                  </div>
            
                  <div class='rightSpan' id=".$row['qID'].">       
                    <form action='QuestionDetailPage.php' method='POST'>  
                      <input type='hidden' name='redirectQID' value=".$row['qID'].">
                      <input type='submit' name='submit' value=".$row['qTitle'].">
                    </form>
                    <p>".$row['qContent']."</p>
                  </div>
            
                  <div>
                    <button id='upBtn+".$row['qID']."' name='".$row['qID']."' onclick='upvote(this)' '>Upvote (".count($qUp).")</button>
                    <button>Answer</button>
                  </div>
            
                </div>";
        }
    }
  } elseif ($_POST['filter'] =='ML') 
  {
    //搜尋資料庫資料
    // $inputValue = $_POST['filter'];
    // $_SESSION['Space'] = $inputValue;
    $sql = "SELECT * FROM qTable WHERE qSpace = 'Machine Learning' ORDER BY qID DESC"; // Last entry First out :)
    $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

    //Display the Questions from qTable
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result)) 
        {
          $qUp = json_decode($row['qUp']);
          echo "<div class='card' data-id='".count($qUp)."'>
                  <h4>".$row['qSpace']."</h4>
                  <div class='leftSpan'>
                    <span style='display:none'>qCreatorID: ".$row['qCreatorID']."</span>
                    <h3>".$row['qCreatorName']."</h3>
                    <h5>".$row['qTime']."</h5>
                  </div>
            
                  <div class='rightSpan' id=".$row['qID'].">       
                    <form action='QuestionDetailPage.php' method='POST'>  
                      <input type='hidden' name='redirectQID' value=".$row['qID'].">
                      <input type='submit' name='submit' value=".$row['qTitle'].">
                    </form>
                    <p>".$row['qContent']."</p>
                  </div>
            
                  <div>
                    <button id='upBtn+".$row['qID']."' name='".$row['qID']."' onclick='upvote(this)' '>Upvote (".count($qUp).")</button>
                    <button>Answer</button>
                  </div>
            
                </div>";
        }
    }
  } elseif ($_POST['filter'] =='System') 
  {
    //搜尋資料庫資料
    // $inputValue = $_POST['filter'];
    // $_SESSION['Space'] = $inputValue;
    $sql = "SELECT * FROM qTable WHERE qSpace = 'System' ORDER BY qID DESC"; // Last entry First out :)
    $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

    //Display the Questions from qTable
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result)) 
        {
          $qUp = json_decode($row['qUp']);
          echo "<div class='card' data-id='".count($qUp)."'>
                  <h4>".$row['qSpace']."</h4>
                  <div class='leftSpan'>
                    <span style='display:none'>qCreatorID: ".$row['qCreatorID']."</span>
                    <h3>".$row['qCreatorName']."</h3>
                    <h5>".$row['qTime']."</h5>
                  </div>
            
                  <div class='rightSpan' id=".$row['qID'].">       
                    <form action='QuestionDetailPage.php' method='POST'>  
                      <input type='hidden' name='redirectQID' value=".$row['qID'].">
                      <input type='submit' name='submit' value=".$row['qTitle'].">
                    </form>
                    <p>".$row['qContent']."</p>
                  </div>
            
                  <div>
                    <button id='upBtn+".$row['qID']."' name='".$row['qID']."' onclick='upvote(this)' '>Upvote (".count($qUp).")</button>
                    <button>Answer</button>
                  </div>
            
                </div>";
        }
    }
  } elseif ($_POST['filter'] =='Javascript') 
  {
    //搜尋資料庫資料
    // $inputValue = $_POST['filter'];
    // $_SESSION['Space'] = $inputValue;
    $sql = "SELECT * FROM qTable WHERE qSpace = 'Javascript' ORDER BY qID DESC"; // Last entry First out :)
    $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

    //Display the Questions from qTable
    if(mysqli_num_rows($result) > 0)
    {
      while($row = mysqli_fetch_array($result)) 
        {
          $qUp = json_decode($row['qUp']);
          echo "<div class='card' data-id='".count($qUp)."'>
                  <h4>".$row['qSpace']."</h4>
                  <div class='leftSpan'>
                    <span style='display:none'>qCreatorID: ".$row['qCreatorID']."</span>
                    <h3>".$row['qCreatorName']."</h3>
                    <h5>".$row['qTime']."</h5>
                  </div>
            
                  <div class='rightSpan' id=".$row['qID'].">       
                    <form action='QuestionDetailPage.php' method='POST'>  
                      <input type='hidden' name='redirectQID' value=".$row['qID'].">
                      <input type='submit' name='submit' value=".$row['qTitle'].">
                    </form>
                    <p>".$row['qContent']."</p>
                  </div>
            
                  <div>
                    <button id='upBtn+".$row['qID']."' name='".$row['qID']."' onclick='upvote(this)' '>Upvote (".count($qUp).")</button>
                    <button>Answer</button>
                  </div>
            
                </div>";
        }
    }
  }

  // if($_POST['filter'] =='Hot') {
  //   if( $_SESSION['Space'] != 'original') {
  //     $cookie = $_SESSION['Space'];
  //     $sql = "SELECT * FROM qTable WHERE qSpace = '$cookie' ORDER BY LENGTH(qUp) DESC"; // Last entry First out :)
  //   }  
  //   else{
  //     $sql = "SELECT * FROM qTable ORDER BY LENGTH(qUp) DESC"; // Last entry First out :)
  //   }
  //   $result = mysqli_query($link, $sql);  // $link from config.php , save the result to $result

  //   //Display the Questions from qTable
  //   if(mysqli_num_rows($result) > 0)
  //   {
  //     while($row = mysqli_fetch_array($result)) 
  //       {
  //         $qUp = json_decode($row['qUp']);
  //         echo "<div class='card'>
  //                 <h4>".$row['qSpace']."</h4>
  //                 <div class='leftSpan'>
  //                   <span style='display:none'>qCreatorID: ".$row['qCreatorID']."</span>
  //                   <h3>".$row['qCreatorName']."</h3>
  //                   <h5>".$row['qTime']."</h5>
  //                 </div>
            
  //                 <div class='rightSpan' id=".$row['qID'].">       
  //                   <form action='QuestionDetailPage.php' method='POST'>  
  //                     <input type='hidden' name='redirectQID' value=".$row['qID'].">
  //                     <input type='submit' name='submit' value=".$row['qTitle'].">
  //                   </form>
  //                   <p>".$row['qContent']."</p>
  //                 </div>
            
  //                 <div>
  //                   <button id='upBtn+".$row['qID']."' name='".$row['qID']."' onclick='upvote(this)' '>Upvote (".count($qUp).")</button>
  //                   <button>Answer</button>
  //                 </div>
            
  //               </div>";
  //       }
  //   }
  // } 
  // ob_end_flush();
  

?>