<?php 
require_once "object.php";
@session_start();
if(isset($_COOKIE['email'])){
  $user->set('email',$_COOKIE['email']);
  $userdata = $user->getUserByEmail();
    $_SESSION['admin_email'] = $_COOKIE['email'];
    $_SESSION['admin_name'] = $userdata[0]->name;
    $_SESSION['admin_role'] = $userdata[0]->role;
    $_SESSION['admin_id'] = $userdata[0]->id;
    $_SESSION['admin_image'] = $userdata[0]->image;

  header('location:dashboard.php');
}

 if(isset($_POST['login']))
{
  $err=[];
  if(isset($_POST['email'])&& !empty($_POST['email'])&& trim($_POST['email']) !='')
  {
    $user->set('email',$_POST['email']);
  }else{
  $err['email']='Enter email';
}
if(isset($_POST['password'])&& !empty($_POST['password'])&& trim($_POST['password']) !='')
  {
    $user->set('password',md5($_POST['password'])); 
  }else{
  $err['password']='Enter password';
}
//if error array is empty process further
if(count($err)==0){
  $userdata = $user->login();
  
  if(count($userdata) == 1){
     //remember me
     if(isset($_POST['remember'])){
      //set cookie
      setcookie('email',$_POST['email'],time() + 7*24*60*60);
     }

    @session_start();
    $_SESSION['admin_name'] = $userdata[0]->name;
    $_SESSION['admin_email'] = $userdata[0]->email;
    $_SESSION['admin_role'] = $userdata[0]->role;
    $_SESSION['admin_id'] = $userdata[0]->id;
    $_SESSION['admin_image'] = $userdata[0]->image;


    header('location:dashboard.php');
  }else{
    $err['login'] = 'Invalid Username and Password'; 
  }
}
}
 ?>






 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  

  <title>News Portal | Admin panel</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style type="text/css">
    .error{
      font-size: 1rem;
      width:100%;
      color:red;
    }
    .form-control{
      width: 100%;
    }
  </style>

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>

                       <?php if(isset($err['login'])){ ?>
                        <p class="alert alert-danger text-danger"><?php echo $err['login'] ?></p>
                      <?php } ?>

                      <?php if(isset($_GET['msg']) && $_GET['msg'] == 1){ ?>
                        <p class="alert alert-danger text-danger">PLease Login to Access Admin Panel</p>
                      <?php } ?>

                  <form class="user" action="" method="post" id="loginForm">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." required="required" >
                       <?php if(isset($err['email'])){ ?>
                        <span class="text-danger"><?php echo $err['email'] ?></span>
                      <?php } ?>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password"class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required="required"><!-- minlength="8" -->
                      <?php if(isset($err['password'])){ ?>
                        <span class="text-danger"><?php echo $err['password'] ?></span>
                      <?php } ?>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" value="remember">
                        <label class="custom-control-label" for="customCheck" >Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                      <i class="fas fa-sign-in-alt"></i>
                      Login
                    </button>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript" src="js/validation/dist/jquery.validate.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
    $('#loginForm').validate();
    });
  </script>

</body>

</html>
