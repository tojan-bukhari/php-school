<?php
include("connection.php");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM users WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($con, $query))
 {
  echo 'Data Deleted';
 }
}
?>
