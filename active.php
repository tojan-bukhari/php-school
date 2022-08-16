<?php
include("connection.php");
if(isset($_POST["id"])&& isset( $_POST["value"]))
{ 
    $query="UPDATE users SET active ='".$_POST["value"]."' WHERE id = '".$_POST["id"]."'";
    if(mysqli_query($con, $query))
    {
     echo 'Data Updated';
    }
}
?>


<!-- $query = "select * from users where id = '".$_POST["id"]."'";
 $rs = mysqli_query($con,$query);
 $numRows = mysqli_num_rows($rs);
 if($numRows  == 1){
    $row = mysqli_fetch_assoc($rs);
    echo $row
    if($row['active']==0){
        $sql="UPDATE users SET active = 1 WHERE id = '".$_POST["id"]."'";
    }else if($row['active']==1){
        $sql="UPDATE users SET active = 0 WHERE id = '".$_POST["id"]."'";
    }
 } -->