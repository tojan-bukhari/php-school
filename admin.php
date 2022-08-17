<?php 
session_start();

    include("connection.php");
    include("functions.php");

    if(isset($_POST['submit'])){
      $user_name = $_POST['user_name'];
      $email 	= $_POST['email'];
      $password = $_POST['pass'];
      $_SESSION["user_name"]=$user_name;
      $options = array("cost"=>4);
      $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
      
      $sql = "insert into users (user_name,email, password) value('".$user_name."', '".$email."','".$hashPassword."')";
      $result = mysqli_query($con, $sql);
      if($result)
      {
        // echo "Registration successfully";
        // header('location: login.php');
      }
    }
?>

<?php
//select.php
include("connection.php");

$query = "SELECT * FROM users ";

$result = mysqli_query($con, $query );

$data = array();

while($row = mysqli_fetch_array($result)){
    $sub_array = array();
    $sub_array[] = '<option class="option" id="'.$row["id"].'">' . $row["user_name"] . '</option>';
    $data[] = $sub_array;
}

?>

<html>
 <head>
  <title>Admin</title>
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
   padding:20px;
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
 </head>
 <body>
  <div class="container box">
   <h1 align="center">User Table</h1>
   <br />
   <div class="table-responsive">
   <br />
    <div align="right">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#AddUserModal">Add User</button>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#courseModal">Add Course</button>
    </div>
    
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>User Name</th>
       <th>Email</th>
       <th></th>
       <th>Active</th>
      </tr>
     </thead>
    </table>
   </div>
  </div>

  <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="AddUserModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New User</h4>
        </div>
        <div class="modal-body">
          <form method="post"> 
          <div class="form-outline flex-fill mb-0">
                  <input type="text" name="user_name" id="name" class="form-control">
                  <label class="form-label" for="form3Example1c">User Name</label>
          </div>
          <div class="form-outline form-white mb-4">
                <input type="email" name="email" id="email" class="form-control form-control-lg"></td>
                <label class="form-label" for="typeEmailX">User Email</label>
          </div>
          <div class="form-outline form-white mb-4">
                <input type="password" name="pass" id="pass"  class="form-control form-control-lg"></td>
                <label class="form-label" for="typePasswordX">User Password</label>
          </div>
          <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary btn-lg">
          </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="courseModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Course for User</h4>
        </div>
        <div class="modal-body">
          <div class="form-outline flex-fill mb-0">
          <select id='user_name' class="form-select" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <?php if($data!="") { echo print_r($data); } ?>
          </select>
          <label class="form-label" for="form3Example1c">User Name</label>
          </div>
          <div class="form-outline form-white mb-4">
                <input type="text" name="course" id="course" class="form-control form-control-lg"></td>
                <label class="form-label" for="typeEmailX">Course</label>
          </div>
          <div class="form-outline form-white mb-4">
                <input type="text" name="grade" id="grade"  class="form-control form-control-lg"></td>
                <label class="form-label" for="typePasswordX">User Grade</label>
          </div>
          <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary btn-lg okCourse">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

 </body>
</html>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch-test.php",
     type:"POST"
    }
   });
  }
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update-test.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  
  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"delete-test.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });

  $(document).on('click', '.active', function(){
   var id = $(this).attr("id");
   var value;
   if($(this).attr("value")=='off'){
    $.ajax({
     url:"active.php",
     method:"POST",
     data:{id:id, value:1},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
   }else{
    $.ajax({
     url:"active.php",
     method:"POST",
     data:{id:id,value:0},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });

   }
   if(confirm("Are you sure you want to Active this?"))
   {
    $.ajax({
     url:"active.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
////////////////////////////////////////////HANDLE SELET COURSE FOR USER////////
$(document).on('click', '.form-select', function(){
    // console.log('this selected user id',id);
    var select = document.getElementById('user_name');
    var id = select.options[select.selectedIndex].id;
    $(document).on('click', '.okCourse', function(){
      let course = document.getElementById("course").value;
      let grade = document.getElementById("grade").value;

      $.ajax({
      url:"gradeCourse.php",
      method:"POST",
      data:{id:id, grade:grade, course:course},
      success:function(data){
        $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
        fetch_data();
      }
    })
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
  });
 });
})



</script>