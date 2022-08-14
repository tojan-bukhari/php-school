<?php 
session_start();

    include("connection.php");
    include("functions.php");

    if(isset($_POST['submit'])){
      $user_name = $_POST['user_name'];
      $email 	= $_POST['email'];
      $password = $_POST['pass'];
      $options = array("cost"=>4);
      $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
      
      $sql = "insert into users (user_name,email, password) value('".$user_name."', '".$email."','".$hashPassword."')";
      $result = mysqli_query($con, $sql);
      if($result)
      {
        echo "Registration successfully";
        header('location: login.php');
      }
    }

   

    
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous"> -->
<title>Signup</title>
<link rel="stylesheet" href="login.css">
</head>
<body style="background-color:#eee;">
<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100" style="background-color: #f8fafb;" >
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                <form method="post" class="mx-1 mx-md-4"  cellpadding="10" cellspacing="1" width="500">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="user_name"id="form3Example1c"class="form-control">
                      <label class="form-label" for="form3Example1c">Your Name</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" name="email"id="form3Example3c" class="form-control">
                      <label class="form-label" for="form3Example3c">Your Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="pass" id="form3Example4c" class="form-control" >
                      <label class="form-label" for="form3Example4c">Password</label>
                    </div>
                  </div>

                  <!-- <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" />
                      <label class="form-label" for="form3Example4cd">Repeat your password</label>
                    </div>
                  </div> -->

                  <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary btn-lg">
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://images2.theispot.com/300x300/a4092ir1151.jpg?v=210306034300"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>





<!-- if($_SERVER['REQUEST_METHOD']== "POST")
    {
        // somthing is posted 
        $user_name =$_POST["user_name"];
        $email = $_POST["email"];
        $pass= $_POST["pass"];
        $password_hash = password_hash($pass, PASSWORD_BCRYPT);

        if(!empty ($user_name) && !empty($email) && !empty($pass) && !is_numeric($user_name))
        {
            $query=$con->prepare("SELECT * FROM users WHERE email=:email");
            $query->bindparam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if(rowCount() > 0){
              echo "<p class=error>Email has already peen taken</p>";
            }
            if(rowCount() == 0){
            // save to data pase 
            $query = "insert into users (user_name,email,password) values ('$user_name', '$email', '$hash')";

            mysqli_query($con,$query);

           header("location: login.php ");
           die;
        }else
        {
            echo "please enter some valid information";
        }}
    } -->


    <!-- if($_SERVER['REQUEST_METHOD']== "POST")
    {
        // somthing is posted 
        $user_name =$_POST["user_name"];
        $email = $_POST["email"];
        $pass= $_POST["pass"];

        if(!empty ($user_name) && !empty($email) && !empty($pass) && !is_numeric($user_name))
        {
            // save to data pase 
            $query = "insert into users (user_name,email,password) values ('$user_name', '$email', '$pass')";

            mysqli_query($con,$query);

           header("location: login.php ");
           die;
        }else
        {
            echo "please enter some valid information";
        }
    } -->

 
		