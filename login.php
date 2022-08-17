<?php 
    session_start();
    include("connection.php");
    include("functions.php");

    $message="";

    if(isset($_POST['submit'])){
      $email = trim($_POST['email']);
      $password = trim($_POST['pass']);
      
      $sql = "select * from users where email = '".$email."'";
      $rs = mysqli_query($con,$sql);
      $numRows = mysqli_num_rows($rs);
      
      if($numRows  == 1){
        $row = mysqli_fetch_assoc($rs);
        if(password_verify($password,$row['password'])){
          // echo "Password verified";
          $_SESSION['user_id']=$row['id'];
          $_SESSION['user_name']=$row['user_name'];
          if($_SESSION['user_id']==1){
            header('location: admin.php');
          }else {
            if($row['active']==1){
             $message="user is acive";
            //  alert("JavaScript Alert Box by PHP");
            header('location: user.php');
            }else{
              $message="user is not active";
            }
            
          }
          // 
        }
        else{
          echo "Wrong Password";
        }
      }
      else{
        echo "No User found";
      }
    }

   



?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<title>Login</title>
</head>
<body style="background-color:#eee;text-align:center">
<section class="vh-100 gradient-custom" >
<form method="post" style="background-color:#fff;text-align:center">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              
              <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
              <?php if($message!="") { echo'<div class="alert alert-danger" role="alert">'.$message.'</div>'; } ?>

              <div class="form-outline form-white mb-4">
                <input type="email" name="email" id="typeEmailX" class="form-control form-control-lg"></td>
                <label class="form-label" for="typeEmailX">Email</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="pass" id="typePasswordX" class="form-control form-control-lg"></td>
                <label class="form-label" for="typePasswordX">Password</label>
              </div>

              <button name="submit" value="Submit" class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
              

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="signup.php" class="text-white-50 fw-bold">Sign Up</a>
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</section>

</body>
</html>




<!-- $message="";
    if(count($_POST)>0) {
        $result = mysqli_query($con,"SELECT * FROM users WHERE email ='" . $_POST["email"] . "' and password = '". $_POST["pass"]."'");
        $count  = mysqli_num_rows($result);
        if($count==0) {
            $message = "Invalid Username or Password!";
        } else {
            $message = "You are successfully authenticated!";
            $user_data = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user_data['id'];
            // print_r($user_data);
            //   if($user_data['role'] === 'user')
            //   {
            //     header('location: user.php');
            //     die;
            //   }else if($user_data['role'] === 'admin'){
            //     header('location: admin.php');
            //     die;
            //   }
            header('location: admin.php');
        }
    }

  -->