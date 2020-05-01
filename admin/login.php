<?php
    require_once("includes/header.php");
    $the_message = "";

    if($session->is_signed_in()){
        redirect("index.php");
}
    if(isset($_POST['submit'])){
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            //check nu in de database als de user bestaat.
        $user_found = User::verify_user($username, $password);
        if($user_found){
            $session->login($user_found);
            redirect("index.php");
        }else{
            $the_message ="Uw password of username is verkeerd!";
            $session->message($the_message);
        }
        }else{
        $username = "";
        $password = "";
    }

?>

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
                    <h1 class="h4 text-gray-900 mb-4">Welkom beste klant!</h1>
                  </div>
                  <form class="user" action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="usernameHelp"
                             placeholder="Enter a username..." value="<?php echo htmlentities($username); ?>">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password"
                             placeholder="Password" value="<?php echo htmlentities($password); ?>">
                    </div>

                      <div class="form-group">
                          <input type="submit" class="btn btn-success btn-user btn-block" id="submit" name="submit" value="Login">
                      </div>
                    <?php if(isset($_SESSION['message'])){ ?>
                       <div class="alert alert-warning alert-dismissible" role="alert">
                           <button type="button" class="close" data-dismiss="alert">&times;</button>
                           <?php echo $the_message; ?>
                       </div>
                    <?php } ?>


                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
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

</body>

</html>
