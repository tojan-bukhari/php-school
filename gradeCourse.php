<?php 
    session_start();
    include("connection.php");
    include("functions.php");

    if(isset($_POST['id'])&&isset($_POST['grade'])&&isset($_POST['course'])){
      $id = trim($_POST['id']);
      $grade = trim($_POST['grade']);
      $course = trim($_POST['course']);

      $sql = "insert into courses (course,id_student,grade) value('".$course."', '".$id."','".$grade."')";
      $result = mysqli_query($con, $sql);
      if($result)
      {
        echo "adedd course successfully";
      }
    }
?>