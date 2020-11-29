<?php
$server = '127.0.0.1';
$user = 'root';
$pass = 'mySQL@2021';
$database = 'project';

// Create connection
$conn = new mysqli($server, $user, $pass, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO userTable (uid, name, email, pwd) VALUES ('$uid','$name','$email','$pwd')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

