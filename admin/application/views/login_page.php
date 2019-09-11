<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('public/plugins/admin-assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('public/plugins/admin-assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
   <link href="<?php echo base_url('public/plugins/bootstrap-notify/'); ?>animate.css" rel="stylesheet">
   
  <style>
      .form-control-user{
        border-radius: inherit !important;
      }
      
      .btn-user{
         border-radius: inherit !important; 
      }
      
      .btn-user {
        background-color: #1ab394;
        border-color: #1ab394;
        color: #FFFFFF;
    }
    
    .btn-user:hover {
        background-color: #2f4050;
        border-color: #2f4050;
        color: #FFFFFF;
    }
  </style>

</head>

<body class="">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-5 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <!--<div class="col-lg-6 d-none d-lg-block" style="background-image: url('<?php echo base_url() ?>public/images/images/log-back.png');background-size: cover;"></div>-->
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <a href="#" onclick="signIn()" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>
                    <!-- <hr>
                    <a href="" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="password-reset">Forgot Password?</a>
                  </div>
                  <!-- <div class="text-center">
                    <a class="small" href="registration">Create an Account!</a>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('public/plugins/admin-assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('public/plugins/admin-assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('public/plugins/admin-assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('public/plugins/admin-assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- notification plugin -->
  <script src="<?php echo base_url('public/plugins/bootstrap-notify/'); ?>bootstrap-notify.min.js"></script>
  <script src="<?php echo base_url('public/plugins/bootstrap-notify/'); ?>notify-msg.js"></script>


  <script>

  function validateEmail(mail) 
  {
   if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
    {
      return false;
    }else{
      return true;
    }
  }

    function signIn(){
        var email = $('#email').val();
        var password = $('#password').val();
        var remember_me = $('#remember_me').val();
        
        $("#success").css("display", "none");
        $("#error").css("display", "none");
        $("#btn_login").prop('disabled', true);
        
        if(email != '' && password!=''){
            
            $.ajax({
                url: 'authentication',
                type: 'post',
                dataType: 'json',
                data: {'email':email ,'password':password},
                success: function(response){
                    if(response.code == 1000){
                      showSuccessMsg("Login Success...!");
                        setTimeout(function(){ 
                            location.href='dashboard';
                        }, 1000); 
                    }else{
                        showErrorMsg("Login Faield..!");
                    }
                    
                },
                error: function(error){
                    showErrorMsg(error.responseText);
                }
            });
            
        }else{
          showWarningMsg("Email and Password are Required..!");
        }
    }
</script>



</body>

</html>
