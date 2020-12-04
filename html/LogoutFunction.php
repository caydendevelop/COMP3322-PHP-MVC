<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  //將session清空
  
  unset($_SESSION["loggedin"] );
  unset($_SESSION["userID"] );
  unset($_SESSION["userName"] );
  unset($_SESSION["userEmail"] );

  session_destroy();
  
  echo 'Logging out......';
  echo '<meta http-equiv=REFRESH CONTENT=1;url=MainPage.php>';
?>