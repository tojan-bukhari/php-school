<?php

session_start();
include("connection.php");
include("functions.php");

// echo $_SESSION['user_id'] ;
// echo $_SESSION['user_name'] ;
$query = "SELECT * FROM users WHERE id = '".$_SESSION['user_id']."'";
$result = mysqli_query($con, $query);

$row = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM courses WHERE id_student = '".$_SESSION['user_id']."'";

$res = mysqli_query($con, $sql );

$data = array();

while($row2 = mysqli_fetch_array($res)){
    $sub_array = array();
    $sub_array[] = '<tr class="option" id="'.$row2["id"].'">' . $row2["course"] . '</tr>';
    $data[] = $sub_array;
}
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:1270px;
   padding:10px;
   background-color:#fff;
   border:1px solid #ccc;
   border-radius:5px;
   margin-top:25px;
   box-sizing:border-box;
  }

 
  .modal-header, h4, .close {
    background-color: #5cb85c;
    color:white !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-footer {
    background-color: #f9f9f9;
  }
  </style>
<title>user</title>
</head>

<body>
hello <?php echo $_SESSION['user_name']?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td> <?php echo $row['user_name']?></td>
      <td> <?php echo $row['email']?></td>
    </tr>
  </tbody>
</table>

<table id="course_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>course</th>
       <th>grade</th>
      </tr>
     </thead>
    </table>
<button>Chat</button>
</body>

</html>

<script type="text/javascript" language="javascript" >

  $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#course_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch-course-table.php",
     type:"POST"
    }
   });
  }
});
</script>
