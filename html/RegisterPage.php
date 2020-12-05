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
        <!-- <h4>UID</h4> -->
        <h4>Name</h4>
        <input type="text" size="35" name="userName" required/>
        <h4>Email</h4>
        <input type="email" size="35" name="userEmail" required/>
        <h4>Password</h4>
        <input type="password" size="35" name="userPassword" id="password_1" required/>
        <h4>Password Confirmation </h4>
        <input type="password" size="35" name="userPassword_2" id="password_2" required/>  
        <br/><br/>
        <input type="submit" name="submit" id="button" value="signup" />
        <br/>
      
      </div>

      <br/>
    </form>
  </div>

  <script type="text/javascript" src="RegisterPage.js"></script>
</body>

</html>