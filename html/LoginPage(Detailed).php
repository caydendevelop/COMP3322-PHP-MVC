<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$userEmail = $userPassword = "";
$userEmail_err = $userPassword_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if userEmail is empty
    if(empty(trim($_POST["userEmail"]))){
        $userEmail_err = "Please enter Email.";
    }else{
        $userEmail = trim($_POST["userEmail"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["userPassword"]))){
        $userPassword_err = "Please enter your Password.";
    }else{
        $userPassword = trim($_POST["userPassword"]);
    }
    
    // Validate credentials
    if(empty($userName_err) && empty($userPassword_err)){ // There is NO ERROR.
        // Prepare a select statement
        $sql = "SELECT userID, userEmail, userPassword FROM userTable WHERE userEmail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){ // equals to   $stmt=$link->prepare($sql);
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_userEmail);  // equals to   $stmt->bind_param("s", $param_userEmail);
            
            // Set parameters
            $param_userEmail = $userEmail;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){   // equals to   $stmt->execute();
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $userID, $userEmail, md5($userPassword));
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($userPassword, md5($userPassword))){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["userID"] = $userID;
                            $_SESSION["userName"] = $userName;
                            $_SESSION["userEmail"] = $userEmail;

                            // Redirect user to welcome page
                            header("location: MainPage.php");
                        } else{
                            // Display an error message if password is not valid
                            $userPassword_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $userEmail_err = "No account found with that useremail.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>