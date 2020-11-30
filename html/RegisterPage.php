<!DOCTYPE html>
<html>
<head>
  <title>RegisterPage</title>
  <link rel="stylesheet" href="../css/RegisterPage.css">
  
</head>
<body>
  <div class="RegisterPageContainer_1">
    <h2>Create an account</h2>
    <form action="./RegisterFunction.php" method="POST">
      <div class="left">
        <h4>UID</h4>
        <h4>Name</h4>
        <h4>Email</h4>
        <h4>Password</h4>
        <h4>Password Confirmation </h4>
        <br />
      </div>

      <div class="right">
        <input type="text" size="35" name="userID" required/>
        <input type="text" size="35" name="userName" required/>
        <input type="email" size="35" name="userEmail" required/>
        <input type="password" size="35" name="userPassword" id="password_1" required/>
        <input type="password" size="35" name="userPassword_2" id="password_2" required/>  
        <input type="submit" name="submit" id="button" value="signup" />
      </div>
      <br/>
    </form>
  </div>

  <script type="text/javascript" src="RegisterPage.js"></script>
</body>

</html>