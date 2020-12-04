<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連接資料庫
//只要此頁面上有用到連接MySQL就要include它
  include("config.php");
  $userEmail = $_POST['userEmail'];
  $userPassword = md5($_POST['userPassword']);

  //搜尋資料庫資料
  $sql = "SELECT * FROM userTable where userEmail = '$userEmail'";
  $result = mysqli_query($link, $sql);  // $link from config.php
  $row = @mysqli_fetch_row($result);

  //判斷帳號與密碼是否為空白
  //以及MySQL資料庫裡是否有這個會員
  if($userEmail == null || $row[2] != $userEmail) {
    echo "User is not registered";
  }

  else if($userPassword == null || $row[3] != $userPassword) {
    echo "Unauthorized access";
  }

  else if($userEmail != null && $userPassword != null && $row[2] == $userEmail && $row[3] == $userPassword)
  {
    //將帳號寫入session，方便驗證使用者身份
    $_SESSION['userID'] = $row[0];
    $_SESSION['userName'] = $row[1];
    $_SESSION['userEmail'] = $row[2];
    $_SESSION['user_logged_in'] = true;

    echo '<meta http-equiv=REFRESH CONTENT=1;url=MainPage.php>';
  }
  else
  {
    echo '登入失敗!';
    echo '<meta http-equiv=REFRESH CONTENT=1;url=LoginPage.php>';
  }
?>