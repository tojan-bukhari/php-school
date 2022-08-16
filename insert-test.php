<?php
include("connection.php");
if(isset($_POST["user_name"], $_POST["email"]))
{
 $user_name = mysqli_real_escape_string($con, $_POST["user_name"]);
 $email = mysqli_real_escape_string($con, $_POST["email"]);
 $password = mysqli_real_escape_string($con, $_POST["password"]);
 $query = "INSERT INTO users ( user_name, email,password) VALUES('$user_name', '$email',$password)";
 if(mysqli_query($con, $query))
 {
  echo 'Data Inserted';
 }
}
?>