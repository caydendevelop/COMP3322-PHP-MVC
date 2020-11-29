<?php
$server = 'sophia.cs.hku.hk';
$user = 'chngai';
$pass = 'SQL33220';
$database = 'chngai';

// Create connection
$conn = new mysqli($server, $user, $pass, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO userTable (userUID, userName, userEmail, userPassword) VALUES ('$userUID','$userName','$userEmail','$userPassword')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

