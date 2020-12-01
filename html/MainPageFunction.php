
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
  //連接資料庫
  //只要此頁面上有用到連接MySQL就要include它
  include("config.php");

  if($_POST['filter'] =='Algorithm') {
    //搜尋資料庫資料
    $sql = "SELECT * FROM qTable WHERE qSpace = 'Algorithm'"; // Last entry First out :)
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
  } elseif ($_POST['filter'] =='ML') 
  {
    //搜尋資料庫資料
    $sql = "SELECT * FROM qTable WHERE qSpace = 'Machine Learning'"; // Last entry First out :)
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
  } elseif ($_POST['filter'] =='System') 
  {
    //搜尋資料庫資料
    $sql = "SELECT * FROM qTable WHERE qSpace = 'System'"; // Last entry First out :)
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
  } elseif ($_POST['filter'] =='Javascript') 
  {
    //搜尋資料庫資料
    $sql = "SELECT * FROM qTable WHERE qSpace = 'Javascript'"; // Last entry First out :)
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
  }
  
?>