<!DOCTYPE html>
<html>
  <head>
    <title>LoginPage</title>
    <link rel="stylesheet" href="../css/LoginPage.css">
  </head>

  <body>

    <div class="LoginPageContainer_1">

      <div class="LoginPageContainer_2">

        <h2>Sign In</h2>

        <form action="./LoginFunction.php" method="POST">
          <!-- <div>
            <h4 style="display:inline; margin-right:4em">Email</h4>
            <input type="email" name="userEmail" size="35" style="display:inline"/>
            <br/><br/>
            <h4 style="display:inline; margin-right:2em">Password</h4>       
            <input type="password" name="userPassword" size="35" style="display:inline"/>
            <br/><br/>
            <input type="submit" name="submit" id="button" value="login" />
          </div> -->

          <div class="left">
            <h4>Email</h4>
            <h4>Password</h4>
            <br/>
            
          </div>

          <div class="right">
            <input type="email" size="35" name="userEmail" required/>
            <input type="password" size="35" name="userPassword" id="password_1" required/>
            <input type="submit" name="submit" id="button" value="login" />
          </div>
          <br/>
        </form>

          

        <h5>Do not have an account?</h4>

        <a href='./RegisterPage.php'><button>Register</button></a>
    
      </div>

  </body>

</html>